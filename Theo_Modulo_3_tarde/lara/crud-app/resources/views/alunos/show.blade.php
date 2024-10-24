@extends('alunos.layout')
@section('title','Adicionar aluno')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Dados</div>
        <div class="card-body">
            <a href="{{ url('aluno') }}" class="btn btn-success btn-sm">Voltar</a>
            <h6>Nome : {{ $alunos->aluno_nome }}</h6>
            <p>Turma : {{ $alunos->aluno_turma }}</p>
            <p>Email : {{ $alunos->aluno_email }}</p>
            <p>Telefone : {{ $alunos->aluno_telefone }}</p>
        </div>
    </div>
@endsection
