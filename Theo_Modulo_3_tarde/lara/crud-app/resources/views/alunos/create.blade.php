@extends('alunos.layout')
@section('title','Adicionar aluno')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">


        <div class="card-header">Adicionar Aluno</div>

        <div class="card-body">
            <form action="{{ url('aluno') }}" method="post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="aluno_nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        name="aluno_nome"
                        id="aluno_nome"
                        aria-describedby="helpId"
                        placeholder="Digite o nome"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="aluno_turma" class="form-label">Turma</label>
                    <select
                        class="form-select form-select-sm"
                        name="aluno_turma"
                        id="aluno_turma"
                        required
                    >
                        <option selected>Selecione Turma</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->turma_nome }}">{{ $turma->turma_nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="aluno_email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="aluno_email"
                        id="aluno_email"
                        aria-describedby="helpId"
                        placeholder="Digite o email"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="aluno_telefone" class="form-label">Telefone</label>
                    <input
                        type="text"
                        class="form-control"
                        name="aluno_telefone"
                        id="aluno_telefone"
                        aria-describedby="helpId"
                        placeholder="Digite o telefone"
                    />
                </div>
                <div class="mb-3">
                    <label for="aluno_senha" class="form-label">Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="aluno_senha"
                        id="aluno_senha"
                        aria-describedby="helpId"
                        placeholder="Digite a senha"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="aluno_senha_confirmation" class="form-label">Confirmação de Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="aluno_senha_confirmation"
                        id="aluno_senha_confirmation"
                        aria-describedby="helpId"
                        placeholder="Confirme a senha"
                        required
                    />
                </div>
                <button type="submit" class="btn btn-success btn-sm shadow" onclick="avisa()">Adicionar</button>
            </form>

            {{-- verifica erro --}}
            @if ($errors->any())
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
