@extends('template-dashboard')

@section('content')
  <div class="container h-100 login">
    <div class="row h-100 justify-content-center align-items-center p-2">
      <div class="col-sm-12 col-md-6">
        <h1 class="neonText">Karatê Agenda</h1>
        <h2>Software para agendamentos <br>de aulas de <span class="txt-green">Karatê</span></h2>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="row h-100 justify-content-center align-items-center p-2">
          <form class="col-md-7" action="{{ route('signIn.validation') }}" method="POST">
              @csrf
              <h3>Login</h3>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Senha">
              </div>
              <button class="btn btn-lg btn-success w-100" type="submit">Entrar</button>
          </form>   
        </div>
      </div>
    </div>
  </div>
@endsection
