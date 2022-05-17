<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogBookController extends Controller
{

    public function render_form(){
        return view("mbkm.logbook");
    }

}
