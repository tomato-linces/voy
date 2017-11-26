<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    public function new(){

    	return view('requisition.new');
    }
}
