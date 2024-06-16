<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'superadmin', // Adicione 'superadmin' aos atributos que podem ser preenchidos em massa
        'driver', // Novo campo para identificar se o usuário é motorista
        'cnh', // Novo campo para armazenar o número da CNH
        'vehicle', // Novo campo para armazenar informações do veículo
        'vehicle_doc', // Novo campo para armazenar a documentação do veículo
        'passenger_capacity', // Novo campo para a capacidade de passageiros
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'superadmin' => 'boolean', // Define que 'superadmin' deve ser tratado como booleano
        'driver' => 'boolean', // Define que 'driver' deve ser tratado como booleano
    ];
}

