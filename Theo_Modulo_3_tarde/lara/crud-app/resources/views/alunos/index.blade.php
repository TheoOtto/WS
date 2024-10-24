@extends('alunos.layout')
@section('title','Lista de Alunos')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-header">Alunos</div>
        <div class="card-body">
            <a href="{{ url('aluno/create') }}" class="btn btn-success btn-sm ">Adicionar Aluno</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->aluno_nome }}</td>
                            <td>{{ $item->aluno_turma }}</td>
                            <td>{{ $item->aluno_email }}</td>
                            <td>{{ $item->aluno_telefone }}</td>
                            <td>
                                <a href="{{ url('/aluno/' . $item->id) }}" class="btn btn-primary btn-sm shadow">Ver</a>
                            </td>
                            <td>
                                <a href="{{ url('/aluno/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm shadow">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/aluno' . '/' . $item->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm(&quot;Confirm delete?&quot;)">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('alunos.logout') }}" method="POST">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger btn-sm shadow">Sair</button>
            </form>
        </div>
    </div>
@endsection
