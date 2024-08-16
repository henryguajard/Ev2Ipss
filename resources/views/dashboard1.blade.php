@extends('layouts.app')

@section('title','titulo de la pagina')

@section('page-title','dashboard')

@section('css')
 <!--custom css files here -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    encabezado
                </div>
                <div class="card-body">
                    cuerpo de la tarjeta
                </div>
                <div class="card-footer">
                    pie de la tarjeta
                </div>
            </div>
        </div>
    </div>
</div>

@endsection