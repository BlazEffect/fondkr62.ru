@extends('app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('regulatory-base', $regulatoryBase) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $regulatoryBase->name }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($regulatoryBase->documents as $document)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/regulatory-base/{{ $document['document'] }}"
                           target="_blank">
                            {{ $document['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
