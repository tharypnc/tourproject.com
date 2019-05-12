<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customers';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    public static function rules()
    {
        $rules = array(
            'Name'  => 'required|unique:tbl_customers',
            'Email'  => 'required'
        );

        return $rules;
    }

    const ACTIVE = 1;

    const INACTIVE = 0;
    
    const VERIFY = 1;

    const UNVERIFY = 0;
}
