@extends('layouts.template')
@section('title')
| Nueva categoría
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            @include('role_user.custom.message')
            <div class="card">
                <div class="card-header">
                    <h2>Nueva categoría</h2>
                </div>


                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <h3>Información requerida</h3>
                            <form>


                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de categoría" value="{!! old('name') !!}" required>
                                </div>


                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control" placeholder="Descripción">{!! old('description') !!}</textarea>
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