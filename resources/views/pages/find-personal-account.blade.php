@extends('app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('find-personal-account') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Узнать свой лицевой счет</h2>

        <div class="main__page-wrapper">
            <div class="find_ls" style="position: relative;">
                @csrf

                <div class="for_class"><div></div></div>
                <input class="kv_input" style="font-size: 1.2em; padding: .3vw .5vw; width: 330px;" type="text" rel="0" id="choose_mo" autocomplete="off" value="" alt="" placeholder="Выберите муниципальное образование">
                <div class="kv_dd" style="display: none; position: absolute; left: -1px; padding: 0px 10px; margin-left: -10px; top: 30px; width: 100%; max-height: 162px; overflow-y: auto; border: 1px solid #2e2e2e; z-index: 1000; background: white;">
                    @foreach($streets as $street)
                        <div class="dda_shown" href="#{{ $street->Id }}" style="display: block !important; color: #333; cursor: pointer;">{{ trim($street->Name) }} {{ trim($street->TypeSmall) }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/pages/find-personal-account.js')
@endsection
