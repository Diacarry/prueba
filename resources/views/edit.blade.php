@extends('layouts.blank')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary">Cuenta</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h2>DATOS DEL USUARIO : {{ $usuario->email }}</h2><br>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/users/{{ $usuario->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="inputA" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <label for="">{{ $usuario->email }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputB" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $usuario->name }}" value="{{ $usuario->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputC" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputE" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="{{ $usuario->nickname }}" value="{{ $usuario->nickname }}">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
@endsection