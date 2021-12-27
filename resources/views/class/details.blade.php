@extends('template-dashboard')

@section('content')

    @include('includes.navbar')
    
    <div class="container dash">
        <h4>Detalhes da Aula</h4>
        <p>Aula: {{ $class[0]['name_class'] }}</p>
        <p>Início: {{ \Carbon\Carbon::parse($class[0]['date_time_start'])->format('d/m/Y H:i') }}</p>
        <p>Fim: {{ \Carbon\Carbon::parse($class[0]['date_time_end'])->format('d/m/Y H:i') }}</p>
        <hr>
        <h4>Alunos que realizaram Check-in</h4>
    
        <table class="table table-borderless div-table">
            <thead>
                <tr>
                <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkIn as $item)
                <tr>
                    <td>{{ $item->people->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
