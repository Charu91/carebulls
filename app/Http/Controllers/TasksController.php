<?php

namespace App\Http\Controllers;
use app\Http\Models\Task;


class TasksController extends Controller
{
    public function login()
	{
    return view('login');
	//return redirect()->route('login');
	
	}
	
	 
	public function store(Request $request)
	{
		$this->validate($request, [
									'username' => 'required',
									'password' => 'required'
								]);
								
		
		
		$input = $request->all();

		Task::welcome1($input);

		return redirect()->back();
	}

	
	
	public function show()
	{
		return view('hospitalListing', ['posts' => Task::all()]);
		
		
	}
	
  
}
