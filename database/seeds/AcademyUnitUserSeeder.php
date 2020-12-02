<?php

use App\Models\Catalogos\UnidadAcademica;
use App\Models\User_UnidadAcademica\UserUnidadAcademica;
use App\User;
use Illuminate\Database\Seeder;

class AcademyUnitUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        UnidadAcademica::truncate();
        UserUnidadAcademica::truncate();
        $unidad_all = [];

        $unidadFIM = UnidadAcademica::where('slug','upfim')->first();
        if ($unidadFIM){
        	$unidadFIM->delete();
        }

        $unidadFIM = UnidadAcademica::create([
            'unidad'=>'Universidad Politecnica Francisco I. Madero',
            'slug'=>'upfim',
            'description'=>'Universidad Politecnica Francisco I. Madero'
        ]);

        $unidad_all[] = $unidadFIM->id;

        $unidadMeztitlan = UnidadAcademica::where('slug','meztitlan')->first();
        if ($unidadMeztitlan){
        	$unidadMeztitlan->delete();
        }

        $unidadMeztitlan = UnidadAcademica::create([
            'unidad'=>'UPFIM Uninidad Meztitlan',
            'slug'=>'meztitlan',
            'description'=>'Universidad Politecnica Francisco I. Madero, unidad Meztitlan'
        ]);

		$unidad_all[] = $unidadMeztitlan->id;

		
        
        $userdirective = User::where('email', 'directivo@upfim.edu.mx')->first();
        if ($userdirective) {
            $unidad = UserUnidadAcademica::create([
            	'user_id' => $userdirective->id,
            	'unidad_academica_id' => $unidadFIM->id

            ]);
           
        }
       
        	


        $userstudent = User::where('email', 'alumno@upfim.edu.mx')->first();
        if ($userstudent) {
            $unidad = UserUnidadAcademica::create([
            	'user_id' => $userstudent->id,
            	'unidad_academica_id' => $unidadFIM->id

            ]);
            
        }
        
        $roleadmin = User::where('email', 'admin@upfim.edu.mx')->first();
        if($roleadmin){
        	$roleadmin->unidadAcademica()->sync($unidad_all);	
        }


		






    }
}
