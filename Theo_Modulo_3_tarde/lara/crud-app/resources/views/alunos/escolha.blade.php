@extends('alunos.layout')
@section('title','O que fazer')
@section('content')
    <div class="card mt-5">
        @if(session('logado'))
            <div class="alert alert-success">Login com sucesso</div>
        @endif

        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Professores</th>
                        <th>Alunos</th>
                        <th>Disciplina</th>
                        <th>Curso</th>
                        <th>Turma</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{ url('professor') }}" class="btn btn-primary btn-sm shadow">Professores</a></td>
                        <td><a href="{{ url('aluno') }}" class="btn btn-primary btn-sm shadow">Alunos</a></td>
                        <td><a href="{{ url('disciplina') }}" class="btn btn-primary btn-sm shadow">Disciplina</a></td>
                        <td><a href="{{ url('curso') }}" class="btn btn-primary btn-sm shadow">Curso</a></td>
                        <td><a href="{{ url('turma') }}" class="btn btn-primary btn-sm shadow">Turma</a></td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('alunos.login.form') }}" method="POST">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger btn-sm shadow">Sair</button>
            </form>
        </div>
    </div>
@endsection
