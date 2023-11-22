<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'companies';

    protected $primaryKey = 'company_id';

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
