@extends('layouts.app')

@section('title', 'Versenyek')

@section('body_class', 'races-page')

@section('head')
@parent
<style>
    .races-page .wrapper.style4.container {
        max-width: 90em;
        width: 100%;
        box-sizing: border-box;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .race-table-wrapper {
        background: #ffffff;
        border-radius: 6px;
        padding: 2rem 0.5rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.03);
        margin: 0 auto;
        max-width: 100%;
        overflow-x: auto;
    }

    .race-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1100px;
    }

    .race-table th,
    .race-table td {
        padding: 0.75rem 0.9rem;
        vertical-align: middle;
        font-size: 0.9rem;
        text-align: center;
    }

    .race-table thead th {
        background: rgba(0, 0, 0, 0.03);
        border-bottom: 2px solid rgba(0, 0, 0, 0.06);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .race-table tbody tr:nth-child(even) {
        background: rgba(0, 0, 0, 0.01);
    }

    .race-table tbody tr:hover {
        background: rgba(0, 0, 0, 0.03);
    }

    .race-table tbody td {
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }

    .race-table td:nth-child(4),
    .race-table td:nth-child(9),
    .race-table td:nth-child(10),
    .race-table td:nth-child(11) {
        text-align: left;
    }

    .race-table td:nth-child(1),
    .race-table td:nth-child(7),
    .race-table td:nth-child(8),
    .race-table td:last-child {
        white-space: nowrap;
    }

    .race-pagination {
        margin-top: 1.5rem;
        display: flex;
        justify-content: center;
    }

    .race-pagination .pager-wrap {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
    }

    .race-pagination .pager-ctrls {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .race-pagination .pager-info {
        font-size: 0.9rem;
        opacity: 0.85;
    }

    .race-pagination .pager-btn,
    .race-pagination .pager-page {
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

    .race-pagination .pager-btn:hover,
    .race-pagination .pager-page:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .race-pagination .pager-page.active {
        background: #63c5b8;
        border-color: #63c5b8;
        color: #fff;
        font-weight: 600;
    }

    .race-pagination .pager-btn.disabled {
        opacity: 0.4;
        cursor: default;
        background: #f7f7f7;
    }

    .race-pagination .pager-ellipsis {
        padding: 0 0.3rem;
        opacity: 0.6;
    }

    .race-pagination .pager-size-form select {
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        text-align: center;
        text-align-last: center;
    }

    .race-pagination .pager-size-form {
        margin-top: 0.15rem;
        display: flex;
        justify-content: center;
    }

    .race-pagination .pager-size-form select {
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

    .race-pagination .pager-size-form select:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .race-status {
        color: #c0392b;
        font-style: italic;
        font-size: 0.85rem;
        white-space: nowrap;
    }
</style>
@endsection

@section('header')
<span class="icon solid fa-flag-checkered"></span>
<h2>Versenyek</h2>
@endsection

@section('content')
<div class="race-table-wrapper">
    @if($results->count())
    <table class="race-table" id="racesTable">
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Nagydíj neve</th>
                <th>Helyszín</th>

                <th>Pilóta neve</th>
                <th>Nem</th>
                <th>Nemzet</th>

                <th>Pilóta azonosító</th>
                <th>Helyezés</th>
                <th>Csapat</th>
                <th>Típus</th>
                <th>Motor</th>
                <th>Hiba</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
            <tr>
                <td>{{ $row->gp_date ?? $row->result_date }}</td>
                <td>{{ $row->gp_name ?? '-' }}</td>
                <td>{{ $row->gp_location ?? '-' }}</td>

                <td>{{ $row->pilot_name }}</td>
                <td>{{ $row->pilot_gender ?? '-' }}</td>
                <td>{{ $row->pilot_nationality ?? '-' }}</td>

                <td>{{ $row->pilot_id }}</td>
                <td>
                    @if(is_null($row->position))
                    –
                    @else
                    {{ $row->position }}.
                    @endif
                </td>
                <td>{{ $row->team ?? '-' }}</td>
                <td>{{ $row->car_type ?? '-' }}</td>
                <td>{{ $row->engine ?? '-' }}</td>
                <td>
                    @if(!is_null($row->position) && $row->position !== '')
                    -
                    @elseif(!empty($row->error_status))
                    <span class="race-status">{{ $row->error_status }}</span>
                    @else
                    <small>Nincs adat.</small>
                    @endif
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    @php
    $currentPage = $results->currentPage();
    $lastPage = $results->lastPage();
    $total = $results->total();
    $firstItem = $results->firstItem() ?? 0;
    $lastItem = $results->lastItem() ?? 0;

    // Oldallista: [1, ..., current-2..current+2, ..., last]
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

        <div class="race-pagination">
            <div class="pager-wrap">

                <div class="pager-wrap">

                    <div class="pager-ctrls">

                        {{-- Előző nyíl --}}
                        @if($results->onFirstPage())
                        <span class="pager-btn disabled">&laquo;</span>
                        @else
                        <a class="pager-btn" href="{{ $results->previousPageUrl() }}">&laquo;</a>
                        @endif

                        {{-- Oldalszámok --}}
                        <div class="pager-pages">
                            @foreach($pages as $p)
                            @if($p === '...')
                            <span class="pager-ellipsis">…</span>
                            @elseif($p == $currentPage)
                            <span class="pager-page active">{{ $p }}</span>
                            @else
                            <a class="pager-page" href="{{ $results->url($p) }}">{{ $p }}</a>
                            @endif
                            @endforeach
                        </div>

                        {{-- Következő nyíl --}}
                        @if($results->hasMorePages())
                        <a class="pager-btn" href="{{ $results->nextPageUrl() }}">&raquo;</a>
                        @else
                        <span class="pager-btn disabled">&raquo;</span>
                        @endif
                    </div>

                    {{-- <<< IDE kerül a méretválasztó, a gombok és az infó közé >>> --}}
                    <form method="GET" class="pager-size-form">
                        <select name="size" onchange="this.form.submit()">
                            @foreach($perPageOptions as $opt)
                            <option value="{{ $opt }}" {{ $results->perPage() == $opt ? 'selected' : '' }}>
                                {{ $opt }}
                            </option>
                            @endforeach
                        </select>
                    </form>

                    <div class="pager-info">
                        {{ $firstItem }} - {{ $lastItem }} a {{ $total }} - ből.
                    </div>
                </div>
                @else
                <p style="text-align: center; margin: 2rem 0">
                    Nincs megjeleníthető verseny.
                </p>
                @endif
            </div>
            @endsection