<?php

namespace App\Http\Controllers\Backend\Directivo;
use App\Models\Catalogos\Carrera;
use App\Models\Catalogos\Grupo;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\PeriodoEscolar;
use App\Models\Catalogos\Materia;
use Illuminate\Http\Request;
use DB;


class ConcentradoUnidadesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$carreras = Carrera::get();
    	$peridoEscolarList=PeriodoEscolar::orderBy('fechaFin','desc')->get();

    	$pe = new PeriodoEscolar();

    	$peridoEscolar = $pe->getPeriodoEscolar()->first();
       	return view('directivo/concentradoUnit', 
       			compact('carreras',
       					'peridoEscolar',
       					'peridoEscolarList'));
    }

    public function load(Request $request){

      //SELECT unidades FROM Materia WHERE materiaID
      $materiaID = $request->get('cmbMat');
      $periodoID = $request->get('cmbPeriodo');

      //$unidades = Materia::where('materiaID',$materiaID)->get('unidades');


      $detalles = DB::table('parciales')
                    ->join('parciales_detalles','parciales.parcialID','=','parciales_detalles.parcialID')
                    ->where('parciales.periodoID',$periodoID)
                    ->where('parciales_detalles.materiaID',$materiaID)
                    ->select('parciales_detalles.unidad', 'parciales_detalles.p_SABER', 'parciales_detalles.p_HACER')
                    ->get();
      // select b.unidad, b.p_SABER, b.p_HACER  
      // from Parcial a 
      // INNER JOIN DetalleParcial b ON a.parcialID = b.parcialID where a.periodoID = '".$_POST['cmbPeriodo']."' AND b.materiaID = '$mat' order by b.unidad ASC";


      // return $request;
      return  $detalles;
    }

    
}
