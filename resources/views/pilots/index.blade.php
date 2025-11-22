@extends('layouts.app')

@section('title', 'Pilóták')

@section('body_class', 'pilots-page')

@section('head')
@parent
<style>
    .pilot-flash-wrap {
        text-align: center;
        margin-bottom: 1rem;
    }

    .pilot-flash {
        display: inline-block;
        padding: 0.6em 0.9em;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .pilot-flash-success {
        background: #e6ffed;
        border: 1px solid #b7ebc6;
        color: #14532d;
    }

    .pilot-flash-error {
        background: #ffecec;
        border: 1px solid #f5c2c7;
        color: #7a1212;
    }

    .pilots-page .wrapper.style4.container {
        max-width: 80em;
        width: 100%;
        box-sizing: border-box;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .pilots-table-wrapper {
        background: #ffffff;
        border-radius: 6px;
        padding: 2rem 2.5rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.03);
        margin: 0 auto;
        max-width: 100%;
        overflow-x: auto;
    }

    .pilots-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }

    .pilots-table th,
    .pilots-table td {
        padding: 0.75rem 0.9rem;
        vertical-align: middle;
        font-size: 0.9rem;
        text-align: left;
    }

    .pilots-table thead th {
        background: rgba(0, 0, 0, 0.03);
        border-bottom: 2px solid rgba(0, 0, 0, 0.06);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .pilots-table tbody tr:nth-child(even) {
        background: rgba(0, 0, 0, 0.01);
    }

    .pilots-table tbody tr:hover {
        background: rgba(0, 0, 0, 0.03);
    }

    .pilots-table tbody td {
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }

    .pilots-table td.actions {
        white-space: nowrap;
        text-align: right;
    }

    .pilots-table td small {
        color: #888;
    }

    .pilots-create-form {
        margin-bottom: 1.5rem;
        padding: 1rem 1.25rem;
        border-radius: 6px;
        background: #f7fafb;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .pilots-create-form h3 {
        margin: 0 0 0.75rem 0;
        font-size: 1rem;
    }

    .pilots-create-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 0.75rem;
    }

    .pilots-create-grid .field {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .pilots-create-grid label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #777;
    }

    :root {
        --pilot-control-height: 2.2rem;
    }

    .pilots-create-grid input[type="text"],
    .pilots-create-grid input[type="date"],
    .pilots-create-actions .button {
        height: var(--pilot-control-height);
        box-sizing: border-box;
        font-size: 0.85rem;
        padding: 0 0.75rem;
        min-width: 0;
    }

    .pilots-create-grid input[type="text"],
    .pilots-create-grid input[type="date"] {
        border: 1px solid rgba(0, 0, 0, 0.15);
    }

    .pilots-create-actions {
        margin-top: 0.5rem;
        text-align: left;
    }

    .pilots-create-actions .button {
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 600;
    }

    @media (max-width: 600px) {
        .pilots-create-grid {
            grid-template-columns: 1fr;
        }
    }

    .pilots-pagination {
        margin-top: 1.5rem;
        display: flex;
        justify-content: center;
    }

    .pilots-pagination .pager-wrap {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
    }

    .pilots-pagination .pager-ctrls {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .pilots-pagination .pager-info {
        font-size: 0.9rem;
        opacity: 0.85;
    }

    .pilots-pagination .pager-btn,
    .pilots-pagination .pager-page {
        border-radius: 3px;
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        border: 1px solid rgba(0, 0, 0, 0.15);
        background: #ffffff;
        color: #555;
        text-decoration: none;
        min-width: 2.2em;
        text-align: center;
    }

    .pilots-pagination .pager-btn:hover,
    .pilots-pagination .pager-page:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .pilots-pagination .pager-page.active {
        background: #63c5b8;
        border-color: #63c5b8;
        color: #fff;
        font-weight: 600;
    }

    .pilots-pagination .pager-btn.disabled {
        opacity: 0.4;
        cursor: default;
        background: #f7f7f7;
    }

    .pilots-pagination .pager-ellipsis {
        padding: 0 0.3rem;
        opacity: 0.6;
    }

    .pilots-pagination .pager-size-form {
        margin-top: 0.15rem;
        display: flex;
        justify-content: center;
    }

    .pilots-pagination .pager-size-form select {
        border-radius: 3px;
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        border: 1px solid rgba(0, 0, 0, 0.15);
        background: #ffffff;
        color: #555;
        text-align: center;
        text-align-last: center;
        min-width: 3.5em;
    }

    .pilots-pagination .pager-size-form select:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .pilot-action-btn {
        font-size: 0.65rem;
        padding: 0.15em 0.6em;
        line-height: 1.1;
        border-radius: 3px;
        min-width: auto;
    }

    .pilot-save-btn {
        background: #63c5b8;
        border: 1px solid #63c5b8;
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .pilot-save-btn:hover {
        background: #48b3a4;
        border-color: #48b3a4;
        color: #ffffff;
    }

    .pilot-cancel-btn {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.18);
        color: #555;
    }

    .pilot-cancel-btn:hover {
        background: #f2f2f2;
        border-color: rgba(0, 0, 0, 0.28);
        color: #333;
    }

    .pilot-edit-btn {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.18);
        color: #555;
    }

    .pilot-edit-btn:hover {
        background: #e8f2ff;
        border-color: #7ba7e3;
        color: #274472;
    }

    .pilot-delete-btn {
        background: #ffecec;
        border: 1px solid #f5b5b5;
        color: #a33;
    }

    .pilot-delete-btn:hover {
        background: #ffd9d9;
        border-color: #e88b8b;
        color: #861f1f;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-users"></span>
<h2>Pilóták</h2>
@endsection

@section('wrapper_class', 'style4 container')

@section('content')
<div class="pilots-table-wrapper">
    @if(session('success') || $errors->any())
    <div class="pilot-flash-wrap">
        @if(session('success'))
        <div class="pilot-flash pilot-flash-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="pilot-flash pilot-flash-error">
            Kérjük, javítsa a hibákat az űrlapban!
        </div>
        @endif
    </div>
    @endif

    <div class="pilots-create-form">
        <h3>Új pilóta hozzáadása</h3>
        <form method="POST" action="{{ route('pilots.store') }}">
            @csrf
            <div class="pilots-create-grid">
                <div class="field">
                    <label for="new_name">Név</label>
                    <input id="new_name" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="field">
                    <label for="new_gender">Nem (F/N)</label>
                    <input id="new_gender" type="text" name="gender" value="{{ old('gender') }}" maxlength="1">
                </div>
                <div class="field">
                    <label for="new_birth_date">Születési dátum</label>
                    <input id="new_birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}">
                </div>
                <div class="field">
                    <label for="new_nationality">Nemzetiség</label>
                    <input id="new_nationality" type="text" name="nationality" value="{{ old('nationality') }}">
                </div>
            </div>
            <div class="pilots-create-actions">
                <button type="submit" class="button small primary">
                    Pilóta létrehozása
                </button>
            </div>
        </form>
    </div>

    @if($pilots->isEmpty())
    <p style="text-align:center; margin: 2rem 0;">
        Nincs megjeleníthető pilóta.
    </p>
    @else
    <table class="pilots-table">
        <thead>
            <tr>
                <th>Név</th>
                <th>Nem</th>
                <th>Nemzetiség</th>
                <th>Születési dátum</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pilots as $pilot)
            @if($editingId == $pilot->id)
            <tr>
                <form method="POST" action="{{ route('pilots.update', $pilot) }}">
                    @csrf
                    @method('PUT')
                    <td>
                        <input type="text" name="name" value="{{ old('name', $pilot->name) }}">
                    </td>
                    <td>
                        <input type="text" name="gender" value="{{ old('gender', $pilot->gender) }}" maxlength="1">
                    </td>
                    <td>
                        <input type="text" name="nationality" value="{{ old('nationality', $pilot->nationality) }}">
                    </td>
                    <td>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $pilot->birth_date ? \Carbon\Carbon::parse($pilot->birth_date)->format('Y-m-d') : '') }}">
                    </td>
                    <td class="actions">
                        <button type="submit"
                            class="button small pilot-action-btn pilot-save-btn">
                            Mentés
                        </button>

                        <a href="{{ route('pilots.index', request()->except('edit')) }}"
                            class="button small pilot-action-btn pilot-cancel-btn"
                            style="margin-left: 0.25rem;">
                            Mégse
                        </a>
                    </td>

                </form>
            </tr>
            @else
            <tr>
                <td>{{ $pilot->name }}</td>
                <td>{{ $pilot->gender ?? '-' }}</td>
                <td>{{ $pilot->nationality ?? '-' }}</td>
                <td>
                    @if($pilot->birth_date)
                    {{ \Carbon\Carbon::parse($pilot->birth_date)->format('Y.m.d') }}
                    @else
                    <small>nincs adat</small>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('pilots.index', array_merge(request()->query(), ['edit' => $pilot->id])) }}"
                        class="button small pilot-action-btn pilot-edit-btn">
                        Szerk.
                    </a>

                    <form action="{{ route('pilots.destroy', $pilot) }}"
                        method="POST"
                        style="display:inline-block; margin-left:0.25rem;"
                        onsubmit="return confirm('Biztosan törlöd ezt a pilótát?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button small pilot-action-btn pilot-delete-btn">
                            Törlés
                        </button>
                    </form>
                </td>

            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    @php
    $currentPage = $pilots->currentPage();
    $lastPage = $pilots->lastPage();
    $total = $pilots->total();
    $firstItem = $pilots->firstItem() ?? 0;
    $lastItem = $pilots->lastItem() ?? 0;

    $pages = [];

    if ($lastPage > 0) {
    $pages[] = 1;

    $start = max(2, $currentPage - 2);
    $end = min($lastPage - 1, $currentPage + 2);

    if ($start > 2) {
    $pages[] = '...';
    }

    for ($i = $start; $i <= $end; $i++) {
        $pages[]=$i;
        }

        if ($end < $lastPage - 1) {
        $pages[]='...' ;
        }

        if ($lastPage> 1) {
        $pages[] = $lastPage;
        }
        }

        $perPageOptions = [5, 10, 25, 50, 100, 200];
        @endphp

        <div class="pilots-pagination">
            <div class="pager-wrap">

                <div class="pager-ctrls">
                    @if($pilots->onFirstPage())
                    <span class="pager-btn disabled">&laquo;</span>
                    @else
                    <a class="pager-btn" href="{{ $pilots->previousPageUrl() }}">&laquo;</a>
                    @endif

                    <div class="pager-pages">
                        @foreach($pages as $p)
                        @if($p === '...')
                        <span class="pager-ellipsis">…</span>
                        @elseif($p == $currentPage)
                        <span class="pager-page active">{{ $p }}</span>
                        @else
                        <a class="pager-page" href="{{ $pilots->url($p) }}">{{ $p }}</a>
                        @endif
                        @endforeach
                    </div>

                    @if($pilots->hasMorePages())
                    <a class="pager-btn" href="{{ $pilots->nextPageUrl() }}">&raquo;</a>
                    @else
                    <span class="pager-btn disabled">&raquo;</span>
                    @endif
                </div>

                <form method="GET" class="pager-size-form">
                    <select name="size" onchange="this.form.submit()">
                        @foreach($perPageOptions as $opt)
                        <option value="{{ $opt }}" {{ $pilots->perPage() == $opt ? 'selected' : '' }}>
                            {{ $opt }}
                        </option>
                        @endforeach
                    </select>
                </form>

                <div class="pager-info">
                    {{ $firstItem }} - {{ $lastItem }} a {{ $total }} - ból.
                </div>
            </div>
        </div>
        @endif
</div>
@endsection