<?php

namespace App\Http\Controllers;
use app\Http\Models\Task;


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
	
	public function show()
	{
		return view('hospitalListing', ['posts' => Task::all()]);
		
		
	}
	
  
}
