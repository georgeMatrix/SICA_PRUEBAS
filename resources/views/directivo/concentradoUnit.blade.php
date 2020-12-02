@extends('layouts.template')
@section('title')
| Create Category
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            @include('role_user.custom.message')
            <div class="card">
                <div class="card-header">
                    <h2>Concentrado de Calificaciones por Asignatura</h2>
                </div>
                <div class="card-body">

                <dl class="dl-horizontal">
                    <dt>Periodo escolar actual {{ old('cmbPeriodo')}}</dt>
                    <dd>{{$peridoEscolar->descripcion}}</dd>
                    <!--       <dd>{{$peridoEscolarList}}</dd> -->
                </dl>

                <form name="frmBoots" method="post" action="{{route('concentradoUnidadesLoad')}}">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="cmbPeriodo" class="col-sm-3 col-form-label">Periodo escolar:</label>
                            <div class="col-sm-9">
                                 <select class="custom-select" name="cmbPeriodo"  id="cmbPeriodo">
                                    <option value=""> -- Elija periodo -- </option>
                                    @foreach($peridoEscolarList as $peridoEscolarUnique)
                                    <option {{ old('cmbPeriodo') == $peridoEscolarUnique->periodoID ? "selected" : "" }}  value="{!! $peridoEscolarUnique->periodoID !!}">{!! $peridoEscolarUnique->descripcion !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                            <label for="cmbCarrera" class="col-md-2 col-form-label">Carrera:</label>
                            <div class="col-md-10">
                                 <select id="cmbCarrera" class="custom-select" name="cmbCarrera"  id="cmbCarrera">
                                    <option value=""> -- Elija una opción -- </option>
                                     @foreach($carreras as $carrera)
                                        <option value="{{$carrera->carreraID}}">{!! $carrera->descripcion !!}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="cmbCuatri" class="col-sm-4 col-form-label">Cuatrimestre:</label>
                            <div class="col-sm-8">
                                <select class="custom-select" name="cmbCuatri" id="cmbCuatri">
                                    <option value=""> -- Elija Cuatrimestre -- </option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="cmbGpo" class="col-sm-3 col-form-label">Grupo:</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="cmbGpo" id="cmbGpo" >
                            <option value=""> -- Elija Grupo -- </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="cmbMat" class="col-sm-3 col-form-label">Materia:</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="cmbMat" id="cmbMat">
                            <option value=""> -- Elija Materia -- </option>
                                </select>
                            </div>
                        </div>
                    </div>


                    </div>
                </form>
                <div class="table-results">
                    <table id="Exportar_a_Excel" class="table table-sm table-striped mt-2 table-hover table-bordered" style="font-size: 11px;">
                    <thead class="thead-light" style="font-size: 13px;">
                        <tr class="text-center">
                            <th id="id" scope="col" rowspan="3" class="align-middle">#</th>
                            <th id="matricula" scope="col" rowspan="3" class="align-middle">Matricula</th>
                            <th id="nombre" scope="col" rowspan="3" class="align-middle">Nombre</th>
                            <th class='text-center' scope='col' colspan='4'> Unidad</th>
                            <th class='text-center' scope='col' colspan='4'> Unidad</th>
                            <th class='text-center' scope='col' colspan='4'> Unidad</th>
                            <th id="promedio" class='text-center align-middle' scope='col' rowspan='3'>Prom. Gral</th>
                            <tr id="saberHacer" style="font-weight:bold;">
                                <th>Saber</th>
                                <th>Hacer</th>
                                <th rowspan='2' class='align-middle'>Asist.</th>
                                <th rowspan='2' class='align-middle'>Prom.</th> 
                                <th>Saber</th>
                                <th>Hacer</th>
                                <th rowspan='2' class='align-middle'>Asist.</th>
                                <th rowspan='2' class='align-middle'>Prom.</th> 
                                <th>Saber</th>
                                <th>Hacer</th>
                                <th rowspan='2' class='align-middle'>Asist.</th>
                                <th rowspan='2' class='align-middle'>Prom.</th>
                            </tr>
                            <tr id="porcentaje" style="font-weight:bold;">
                                <th class='text-center'>35%</th>
                                <th class='text-center'>35%</th>
                                <th class='text-center'>35%</th>
                                <th class='text-center'>35%</th>
                                <th class='text-center'>35%</th>
                                <th class='text-center'>35%</th>
                            </tr>
                        </tr>
                    </thead>
                    </table>  


                </div>

                </div>
            </div>
         </div>
    </div>
</div>





</script>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#cmbCarrera').on('change', function(){
        let cmbPeriodo = $('#cmbPeriodo').val(); 
        let cmbCarrera = $(this).val(); 

        if (cmbPeriodo=='') {
            toastr.error('Debe seleccionar una periodo');
        }
        // $('#cmbPeriodo')

        $.ajax({
            type:'GET',
            dataType: 'json',
            url:'loaddata/getCuatrimestresByIdCarreraAndIdPeriodo/'+cmbCarrera+'/'+cmbPeriodo,
            success:function(response) {
                $('#cmbCuatri').empty();
                $('#cmbCuatri').append('<option value=""> -- Elija Cuatrimestre -- </option>');

                $.each(response, function(key, value) {
                    $('#cmbCuatri').append('<option value="'+value.cuatrimestre+'"> '+value.cuatrimestre+'</option>');
                });


            }
        });
        
    });

    $('#cmbCuatri').on('change', function(){
        let cmbPeriodo = $('#cmbPeriodo').val(); 
        let cmbCarrera = $('#cmbCarrera').val(); 
        let cmbCuatri = $(this).val(); 

        if (cmbPeriodo=='') {
            toastr.error('Debe seleccionar una periodo');
        }
        if (cmbCarrera=='') {
            toastr.error('Debe seleccionar una carrera');
        }

        $.ajax({
            type:'GET',
            dataType: 'json',
            url:'loaddata/getCarrerasByIdCarreraAndIdPeriodoAndCuatrimestre/'+cmbCarrera+'/'+cmbPeriodo+'/'+cmbCuatri,
            success:function(response) {
                $('#cmbGpo').empty();
                $('#cmbGpo').append('<option value=""> -- Elija Grupo -- </option>');

                $.each(response, function(key, value) {
                    $('#cmbGpo').append('<option value="'+value.grupoID+'"> '+value.descripcion+'</option>');
                });


            }
        });
        
    });

    $('#cmbGpo').on('change', function(){
       
        let cmbCarrera = $('#cmbCarrera').val(); 
        let cmbCuatri = $('#cmbCuatri').val(); 
        let cmbGpo = $(this).val(); 

        if (cmbCuatri=='') {
            toastr.error('Debe seleccionar un cuatrimestre');
        }
        if (cmbCarrera=='') {
            toastr.error('Debe seleccionar una carrera');
        }

        $.ajax({
            type:'GET',
            dataType: 'json',
            url:'loaddata/getMateriasByIdCarreraAndCuatrimestre/'+cmbCarrera+'/'+cmbCuatri,
            success:function(response) {
                $('#cmbMat').empty();
                $('#cmbMat').append('<option value=""> -- Elija Materia -- </option>');

                $.each(response, function(key, value) {
                    $('#cmbMat').append('<option value="'+value.materiaID+'"> '+value.descripcion+'</option>');
                });


            }
        });
        
    });


     $('#cmbMat').on('change', function(){
       

        let cmbPeriodo = $('#cmbPeriodo').val(); 
        let cmbCarrera = $('#cmbCarrera').val(); 
        let cmbCuatri = $('#cmbCuatri').val(); 
        let cmbGpo = $('#cmbGpo').val();  

        let cmbMat = $(this).val(); 

        if (cmbPeriodo=='') {
            toastr.error('Debe seleccionar un periodo');
            return;
        }  

        if (cmbCuatri=='') {
            toastr.error('Debe seleccionar un cuatrimestre');
            return;
        }

        if (cmbCarrera=='') {
            toastr.error('Debe seleccionar una carrera');
            return;
        }

        if (cmbGpo=='') {
            toastr.error('Debe seleccionar una grupo');
            return;
        }

       


        $.ajax({
            type:'GET',
            dataType: 'json',
            url:'concentradoUnidadesLoad?cmbCarrera='+cmbCarrera+'&cmbCuatri='+cmbCuatri+'&cmbGpo='+cmbGpo+'&cmbMat='+cmbMat+'&cmbPeriodo='+cmbPeriodo,
            success:function(response) {
                console.log(response);
                // $('#cmbMat').empty();
                // $('#cmbMat').append('<option value=""> -- Elija Materia -- </option>');

                // $.each(response, function(key, value) {
                //     $('#cmbMat').append('<option value="'+value.materiaID+'"> '+value.descripcion+'</option>');
                // });


            }
        });
        
    });





});
</script>
@endsection