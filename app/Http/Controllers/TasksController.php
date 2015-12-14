<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Input;
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
	
		$password = Hash::make('secret');
		
		Task::login($input);

		return redirect()->back();
	}
	public function welcome1()
	{
		return view('welcome1');
		
	}

	public function HospitalShow()
	{
		//return View::make('hospitalListing')->with('post', $posts);
		return view('hospitalListing', ['posts' => Task::all()]);
		//return view('hospitalListing');
	}
	public function BrandShow()
	{
		//return view('brands', ['posts' => Task::all()]);
		return view('brands');
	}
	
	public function AddHospital()
	{
		return view('addHospital');
		
	}
		
	public function hospitalStore(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$arrRules = array(
							'brand_id' 		=> 'required',
							'name'     		=> 'required|max:255',    
							'description'   => 'required',
							'contact_email' => 'email|max:255',
							'contact_no'    => 'required|min:10|max:10',
							'address'   	=> 'required|max:255',    
							'state'    		=> 'required|max:255',
							'city'    		=> 'required|max:255',
							'zip_code'    	=> 'required|max:255',
								   
							);
			
			$data = $request->all();	
			$validator = Validator::make($data,$arrRules);

			if($validator->fails())
			{
				return Redirect::to('/addHospital')->withErrors($validator)->withInput();
			}
		
			 $brand_id  	= (!isset($data['brand_id'])) ? 0 : $data['brand_id'];
			 $name      	= (!isset($data['name'])) ? NULL : $data['name'];
			 $description  	= (!isset($data['description'])) ? NULL : $data['description'];
			 $contact_email = (!isset($data['contact_email'])) ? NULL : $data['contact_email'];
			 $contact_no  	= (!isset($data['contact_no'])) ? NULL : $data['contact_no'];
			 $address  		= (!isset($data['address'])) ? NULL : $data['address'];
			 $state  		= (!isset($data['state'])) ? NULL : $data['state'];
			 $city  		= (!isset($data['city'])) ? NULL : $data['city'];
			 $zip_code  	= (!isset($data['zip_code'])) ? NULL : $data['zip_code'];
						

					
			 $hospitals = new hospitals;

			 $hospitals->brand_id = $request->brand_id;
			 $hospitals->name = $request->name;
			 $hospitals->description = $request->description;
			 $hospitals->contact_email = $request->contact_email;
			 $hospitals->contact_no = $request->contact_no;
			 $hospitals->address = $request->address;
			 $hospitals->state = $request->state;
			 $hospitals->city = $request->city;
			 $hospitals->zip_code = $request->zip_code;
			 $hospitals->save();
			 
			 echo "A new hospital has been added successfully";
		}
	}
	
	public function AddBrand()
	{
		return view('addBrand');
		
	}
	
	public function BrandStore(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$arrRules = array(
							'name'     		=> 'required|max:255',    
							'description'   => 'required',
							
							);
			
			$data = $request->all();	
			$validator = Validator::make($data,$arrRules);

			if($validator->fails())
			{
				return Redirect::to('/addBrand')->withErrors($validator)->withInput();
			}
		
			 $name      	= (!isset($data['name'])) ? NULL : $data['name'];
			 $description  	= (!isset($data['description'])) ? NULL : $data['description'];
			 $thumb_url		= (!isset($data['contact_email'])) ? NULL : $data['contact_email'];
			 					
			 $Task = new Task;
			 $Task->name = $request->name;
			 $Task->description = $request->description;
			 $Task->thumb_url = $request->thumb_url;
			 $Task->save();
			 
			 echo "A new brand has been added successfully";
		}
		
	}
  
}
