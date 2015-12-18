<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Brands extends Model
 {

    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'username',
           ];

	protected $hidden = array('password');
	
	protected $table = 'brands';
	/*
	public function next()
	{
		// get next user
		return Brands::where('id', '>', $this->id)->orderBy('id','asc')->first();
	}
		public  function previous()
		{
			// get previous  user
			return Brands::where('id', '<', $this->id)->orderBy('id','desc')->first();
		}
	*/
		
}