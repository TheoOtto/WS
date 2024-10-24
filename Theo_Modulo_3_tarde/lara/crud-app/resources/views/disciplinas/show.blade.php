@extends('disciplinas.layout')
@section('title','Adicionar disciplina')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Dados</div>
        <div class="card-body">
            <a href="{{ url('disciplina') }}" class="btn btn-success btn-sm">Voltar</a>
            <h6>Nome : {{ $disciplinas->disciplina_nome }}</h6>
            <p>Turma : {{ $disciplinas->disciplina_turma }}</p>
            <p>Turma : {{ $disciplinas->disciplina_professor }}</p>
            <p>Turma : {{ $disciplinas->disciplina_aulas }}</p>
        </div>
    </div>
@endsection
