@extends('professores.layout')
@section('title','Lista de professores')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-header">professores</div>
        <div class="card-body">
            <a href="{{ url('professor/create') }}" class="btn btn-success btn-sm ">Adicionar professor</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professores as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->professor_nome }}</td>
                            <td>{{ $item->professor_email }}</td>
                            <td>
                                <a href="{{ url('/professor/' . $item->id) }}" class="btn btn-primary btn-sm shadow">Ver</a>
                            </td>
                            <td>
                                <a href="{{ url('/professor/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm shadow">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/professor' . '/' . $item->id) }}" method="post">
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
