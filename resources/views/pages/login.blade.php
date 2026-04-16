@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<div style="max-width: 400px; margin: 60px auto 0; background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
  <div style="text-align: center; margin-bottom: 32px;">
    <h2 style="font-size: 2rem; font-weight: 700; color: #2c3e50; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Вход</h2>
    <p style="color: #7f8c8d; margin-top: 8px; font-size: 0.9rem; font-weight: 400;">Введите учётные данные</p>
  </div>

  @if($errors->any())
    <div style="margin-bottom: 24px; padding: 12px 16px; background: #fdf2f2; border: 1px solid #fecaca; border-radius: 6px;">
      <ul style="margin: 0; padding: 0; list-style: none;">
        @foreach($errors->all() as $error)
          <li style="color: #dc2626; font-size: 0.875rem; line-height: 1.4; font-weight: 500;">• {{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('login') }}" method="post">
    @csrf

    <div style="margin-bottom: 20px;">
      <label for="login" style="display: block; margin-bottom: 8px; font-weight: 600; color: #34495e; font-size: 0.95rem; font-family: 'Segoe UI', sans-serif;">Логин</label>
      <input type="text" id="login" name="login" value="{{ old('login') }}"
             style="width: 91%; padding: 12px 16px; border: 2px solid #e1e5e9; border-radius: 8px; background: #f8f9fa; font-size: 1rem; font-family: 'Segoe UI', sans-serif; transition: border-color 0.2s;"
             required>
    </div>

    <div style="margin-bottom: 28px;">
      <label for="password" style="display: block; margin-bottom: 8px; font-weight: 600; color: #34495e; font-size: 0.95rem; font-family: 'Segoe UI', sans-serif;">Пароль</label>
      <input type="password" id="password" name="password"
             style="width: 91%; padding: 12px 16px; border: 2px solid #e1e5e9; border-radius: 8px; background: #f8f9fa; font-size: 1rem; font-family: 'Segoe UI', sans-serif; transition: border-color 0.2s;"
             required>
    </div>

    <button type="submit"
            style="width: 100%; padding: 14px; background: linear-gradient(135deg, #3498db, #2980b9); color: white; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; font-family: 'Segoe UI', sans-serif; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;">
      Войти
    </button>
  </form>

  <div style="margin-top: 24px; text-align: center;">
    <a href="#" style="color: #7f8c8d; font-size: 0.875rem; text-decoration: none; font-weight: 400; font-family: 'Segoe UI', sans-serif;"
       onmouseover="this.style.color='#3498db'"
       onmouseout="this.style.color='#7f8c8d'">Забыли пароль?</a>
  </div>
</div>

@endsection
