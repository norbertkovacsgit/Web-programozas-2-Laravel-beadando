@extends('layouts.app')

@section('title', 'Admin')

@section('body_class', 'admin-page')

@section('head')
@parent
<style>
    .admin-page .admin-box {
        background: #ffffff;
        border: 1px solid rgba(124, 128, 129, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
        padding: 2.5em;
        min-height: 240px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.15em;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-user-shield"></span>
<h2>Admin felület</h2>
<p>
    Üdv,
    <strong>{{ auth()->user()->name }}</strong>!
</p>
@endsection

@section('wrapper_class', 'style3 container special')
@section('inner_class', 'row aln-center')

@section('content')
<div class="col-10 col-12-narrower">
    <div class="admin-box">
        <strong>Admin szerepkör számára fentartott oldal.</strong>
    </div>
</div>
@endsection