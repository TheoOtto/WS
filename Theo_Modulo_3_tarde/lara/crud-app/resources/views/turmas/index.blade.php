@extends('turmas.layout')
@section('title','Lista de turma')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-header">turmas</div>
        <div class="card-body">
            <a href="{{ url('turma/create') }}" class="btn btn-success btn-sm ">Adicionar turma</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Area</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turmas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->turma_nome }}</td>
                            <td>{{ $item->turma_curso }}</td>
                            <td>
                                <a href="{{ url('/turma/' . $item->id) }}" class="btn btn-primary btn-sm shadow">Ver</a>
                            </td>
                            <td>
                                <a href="{{ url('/turma/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm shadow">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/turma' . '/' . $item->id) }}" method="post">
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
