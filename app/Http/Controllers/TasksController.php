<?php

namespace App\Http\Controllers;

use Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Input;
use Auth;
use Session;
use App\Http\Models\Hospitals;
use App\Http\Models\Brands;

class TasksController extends Controller
{
	
			
    public function login()
	{
		return view('login');
   }
  
   public function store()
   {
	   	$data = Input::all();
		
		$rules = array(
						'email' => 'required|email',
						'password' => 'required|min:6',
						 );
		$validator = Validator::make($data, $rules);
		if ($validator->fails())
		{
		  	  return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
		}
		else
		{
			  $userdata = array(
									'email' => Input::get('email'),
									'password' => Input::get('password')
								  );
			  // doing login.
				  if (Auth::validate($userdata)) 
				  {
					if (Auth::attempt($userdata))
					{
						return Redirect::intended('/welcome1');
					}
				  } 
				  else 
				  {
					// if any error send back with message.
					Session::flash('error', 'Error:Username or Password incorrect'); 
					
					return Redirect::to('login');
				  }
		}
		
   }
   
   
   
/*

	public function store(Request $request)
	{
		$this->validate($request, [
									'username' => 'required',
									'password' => 'required'
								]);
	
		$password = Hash::make('secret');
		
		Task::login($input);

		return redirect()->back();
	}*/
	public function welcome1()
	{
		return view('welcome1');
		
	}

	public function HospitalShow()
	{		
		return view('hospitalListing', ['hospitals' => Hospitals::all()]);
					
	}
	public function BrandShow()
	{
		return view('brands', ['posts' => Brands::all()]);
		//return view('brands');
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
						

					
			 $Hospitals = new Hospitals;

			 $Hospitals->brand_id = $request->brand_id;
			 $Hospitals->name = $request->name;
			 $Hospitals->description = $request->description;
			 $Hospitals->contact_email = $request->contact_email;
			 $Hospitals->contact_no = $request->contact_no;
			 $Hospitals->address = $request->address;
			 $Hospitals->state = $request->state;
			 $Hospitals->city = $request->city;
			 $Hospitals->zip_code = $request->zip_code;
			 $Hospitals->save();
			 
			 echo "A new hospital has been added successfully";
			 return view('addHospital');
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
			 					
			 $Brands = new Brands;
			 $Brands->name = $request->name;
			 $Brands->description = $request->description;
			 $Brands->thumb_url = $request->thumb_url;
			 $Brands->save();
			 
			 echo "A new brand has been added successfully";
			 return view('addBrand');
		}		
	}
	
	public function editHospital($id)
	{
		// $edit = Hospitals::find($id);
		// return View::make('updateHospital')->with('posts', $post);
		
		//$hospitals = Hospitals::findOrFail($id);
		//return view('updateHospital')->withHospitals($hospitals);
	
		$hospitals=Hospitals::find($id);
		return view('updateHospital',compact('hospitals'));
	}
	
	public function UpdateHospital($id )
	{
		 $hospitalUpdate=Request::all();
	     $hospital=Hospitals::find($id);
	     $hospital->update($hospitalUpdate);
	     return redirect('hospitalListing');
		
		/*$hospitals = Hospitals::findOrFail($id);
		
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
			//$validator = Validator::make($data,Hospitals::$arrRules);

			if($validator->fails())
			{
				return Redirect::to('/updateHospital')->withErrors($validator)->withInput();
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
						

					
			 $Hospitals = new Hospitals;
				
			 $Hospitals->brand_id = $request->brand_id;
			 $Hospitals->name = $request->name;
			 $Hospitals->description = $request->description;
			 $Hospitals->contact_email = $request->contact_email;
			 $Hospitals->contact_no = $request->contact_no;
			 $Hospitals->address = $request->address;
			 $Hospitals->state = $request->state;
			 $Hospitals->city = $request->city;
			 $Hospitals->zip_code = $request->zip_code;
			 $Hospitals->save();
			 
			 echo "Hospital record has been updated successfully";
			 
			 return redirect()->back();
			 //return view('addHospital');
		}*/
	}
	
	public function hospitaldestroy($id)
	{	
		$hospital = Hospitals::findOrFail($id);

		$hospital->delete();

		Session::flash('flash_message', 'Record successfully deleted!');

		return redirect()->route('hospitalListing');
		
	}

  
}
