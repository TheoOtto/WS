@extends('cursos.layout')
@section('title','Adicionar curso')
@section('content')
    <div class="card mt-5">
        <img src="/img/sistema_fiep_Senai.png" alt="senai" width="200px">

        <div class="card-header">Adicionar curso</div>
        <div class="card-body">
            <form action="{{ url('curso') }}" method="post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="curso_nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        name="curso_nome"
                        id="curso_nome"
                        aria-describedby="helpId"
                        placeholder="Digite o nome"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="curso_area" class="form-label">Area</label>
                    <select
                        class="form-select form-select-sm"
                        name="curso_area"
                        id="curso_area"
                        required
                    >
                        <option selected>Selecione Area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->area_nome }}">{{ $area->area_nome }}</option>
                        @endforeach
                    </select>
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
