@extends('layouts.app')

@section('title', 'Вход')

@section('content')
  <h1 style="margin: 2rem 0 1.5rem;">Вход</h1>

  <div style="background:#fff; border:1px solid #e0e0e0; border-radius:12px; padding:1.5rem; max-width:400px;">
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div style="margin-bottom:12px;">
        <label style="font-size:13px; color:#666;">Логин</label>
        <input type="text" name="login" value="{{ old('login') }}"
          style="display:block; width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:8px; margin-top:4px;">
        @error('login') <p style="color:red; font-size:12px;">{{ $message }}</p> @enderror
      </div>

      <div style="margin-bottom:1.5rem;">
        <label style="font-size:13px; color:#666;">Пароль</label>
        <input type="password" name="password"
          style="display:block; width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:8px; margin-top:4px;">
      </div>

      <button type="submit" class="btn btn-primary">Войти</button>
    </form>
  </div>
@endsection