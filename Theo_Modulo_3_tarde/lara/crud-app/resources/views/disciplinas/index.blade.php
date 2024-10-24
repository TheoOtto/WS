@extends('disciplinas.layout')
@section('title','Lista de disciplina')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">
        <div class="card-header">disciplinas</div>
        <div class="card-body">
            <a href="{{ url('disciplina/create') }}" class="btn btn-success btn-sm ">Adicionar disciplina</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Professor</th>
                        <th>Aulas da Semana</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->disciplina_nome }}</td>
                            <td>{{ $item->disciplina_turma }}</td>
                            <td>{{ $item->disciplina_professor }}</td>
                            <td>{{ $item->disciplina_aulas }}</td>
                            <td>
                                <a href="{{ url('/disciplina/' . $item->id) }}" class="btn btn-primary btn-sm shadow">Ver</a>
                            </td>
                            <td>
                                <a href="{{ url('/disciplina/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm shadow">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/disciplina' . '/' . $item->id) }}" method="post">
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
