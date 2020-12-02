@extends('layouts.template')
@section('title')
| Crear Carrera
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            @include('role_user.custom.message')
            <div class="card">
                <div class="card-header">
                    <h2>Nueva Carrera</h2>
                </div>


                <div class="card-body">
                    <form action="{{route('carrera.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <h3>Datos de la carrera</h3>
                            <form>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="carreraId" name="carreraId" placeholder="Id Carrera" value="{!! old('carreraId') !!}" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Nombre" value="{!! old('descripcion') !!}" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="director" name="director" placeholder="Director de carrera" value="{!! old('director') !!}" required>
                                </div>

                                <hr>

                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </form>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection