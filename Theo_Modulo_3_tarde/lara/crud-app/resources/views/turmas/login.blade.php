@extends('professores.layout')
@section('title','Adicionar professor')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header"><h4>Login</h4></div>
        <div class="card-body">
            <form action="{{ route('alunos.login.form') }}" method="post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="professor_email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="professor_email"
                        id="professor_email"
                        aria-describedby="helpId"
                        placeholder="Digite o email"
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
                <button type="submit" class="btn btn-success btn-sm shadow">Enviar</button>
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
