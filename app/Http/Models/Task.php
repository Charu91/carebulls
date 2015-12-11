<?php namespace app\Http\Models;


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
	
	protected $table = 'carebulls';

}