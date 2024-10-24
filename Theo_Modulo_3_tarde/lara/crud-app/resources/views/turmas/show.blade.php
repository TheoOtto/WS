@extends('turmas.layout')
@section('title','Dados da Turma')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Dados</div>
        <div class="card-body">
            <a href="{{ url('turma') }}" class="btn btn-success btn-sm">Voltar</a>
            <p>Turma : {{ $turmas->turma_nome }}</p>
            <p>Curso : {{ $turmas->turma_curso }}</p>
        </div>
    </div>
@endsection
