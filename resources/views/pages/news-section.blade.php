@extends('app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('news-section', $news->first()) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $newsSectionName }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($news as $new)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/news/{{ $new->section_name }}/{{ $new->slug }}">
                            {{ $new->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
