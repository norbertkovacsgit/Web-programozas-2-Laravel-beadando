@extends('layouts.app')

@section('title', 'Bejelentkezés')

@section('body_class', 'login-page')

@section('head')
@parent
<style>
    .login-wrapper {
        display: flex;
        justify-content: center;
    }

    .login-box {
        display: inline-block;
        background: #ffffff;
        padding: 2.5rem 3rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02);
    }

    .login-box form {
        margin: 0;
    }

    .login-box label {
        display: block;
        margin-bottom: 1rem;
        font-weight: 400;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
        width: 100%;
        box-sizing: border-box;
    }

    .login-box .button {
        display: block;
        width: 100%;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .login-errors {
        margin-bottom: 1.5rem;
        color: #c0392b;
        list-style: none;
        padding-left: 0;
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

    .login-page .wrapper.style4.container {
        background: transparent;
        box-shadow: none;
        border: none;
        padding-top: 0;
        padding-bottom: 0;
    }

    .login-page .wrapper.style4.container .content {
        padding: 0;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-sign-in-alt"></span>
<h2>Bejelentkezés</h2>
@endsection

@section('content')
<div class="login-wrapper">
    <div class="login-box">
        @if($errors->any())
        <div class="alert-box alert-error">
            @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
            @endforeach
        </div>
        @endif


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>Email
                <input type="email" name="email" value="{{ old('email') }}">
            </label>

            <label>Jelszó
                <input type="password" name="password">
            </label>

            <button type="submit" class="button primary">Belépés</button>
        </form>
    </div>
</div>
@endsection