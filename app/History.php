<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'new_id' => 'required',
        'edited_at' => 'required',
    //php17.2 
        'profile_id' => 'required',
        'edited_at' => 'required',
        );
    
}
