<?php

use App\Models\Catalogos\Docente;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        Docente::truncate();

       $docente = Docente::create([
            'docenteID'=>'TBD',
            'nombre'=>'Por ser definido',
            'apellidoPaterno'=>'',
            'apellidoMaterno'=>'',
            'titulo'=>'',
            'estatus'=>'1'
        ]);
        
	}

    
}