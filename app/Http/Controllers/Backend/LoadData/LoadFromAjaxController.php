<?php

namespace App\Http\Controllers\Backend\LoadData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogos\Grupo;
use App\Models\Catalogos\Materia;

class LoadFromAjaxController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function getCuatrimestresByIdCarreraAndIdPeriodo($carreraID,$periodoID){
        echo json_encode(Grupo::orderBy('cuatrimestre')
                            ->groupBy('cuatrimestre')
                            ->where('carreraID',$carreraID)
                            ->where('periodoID',$periodoID)
                            ->get(['cuatrimestre']));
    } 


    public function getCarrerasByIdCarreraAndIdPeriodoAndCuatrimestre($carreraID,$periodoID,$cuatrimestre){
        echo json_encode(Grupo::orderBy('descripcion')
                            ->where('carreraID',$carreraID)
                            ->where('periodoID',$periodoID)
                            ->where('cuatrimestre',$cuatrimestre)
                            ->get(['grupoID', 'descripcion']));
    }

    /**
    *
    */
    public function getMateriasByIdCarreraAndCuatrimestre($carreraID,$cuatrimestre){
        //SELECT materiaID, descripcion FROM Materia 
        //  WHERE carreraID = cmbCarrera 
        //  AND cuatrimestre = cmbCuatri 
        //  AND estatus='1' 
        //  ORDER BY descripcion ASC";

          echo json_encode(Materia::orderBy('descripcion')
                            ->where('carreraID',$carreraID)
                            ->where('cuatrimestre',$cuatrimestre)
                            ->where('estatus',1)
                            ->get(['materiaID', 'descripcion']));
    }
}
