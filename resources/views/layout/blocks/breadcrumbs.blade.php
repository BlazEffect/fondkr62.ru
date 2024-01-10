@unless ($breadcrumbs->isEmpty())
    <div class="breadcrumbs">
        <ul class="breadcrumbs__list">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumbs__item">
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    </li>
                @else
                    <li class="breadcrumbs__item">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless
