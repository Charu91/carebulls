<?php namespace app\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Task extends Model {

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
	
	//$brands = DB::table('brands');
	//$hospitals = DB::table('hospitals');
							
}