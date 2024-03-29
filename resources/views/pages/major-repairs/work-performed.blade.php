@extends('app')

@section('title')
    Перечень многоквартирных домов, в которых проводится капитальный ремонт в рамках реализации краткосрочных планов региональной программы капитального ремонта общего имущества
@endsection

@section('styles')
    @vite('resources/scss/pages/work-performed.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('work-performed') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Перечень многоквартирных домов, в которых проводится капитальный ремонт в рамках реализации краткосрочных планов региональной программы капитального ремонта общего имущества</h2>

        <div class="main__page-wrapper">
            {!! $html !!}
        </div>
    </main>
@endsection

@section('scripts')
    <script>var yearValue = '2020';</script>
    @vite('resources/js/pages/work-performed.js')
@endsection
