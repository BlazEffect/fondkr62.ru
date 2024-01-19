@extends('app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('regulatory-base-section', $regulatoryBases->first()) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $regulatoryBasesSection }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($regulatoryBases as $regulatoryBase)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/bazaprav/{{ $regulatoryBase->section_name }}/{{ $regulatoryBase->slug }}">
                            {{ $regulatoryBase->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
