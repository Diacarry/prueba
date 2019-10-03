@extends('layouts.blank')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary">estado</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h2>LISTADO DE USUARIOS REGISTRADOS <a href="/" class="btn btn-info">INICIO</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $info)
                    <tr>
                        <td>{{ $info->id }}</td>
                        <th>{{ $info->email }}</th>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->descripcion }}</td>
                        <td><a href="/users/{{ $info->id }}/edit" class="btn btn-warning"></a></td>
                        <td>
                            <form action="/users/{{ $info->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>NO HAY DATA</tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection