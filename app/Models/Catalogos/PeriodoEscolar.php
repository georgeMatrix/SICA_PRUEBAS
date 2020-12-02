<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class PeriodoEscolar extends Model
{
     protected $table = 'periodos_escolares';

     public function getPeriodoEscolar(){
     	$now = date('Y-m-d');
     	return PeriodoEscolar::whereDate('fechaInicio','<=',$now)
     		->whereDate('fechaFin','>=',$now)
     		->get();
     }
}
