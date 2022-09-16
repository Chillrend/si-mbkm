<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\MahasiswaMbkm;
use App\Models\User;
use Database\Seeders\MBKMSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\True_;

class LogBookController extends Controller
{

    public function render(){
        return view("mbkm.logbook.logbook");
    }

    public function render_form(){
        return view("mbkm.logbook.logbook-form");
    }

    public function store(Request $request){
        $request->validate([
            'tanggal_log' => 'required|date',
            'tempat' => 'required|string',
            'uraian' => 'required|string',
            'rencana_pencapaian' => 'required|string',
            'id' => 'sometimes|numeric'
        ]);

        if($request->exists('id')){
            $logbook = LogBook::find($request->get('id'));
            if(!$this->checkIfUserHasAccessToLog(Auth::user(), $logbook)) return abort(403);
        }else{
            $logbook = new LogBook();
        }

        $mhsw_mbkm = Auth::user()->getMahasiswaMbkm()->first();

        if(!$mhsw_mbkm){
            return redirect()->back()->with('error', 'Anda belum mendaftar program MBKM! Daftar MBKM dahulu sebelum memasukkan entri logbook');
        }

        $logbook->mahasiswa_mbkm_id = $mhsw_mbkm->id;

        $logbook->fill($request->all());

        $logbook->save();

        return view("mbkm.logbook.logbook-form");
    }

    public function checkIfUserHasAccessToLog(User $user, LogBook $logBook){
        $mhsw_mbkm = $logBook->getMahasiswaMbkm()->first();
        $mhsw = $mhsw_mbkm->getMhsw()->first();

        if($user === $mhsw){
            return true;
        }else{
            return false;
        }
    }
}
