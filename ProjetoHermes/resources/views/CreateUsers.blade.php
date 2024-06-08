@extends('layouts.main')

@section('title', 'Cadastro')

@section('content')
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirme a senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
