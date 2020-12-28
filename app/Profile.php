<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //課題 14-5 Validation
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
    //Profile Modelに関連付け
    public function histories()
    {
    return $this->hasmany('App\History');
    }
}
