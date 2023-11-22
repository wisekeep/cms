<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'profiles';

    protected $primaryKey = 'profile_id';

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [

        'profile_uuid',
        'imagem',
        'cpf',
        'rg',
        'rg_emissor',
        'data_aviversario',
        'email_alternativo',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'pais',
        'cep',
        'fone1',
        'fone2',
        'fone3',
        'fone4',
        'obs',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
