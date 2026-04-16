@extends('layouts.app')
@section('title', 'Настройки email заявок')
@section('content')
<style>
    .settings-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                    0 8px 15px -3px rgba(0, 0, 0, 0.08);
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
        color: #2c3e50;
    }
    .form-control {
        width: 90%;
        padding: 12px 16px;
        border: 1px solid #bdc3c7;
        border-radius: 8px;
        font-size: 14px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #27ae60, #219a52);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 24px;
        border-left: 4px solid #27ae60;
    }

    /* Адаптивность для планшетов (768px — 1024px) */
    @media (max-width: 1024px) {
        .settings-container {
            max-width: 550px;
            padding: 25px;
            margin: 25px auto;
        }
        
        label {
            font-size: 13px;
        }
        
        .form-control {
            padding: 11px 14px;
            font-size: 13px;
        }
        
        .btn-primary {
            padding: 11px 22px;
            font-size: 14px;
        }
    }

    /* Адаптивность для мобильных устройств (до 767px) */
    @media (max-width: 767px) {
        .settings-container {
            max-width: 100%;
            margin: 15px;
            padding: 20px 15px;
            border-radius: 8px;
        }
        
        h1 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 15px;
        }
        
        label {
            font-size: 12px;
            margin-bottom: 6px;
        }
        
        .form-control {
            width: 100%;
            max-width: 100%;
            padding: 10px 12px;
            font-size: 13px;
        }
        
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .alert-success {
            padding: 12px;
            margin-bottom: 20px;
            font-size: 12px;
        }
    }

    /* До 480px */
    @media (max-width: 480px) {
        .settings-container {
            margin: 10px;
            padding: 15px 10px;
        }
        
        h1 {
            font-size: 18px;
        }
        
        .form-control {
            padding: 8px 10px;
            font-size: 12px;
        }
        
        .btn-primary {
            padding: 10px;
            font-size: 13px;
        }
    }
</style>

<div class="settings-container">
    <h1>Настройки email для заявок</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <div class="form-group">
            <label for="application_email">Email для получения заявок</label>
            <input type="email"
                   id="application_email"
                   name="application_email"
                   class="form-control"
                   value="{{ old('application_email', $email) }}"
                   required>
        </div>

        <button type="submit" class="btn-primary">Сохранить настройки</button>
    </form>
</div>
@endsection
