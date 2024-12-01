<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'cpf', 'matricula', 'telefone', 'password', 'flag_ativo' 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_user', 'user_id', 'especialidade_id');
    }

    public function hasAnyRoles($roles){
        return $this->roles()->whereIn('nome', $roles)->exists(); 
    }

    public function objetivos(){
        return $this->hasMany(Objetivo::class);
    }

    public function pdi(){
        return $this->hasMany(Pdi::class);
    }

    public function escolas(){
        return $this->belongsToMany(Escola::class, 'escola_user', 'user_id', 'escola_id');
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function albuns(){
        return $this->hasMany(Album::class);
    }

    public function notificacoes(){
        return $this->hasMany(Notificacao::class, 'destinatario_id')->orderBy('created_at', 'desc')->take(5);
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPassword($token));
    }
}
