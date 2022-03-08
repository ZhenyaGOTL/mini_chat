@extends('layout')

@section('title')
Войди
@endsection

@section('main')
<main>
<form action='/home/enter' method="POST">
@csrf
<input type='text' name='name' placeholder="Введите имя"><br><br>
<input type="submit" value="Войти">
</form>
</main>
@endsection