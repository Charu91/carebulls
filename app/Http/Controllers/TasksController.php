<?php

namespace App\Http\Controllers;


class TasksController extends Controller
{
    public function create()
	{
    return view('create');
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
									'username' => 'required',
									'password' => 'required'
								]);
								
		
		
		$input = $request->all();

		Task::create($input);

		return redirect()->back();
	}
	
  
}
