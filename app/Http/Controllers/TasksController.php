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
  
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('welcome1');
        }
    }
	
	public function welcome1()
	{
		return view('welcome1');
		
	}

	public function HospitalShow()
	{		
		return view('hospitalListing', ['posts' => Hospitals::all()]);
					
	}
	public function BrandShow()
	{
		return view('brands', ['posts' => Brands::all()]);
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
			 
			 return Redirect::to('/hospitalListing/');
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
			 $thumb_url		= (!isset($data['thumb_url'])) ? NULL : $data['thumb_url'];
			 					
			 $Brands = new Brands;
			 $Brands->name = $request->name;
			 $Brands->description = $request->description;
			 $Brands->thumb_url = $request->thumb_url;
			 $Brands->save();
			 
			 return Redirect::to('/brands/');
		}		
	}
	
	public function EditHospital($id , Request $request)
	{
		return view('editHospital', ['id'=>$id]);	
	}
	
	public function UpdateHospital($id , Request $request)
	{
	     $hospital=Hospitals::find($id);
	    
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
				return Redirect::to('/editHospital/'. $id)->withErrors($validator)->withInput();
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
					
			 $hospital= Hospitals::find($id);
			 
			 $hospital->brand_id = $request->brand_id;
			 $hospital->name = $request->name;
			 $hospital->description = $request->description;
			 $hospital->contact_email = $request->contact_email;
			 $hospital->contact_no = $request->contact_no;
			 $hospital->address = $request->address;
			 $hospital->state = $request->state;
			 $hospital->city = $request->city;
			 $hospital->zip_code = $request->zip_code;
			 $hospital->save();
			 
			 echo "Hospital record has been updated successfully";
			 
			 return Redirect::to('/hospitalListing/');
		}
	}
	
	public function hospitalDestroy($id)
	{	
		Hospitals::destroy($id);
        return Redirect::to('/hospitalListing/');
	}

	  public function EditBrand($id , Request $request)
	  {
		 return view('editBrand', ['id'=>$id]);
		  
	  }
  
	  public function UpdateBrand($id ,Request $request)
	  {
	     $brands=Brands::find($id);
	    
		 if ($request->isMethod('post')) 
		{
			$arrRules = array(
							'name'     		=> 'required|max:255',    
							'description'   => 'required',
							'thumb_url'   => 'required',
							);
			
			$data = $request->all();	
			$validator = Validator::make($data,$arrRules);

			if($validator->fails())
			{
				return Redirect::to('/editBrand/'. $id)->withErrors($validator)->withInput();
			}
			
			 $name      	= (!isset($data['name'])) ? NULL : $data['name'];
			 $description  	= (!isset($data['description'])) ? NULL : $data['description'];
			 $thumb_url		= (!isset($data['thumb_url'])) ? NULL : $data['thumb_url'];
			 	
			 $brand = Brands::find($id);
			 
			 $brand->name = $request->name;
			 $brand->description = $request->description;
			 $brand->thumb_url = $request->thumb_url;
			 $brand->save();
			 
			return Redirect::to('/brands/');
		}		
		  
	  }
	  
	  public function BrandDestroy($id)
	 {	
		Brands::destroy($id);
		return redirect()->back();
	 }
  
}
