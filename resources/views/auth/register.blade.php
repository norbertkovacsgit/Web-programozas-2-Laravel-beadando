@extends('layouts.app')

@section('title', 'Regisztráció')

@section('body_class', 'register-page')

@section('head')
@parent
<style>
    .register-wrapper {
        display: flex;
        justify-content: center;
    }

    .register-box {
        display: inline-block;
        background: #ffffff;
        padding: 2.5rem 3rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02);
    }

    .register-box form {
        margin: 0;
    }

    .register-box label {
        display: block;
        margin-bottom: 1rem;
        font-weight: 400;
    }

    .register-box input[type="text"],
    .register-box input[type="email"],
    .register-box input[type="password"] {
        width: 100%;
        box-sizing: border-box;
    }

    .register-box .button {
        display: block;
        width: 100%;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-box.alert-error {
        background: rgba(192, 57, 43, 0.08);
        border: 1px solid rgba(192, 57, 43, 0.4);
        color: #c0392b;
        padding: 0.75rem 1rem;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
        text-align: center;
    }

    .alert-box.alert-error p {
        margin: 0;
    }

    .register-page .wrapper.style4.container {
        background: transparent;
        box-shadow: none;
        border: none;
        padding-top: 0;
        padding-bottom: 0;
    }

    .register-page .wrapper.style4.container .content {
        padding: 0;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-user-plus"></span>
<h2>Regisztráció</h2>
@endsection

@section('content')
<div class="register-wrapper">
    <div class="register-box">

        @if($errors->any())
        <div class="alert-box alert-error">
            @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label>Név
                <input type="text" name="name" value="{{ old('name') }}">
            </label>

            <label>Email
                <input type="email" name="email" value="{{ old('email') }}">
            </label>

            <label>Jelszó
                <input type="password" name="password">
            </label>

            <label>Jelszó megerősítése
                <input type="password" name="password_confirmation">
            </label>

            <button type="submit" class="button primary">
                Regisztráció
            </button>
        </form>
    </div>
</div>
@endsection