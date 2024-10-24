@extends('cursos.layout')
@section('title','Adicionar curso')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Dados</div>
        <div class="card-body">
            <a href="{{ url('curso') }}" class="btn btn-success btn-sm">Voltar</a>
            <p>Nome : {{ $cursos->curso_nome }}</p>
            <p>Area : {{ $cursos->curso_area }}</p>
        </div>
    </div>
@endsection
