@extends('layouts.app')

@section('title', 'Kapcsolat')

@section('wrapper_class', 'style4 special container medium')
@section('inner_class', 'content')

@section('head')
@parent
<style>
    .contact-success {
        background: #e6ffed;
        border: 1px solid #b7ebc6;
        color: #14532d;
        padding: 0.75em 1em;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 0.95rem;
    }

    .contact-error {
        background: #ffecec;
        border: 1px solid #f5c2c7;
        color: #7a1212;
        padding: 0.75em 1em;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 0.95rem;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-envelope"></span>
<h2>Kapcsolat</h2>
@endsection

@section('content')

@if(session('success'))
<p class="contact-success">{{ session('success') }}</p>
@endif

@if($errors->any())
<p class="contact-error">Kérjük töltsön ki minden mezőt!</p>
@endif

<form method="POST" action="{{ route('contact.submit') }}" novalidate>
    @csrf

    <div class="row gtr-50">
        <div class="col-6 col-12-mobile">
            <input
                type="text"
                name="name"
                placeholder="Név"
                required
                value="{{ old('name') }}" />
        </div>

        <div class="col-6 col-12-mobile">
            <input
                type="email"
                name="email"
                placeholder="Email"
                required
                value="{{ old('email') }}" />
        </div>

        <div class="col-12">
            <input
                type="text"
                name="subject"
                placeholder="Tárgy"
                required
                value="{{ old('subject') }}" />
        </div>

        <div class="col-12">
            <textarea
                name="message"
                placeholder="Üzenet"
                rows="7"
                required>{{ old('message') }}</textarea>
        </div>

        <div class="col-12">
            <ul class="buttons">
                <li>
                    <input type="submit" class="special" value="Küldés" />
                </li>
            </ul>
        </div>
    </div>
</form>
@endsection