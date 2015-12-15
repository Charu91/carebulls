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
	
		
}