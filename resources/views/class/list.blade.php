@extends('template-dashboard')

@section('content')

    @include('includes.navbar')
    
    <div class="container dash">
        <h4>Lista de Aulas</h4>
        <a class="btn btn btn-dark" href="{{ route('class.create') }}">Criar Aula</a>
        <div class="div-table">
            <table class="table table-responsive">
                <thead class="table-head">
                    <tr>
                        <th>Data</th>
                        <th>Hora Início</th>
                        <th>Hora Fim</th>
                        <th>Nome da Aula</th>
                        <th>Professor</th>
                        <th>Limite alunos</th>
                        <th>Qtd. Check-in</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-body">

                @foreach($data as $item)
                    <tr class="table-row">
                        <td>{{ \Carbon\Carbon::parse($item['date_time_start'])->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['date_time_start'])->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['date_time_end'])->format('H:i') }}</td>
                        <td>{{ $item['name_class'] }}</td>
                        <td>{{ $item['name_teacher'] }}</td>
                        <td>{{ $item['limit_student'] }}</td>
                        <td>{{ $item['busy']}}</td>
                        <td>
                            <a href="{{ route('class.show', $item['id'] ) }}"><i data-feather="search"></i></a>
                            
                            <form action="{{ route('class.disable', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-default" type="submit"><i data-feather="trash-2"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
