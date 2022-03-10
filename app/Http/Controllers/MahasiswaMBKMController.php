<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\ModelMbkm;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaMBKMController extends Controller
{
    public function render_dashboard(){
        $user = Auth::user();
        $jurusan = Jurusan::all();

        $users_jurusan = $user->getMhsJurusan()->first();
        $model_mbkm = ModelMbkm::all();

        return view('dashboard', [
            'user' => $user,
            'jurusan' => $jurusan,
            'users_jurusan' => $users_jurusan,
            'model_mbkm' => $model_mbkm
        ]);
    }

    public function getAllProdiWithinJurusan(int $jurusan_id){
        return Prodi::where('jurusan_id', $jurusan_id)->get();
    }
}
