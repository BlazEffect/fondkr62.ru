@extends('app')

@section('title')
    {{ $shortTermPlan->name }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('short-term-plan-item', $shortTermPlan) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $shortTermPlan->name }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($shortTermPlan->documents as $document)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/short-term-plan/{{ $document['document'] }}"
                           target="_blank">
                            {{ $document['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="main__dropdown">
                <label class="main__dropdown-button" for="dropdown-toggle">Ранние редакции</label>
                <input id="dropdown-toggle" type="checkbox">
                <div id="dropdown" class="main__dropdown-content">
                    <div class="main-files__list">
                        @foreach($shortTermPlan['early-documents'] as $earlyDocument)
                            <div class="main-files__item">
                                <a class="main-files__link"
                                   href="/short-term-plan/{{ $earlyDocument['document'] }}"
                                   target="_blank">
                                    {{ $earlyDocument['name'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
