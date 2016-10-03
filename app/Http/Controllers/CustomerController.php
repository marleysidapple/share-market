<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bank;

class CustomerController extends Controller
{


	public function __construct()
    {
        $this->middleware('able');
    }


    /*
    * displaying list of customer
    * rendering view
    */
    public function show()
    {
    	return view('modules.customer.list');
    }


    /*
    * adding new customer
    * rendering view
    */
    public function add()
    {
    	$bank = Bank::all();
    	return view('modules.customer.add', compact('bank'));
    }
}
