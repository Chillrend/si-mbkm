<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\MahasiswaMbkm;
use App\Models\User;
use App\Models\ModelMbkm;
use Database\Seeders\MBKMSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\True_;

class LogBookController extends Controller
{

    public function render(){
        
        $mhsw_mbkm = Auth::user()->getMahasiswaMbkm()->first();
        // dd($mhsw_mbkm);
        $mhsw_mbkm_exist = FALSE;
        $aprove_dosen = FALSE;
        $aprove_pembimbing = FALSE;
        // dd($logbook_id);
        if($mhsw_mbkm){
            //filter untuk mahasiswa mbkm
            $mhsw_mbkm_exist = TRUE;
            //filter untuk mencari id dari mahasiswa mbkm
            // dd($logbook);
            // $logbook = LogBook::first();
            // if($logbook->id != ''){
            $logbook = LogBook::where('mahasiswa_mbkm_id', '=', $mhsw_mbkm->id)->get();
            
            return view("mbkm.logbook.logbook",[
                        "logbook" => $logbook,
                        "mhsw_mbkm" => $mhsw_mbkm,
                        'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
                        'aprove_dosen' => $aprove_dosen,
                        'aprove_pembimbing' => $aprove_pembimbing,
                    ]);     
                }
        else{
            $mhsw_mbkm_exist = FALSE;
            return view("mbkm.logbook.logbook",[
                'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            ]);
        }


        
        // $mhsw_mbkm_exist = false;
        // if($mhsw_mbkm){
        //     $logbook = LogBook::where('mahasiswa_mbkm_id', '=', $mhsw_mbkm->id)->get();
        //     $mhsw_mbkm_exist = true;
        //     return view("mbkm.logbook.logbook",[
        //         "logbook" => $logbook,
        //     ]);
        // }
        // return view("mbkm.logbook.logbook");
        
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

                $logbook->mahasiswa_mbkm_id = $mhsw_mbkm->id;

                $test = LogBook::where('mahasiswa_mbkm_id', '=', $mhsw_mbkm->id)->where('tanggal_log',$request->get('tanggal_log'))->exists();

                if($test){
                        return redirect()->back()->with(['error' => 'Tanggal yang di inputkan sama']);
                }
                    $logbook->fill($request->all());

                    $logbook->save();

                    return redirect()->back()->with(['success' => 'Data Berhasil Ditambahkan']);


        


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
