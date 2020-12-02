<?php

namespace App\Models\User_UnidadAcademica;

use Illuminate\Database\Eloquent\Model;

class UserUnidadAcademica extends Model
{
    protected $table = 'users_unidades_academicas';
    protected $guarded=[];
    
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function unidadAcademica()
    {
        return $this->belongsToMany('App\Models\Catalogos\UnidadAcademica')->withTimestamps();
    }
}
