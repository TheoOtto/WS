@extends('alunos.layout')
@section('title','O que fazer')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sou Adiministrador</th>
                        <th>Sou Professor</th>
                        <th>Sou Aluno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{ url('admin') }}" class="btn btn-primary btn-sm shadow">Entrar</a></td>
                        <td><a href="/loginprofessor" class="btn btn-primary btn-sm shadow">Entrar</a></td>
                        <td><a href="/loginaluno" class="btn btn-primary btn-sm shadow">Entrar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
