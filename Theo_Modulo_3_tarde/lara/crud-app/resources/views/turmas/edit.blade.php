

@extends('turmas.layout')
@section('title','Editar turma')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Editar turma</div>
        <div class="card-body">
            <form action="{{ url('turma/' . $turmas->id) }}" method="post">
                <input type="hidden" name="id" id="id" value="{{ $turmas->id }}">
                {!! csrf_field() !!}
                @method('PATCH')
                <div class="mb-3">
                    <label for="turma_nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        name="turma_nome"
                        id="turma_nome"
                        aria-describedby="helpId"
                        placeholder="Digite o nome"
                        value="{{ $turmas->turma_nome }}"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="turma_curso" class="form-label">Curso</label>
                    <select
                        class="form-select form-select-sm"
                        name="turma_curso"
                        id="turma_curso"
                        required
                    >
                        <option selected>Selecione Turma</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->curso_nome }}">{{ $curso->curso_nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-sm shadow">Editar</button>
            </form>
            @if ($errors->any()){{-- verifica erro --}}
                <ul>
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </ul>
            @endif
        </div>
    </div>
@endsection
