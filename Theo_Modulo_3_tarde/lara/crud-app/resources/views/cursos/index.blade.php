@extends('cursos.layout')
@section('title','Lista de curso')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-header">cursos</div>
        <div class="card-body">
            <a href="{{ url('curso/create') }}" class="btn btn-success btn-sm ">Adicionar curso</a>
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
                    @foreach ($cursos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->curso_nome }}</td>
                            <td>{{ $item->curso_area }}</td>
                            <td>
                                <a href="{{ url('/curso/' . $item->id) }}" class="btn btn-primary btn-sm shadow">Ver</a>
                            </td>
                            <td>
                                <a href="{{ url('/curso/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm shadow">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/curso' . '/' . $item->id) }}" method="post">
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
