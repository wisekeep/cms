<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabricante extends Model
{
    use SoftDeletes;

    protected $table = 'fabricantes';

    protected $dates = ['deleted_at'];

    public static $rules = [

        'fantasia' => 'required',
        'social' => 'required',
        'cnpj_cpf' => 'required',
        'email' => 'required'
    ];
}
