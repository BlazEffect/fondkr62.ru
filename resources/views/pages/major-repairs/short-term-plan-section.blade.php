@extends('app')

@section('title')
    Краткосрочные планы
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('short-term-plan', $shortTermPlans) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Краткосрочные планы</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($shortTermPlans as $shortTermPlan)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/programs/urgent/{{ $shortTermPlan->slug }}">
                            {{ $shortTermPlan->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
