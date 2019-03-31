<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'tbl_countries';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    public static function rules()
    {
        $rules = array(
            'Country_Name'  => 'required|unique:tbl_countries',
        );

        return $rules;
    }

}
