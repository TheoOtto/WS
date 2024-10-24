@extends('professores.layout')
@section('title','Adicionar professor')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Dados</div>
        <div class="card-body">
            <a href="{{ url('professor') }}" class="btn btn-success btn-sm">Voltar</a>
            <h6>Nome : {{ $professores->professor_nome }}</h6>
            <p>Email : {{ $professores->professor_email }}</p>
        </div>
    </div>
@endsection
