<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClienttypeRequest;
use App\Clienttype;

class ClientTypeController extends Controller
{
    /*
    * listing all client types
    *
    */
    public function listAll()
    {
    	$clients = Clienttype::all();

    	return view('modules.clienttype.list', compact('clients'));
    }



    /*
	* adding new client type
	* render form
	*/
	public function add()
	{
		return view('modules.clienttype.add');
	}


	/*
	* Storing client type details to db
	*
	*/
	public function store(ClienttypeRequest $request)
	{
		Clienttype::create([
				'name'		    => $request->name,
				'description'	=> $request->description,
				'status'		=> $request->status
			]);

		return redirect()->back()->with('success', 'Client type added successfully');
	}



	/*
	*
	* editin client type
	*/
	public function edit($id)
	{
		$clients = Clienttype::find($id);
		return view('modules.clienttype.edit', compact('clients'));
	}


	/*
	* updating client type
	* save to database
	*/
	public function update(Request $request, $id)
	{
		$v = \Validator::make($request->all(), [
				'name'	=> 'required',
				'description' => 'required'
			]);

		if ($v->fails()){
			return redirect()->back()->withErrors($v->messages());
		} else {
			$c = Clienttype::find($id);
			$c->name = $request->name;
			$c->description = $request->description;
			$c->status = $request->status;
			$c->save();
			return redirect()->back()->with('success', 'Client type updated successfully');
		}
	}
}
