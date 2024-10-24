

@extends('professores.layout')
@section('title','Editar professor')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Editar Professor</div>
        <div class="card-body">
            <form action="{{ url('professor/' . $professores->id) }}" method="post">
                <input type="hidden" name="id" id="id" value="{{ $professores->id }}">
                {!! csrf_field() !!}
                @method('PATCH')
                <div class="mb-3">
                    <label for="professor_nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        name="professor_nome"
                        id="professor_nome"
                        aria-describedby="helpId"
                        placeholder="Digite o nome"
                        value="{{ $professores->professor_nome }}"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="professor_email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="professor_email"
                        id="professor_email"
                        aria-describedby="helpId"
                        placeholder="Digite o email"
                        value="{{ $professores->professor_email }}"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="professor_senha" class="form-label">Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="professor_senha"
                        id="professor_senha"
                        aria-describedby="helpId"
                        placeholder="Digite a senha"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="professor_senha_confirmation" class="form-label">Confirmação de Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="professor_senha_confirmation"
                        id="professor_senha_confirmation"
                        aria-describedby="helpId"
                        placeholder="Confirme a senha"
                        required
                    />
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
