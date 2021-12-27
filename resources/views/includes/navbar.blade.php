<div class="container menu">
    <h1 class="neonText">Karatê Agenda</h1>
    <p><a class="btn btn-sm btn-outline-light" href="{{ route('logout') }}">Logout</a></p>
    <h3>Olá, {{ session('people.name') }} 🎉</h3>
    <h4> Você é @if(session('people.role') == 'admin') <span class="txt-green">Administrador(a)</span> @else <span class="txt-green">Aluno(a)</span> @endif 👀</h4>
    @if (session('people.role') === 'student')
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-sm btn-success" href="{{ route('class.list') }}">Aulas Hoje</a>
            <a class="btn btn-sm btn-success" href="{{ route('class.list', ['data' => 'semana']) }}">Aulas Semana</a>
        </div>
    @endif
</div>
