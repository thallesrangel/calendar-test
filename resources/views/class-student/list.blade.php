@extends('template-dashboard')

@section('content')

    @include('includes.navbar')

    <div class="container dash">
        <h4>Lista de Aulas do Aluno</h4>
        <div class="div-table">
            <table class="table table-responsive">
                <thead class="table-head">
                    <tr>
                        <th>Data</th>
                        <th>Hora Início</th>
                        <th>Hora Fim</th>
                        <th>Nome da Aula</th>
                        <th>Vagas Disponíveis</th>
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
                            <td>{{ ($item['limit_student'] - $item['busy']) }}</td>
                            @if(request()->query('data') != 'semana')
                                <td>
                                    @if(isset($item['checkIn']) && $item['checkIn'] == 'checkin')
                                        <form action="{{ route('check.out', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Cancelar Check-in</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('check.in', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-sm btn-success {{ (isset($item['checkIn']) && $item['checkIn'] == 'checkin') ? 'disabled' : '' }}" type="submit">Check-in</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
