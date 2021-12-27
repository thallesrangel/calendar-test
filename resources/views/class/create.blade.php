@extends('template-dashboard')

@section('content')

    @include('includes.navbar')
    
    <div class="container dash">
        <h4>Cadastrar Aula</h4>
        <form method="post" action="{{ route('class.store') }}">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label class="form-label">Data e Hora Início *</label>
                    <div class="input-group mb-3">
                        <input name="date_time_start" type="datetime-local" class="form-control">
                    </div>
                    <p class="txt-red">{{ $errors->first('date_time_start') }}</p>
                </div>

                <div class="col-2">
                    <label class="form-label">Data e Hora Fim *</label>
                    <div class="input-group mb-3">
                        <input name="date_time_end" type="datetime-local" class="form-control">
                    </div>
                    <p class="txt-red">{{ $errors->first('date_time_end') }}</p>
                </div>

                <div class="col-3">
                    <label class="form-label">Nome da Aula *</label>
                    <div class="input-group mb-3">
                        <input name="name_class" type="text" class="form-control">
                    </div>
                    <p class="txt-red">{{ $errors->first('name_class') }}</p>
                </div>

                <div class="col-3">
                    <label class="form-label">Professor *</label>
                    <div class="input-group mb-3">
                        <input name="name_teacher" type="text" class="form-control">
                    </div>
                    <p class="txt-red">{{ $errors->first('name_teacher') }}</p>
                </div>

                <div class="col-2">
                    <label class="form-label">Qtd max. de  vagas *</label>
                    <div class="input-group mb-3">
                        <input name="limit_student" type="number" class="form-control">
                    </div>
                    <p class="txt-red">{{ $errors->first('limit_student') }}</p>
                </div>
            </div>

            <button class="btn btn-success" type="submit">Concluir</button>
            <a class="btn btn-outline-danger" href="{{ route('class.list') }}">Cancelar</a>
        </form>
    </div>
@endsection
