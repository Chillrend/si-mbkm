<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\MahasiswaMbkm;
use App\Models\ModelMbkm;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class MahasiswaMBKMController extends Controller
{
    public function render_form(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        $user = Auth::user();
        $jurusan = Jurusan::all();

        $users_jurusan = $user->getMhsJurusan()->first();
        $model_mbkm = ModelMbkm::all();

        return view('dashboard', [
            'user' => $user,
            'jurusan' => $jurusan,
            'users_jurusan' => $users_jurusan,
            'model_mbkm' => $model_mbkm,
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function render_dashboard(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        return view('mbkm', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function render_noreg(string $id){
        $from_noreg = true;
        $mhsw_mbkm_exist = true;
        $mhsw_mbkm = MahasiswaMbkm::where('id', $id)->first();

        return view('mbkm', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm,
            'from_noreg' => $from_noreg
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'model_mbkm_id' => 'numeric|required',
            'prodi_id' => 'numeric|required',
            'nip_dospem' => 'numeric|required',
            'nama_dospem' => 'string|required',
            'lokasi_mbkm' => 'string|required',
            'alamat_mbkm' => 'string|required',
            'deskripsi_mbkm' => 'string'

        ]);

        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        $data = $request->all();
        if($mhsw_mbkm){
            $mhsw_mbkm->fill($data);
        }else{
            $mhsw_mbkm = new MahasiswaMbkm();
            $data['user_id'] = Auth::user()->id;
            $data['id'] = Str::orderedUuid();
            $mhsw_mbkm->fill($data);
        }
        $mhsw_mbkm->save();
        return response()->json($mhsw_mbkm);
    }

    public function getAllProdiWithinJurusan(int $jurusan_id){
        return Prodi::where('jurusan_id', $jurusan_id)->get();
    }
}