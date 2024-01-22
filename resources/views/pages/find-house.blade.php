@extends('app')

@section('styles')
    @vite('node_modules/slim-select/dist/slimselect.css')
    @vite('resources/scss/pages/find-house.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('find-house') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Узнайте о своем доме</h2>

        <div class="main__page-wrapper">
            <div class="main-selectors">
                @csrf

                <div class="main-selectors__municipalities-selector">
                    <select>
                        <option data-placeholder="true"></option>
                        <optgroup label="Городские округа Рязанской области">
                            @foreach($arrMunicipalities as $codeMunicipalitie => $arrMunicipalitie)
                                @if ($arrMunicipalitie['Type'] === "R")
                                    @break
                                @endif

                                <option value="{{ $codeMunicipalitie }}">г. {{ $arrMunicipalitie['Name'] }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Районы Рязанской области">
                            @foreach($arrMunicipalities as $codeMunicipalitie => $arrMunicipalitie)
                                @if ($arrMunicipalitie['Type'] === "R")
                                    <option value="{{ $codeMunicipalitie }}">{{ $arrMunicipalitie['Name'] }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="main-selectors__streets-selector">
                    <select>
                    </select>
                </div>
            </div>

            <div class="main__house-info">

            </div>

            <div class="main__footer-text">
                Общее количество многоквартирных домов Рязанской области, формирующих фонд капитального ремонта на счете регионального оператора, &ndash;
                {{ $countHouseOnShetRegionOperator }} (площадью {{ $countCommonAreaMKD }} кв.м)<br/>

                @if ($countHouseOnSpecShetOwnerRegionOperator !== 0)
                    Общее количество многоквартирных домов Рязанской области, формирующих фонды капитального ремонта на специальных счетах,
                    владельцем которых является региональный оператор, &ndash; {{ $countHouseOnSpecShetOwnerRegionOperator }}<br/>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/pages/find-house.js')
@endsection
