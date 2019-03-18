<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'tbl_languages';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    public static function rules()
    {
        $rules = array(
            'Lang_prefix'  => 'required|unique:tbl_languages',
            'Lang_fullname'  => 'required'
        );

        return $rules;
    }

}
