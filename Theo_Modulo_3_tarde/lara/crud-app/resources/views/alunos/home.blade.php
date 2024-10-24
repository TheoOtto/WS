@extends('alunos.layout')
@section('title',' Home')
@section('content')
    <div class="card mt-5">
        @if(session('logadohome'))
            <div class="alert alert-success">Login com sucesso</div>
        @endif
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-body">
            <h1>Bem Vindo ao Sistema</h1>
        </div>
    </div>
@endsection
