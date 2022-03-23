<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
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

        return view('mbkm_guest', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm,
            'from_noreg' => $from_noreg
        ]);
    }

    public function approve(Request $request){
        $mhsw_mbkm = MahasiswaMbkm::where('id', $request->post('id'))->first();
        $approved = !($request->get('approve') === null);
        $mhsw_mbkm->setApproved($approved);
        return redirect()->back()->with('success', $mhsw_mbkm->approved ? "Pengajuan MBKM ini telah disetujui" : "Persetujuan MBKM ini telah dibatalkan");
    }

    public function store(Request $request){
        $request->validate([
            'model_mbkm_id' => 'numeric|required',
            'prodi_id' => 'numeric|required',
            'angkatan' => 'numeric|required|gte:2017',
            'semester' => 'numeric|required|gte:1|lte:8',
            'durasi' => 'numeric|required|gte:1|lte:12',
            'nip_dospem' => 'numeric|required',
            'nama_dospem' => 'string|required',
            'lokasi_mbkm' => 'string|required',
            'alamat_mbkm' => 'string|required',
            'deskripsi_mbkm' => 'string',
            'program_dikbud' => 'boolean'

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
        return redirect()->to('/mbkm');
    }

    public static function getAllProdiWithinJurusan(int $jurusan_id){
        return Prodi::where('jurusan_id', $jurusan_id)->get();
    }
}
