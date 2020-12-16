@extends('layouts.assistance')

@section('content') 
    <div class="container">
        <i class="fas fa-building fa-2x mx-3 my-2"></i> <p class="building font-weight-bold">{{$establishment->name}} - {{$location->description}} </p>
        <div class="content">
            <div class="row border">
                <div class="col mt-2">
                    <div class="ml-3 p-3">
                        <h3>Registra tu asistencia:</h3>
                        <ul>
                            <li>Inicia la App de Asistencia</li>
                            <li>Selecciona el tipo de marcaje (Entrada/Salida)</li>
                            <li>Escanea el código Qr </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-flex justify-content-center align-items-center">
                    <div id="app">
                        <qr-component></qr-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
