@extends('disciplinas.layout')
@section('title','Adicionar disciplina')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Adicionar disciplina</div>
        <div class="card-body">
            <form action="{{ url('disciplina') }}" method="post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="disciplina_nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        name="disciplina_nome"
                        id="disciplina_nome"
                        aria-describedby="helpId"
                        placeholder="Digite o nome"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="disciplina_turma" class="form-label">Turma</label>
                    <select
                        class="form-select form-select-sm"
                        name="disciplina_turma"
                        id="disciplina_turma"
                        required
                    >
                        <option selected>Selecione Turma</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->turma_nome }}">{{ $turma->turma_nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="disciplina_professor" class="form-label">Professor</label>
                    <select
                        class="form-select form-select-sm"
                        name="disciplina_professor"
                        id="disciplina_professor"
                        required
                    >
                        <option selected>Selecione Professor</option>
                        @foreach ($professores as $professor)
                            <option value="{{ $professor->professor_nome }}">{{ $professor->professor_nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Sexta-Feira" id="disciplina_aulas" name="disciplina_aulas"/>
                    <label class="form-check-label" for="disciplina_aulas"> Sexta-Feira </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Quinta-Feira" id="disciplina_aulas" name="disciplina_aulas"/>
                    <label class="form-check-label" for="disciplina_aulas"> Quinta-Feira </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Quarta-Feira" id="disciplina_aulas" name="disciplina_aulas"/>
                    <label class="form-check-label" for="disciplina_aulas"> Quarta-Feira </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Terça-Feira" id="disciplina_aulas" name="disciplina_aulas"/>
                    <label class="form-check-label" for="disciplina_aulas"> Terça-Feira </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Segunda-Feira" id="disciplina_aulas" name="disciplina_aulas"/>
                    <label class="form-check-label" for="disciplina_aulas"> Segunda-Feira </label>
                </div>
                <button type="submit" class="btn btn-success btn-sm shadow">Adicionar</button>
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
