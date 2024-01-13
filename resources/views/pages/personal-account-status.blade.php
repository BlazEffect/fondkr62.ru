@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('styles')
    @vite('resources/scss/pages/personal-account-status.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('personal-account-status') }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Состояние лицевого счета</h2>

        <div class="main__page-wrapper">
            <div class="main-personal-account-status">
                @csrf

                <input type="text"
                       class="main-personal-account-status__input"
                       placeholder="Введите лицевой счёт"
                       name="personal-account-code">

                <div class="main-personal-account-status__button">
                    Получить информацию**
                </div>
            </div>

            <div class="main-personal-account-status__helper-text">
                16 цифр без дополнительных символов*
            </div>

            <div class="main-personal-account-status__error"></div>

            <div class="main-personal-account-status__data"></div>

            <div class="main-personal-account-status__info">
                <p>
                    *Ваш лицевой счет в базе Фонда приведен в направленном Вам платежном документе
                    (информационном извещении) в графе Лицевой счет, а также под линейным штрих-кодом:
                </p>

                <img src="/assets/images/personal-account-status/barcode.png"
                     alt=""
                     class="main-personal-account-status__info-picture">

                <p>
                    **Данные о балансе лицевого счета обновляются в информационной базе Фонда после фактического
                    получения Фондом средств от платежного агента (кредитной организации), в котором(ой) собственник
                    осуществил уплату взноса. Этот процесс может занять несколько дней.Данные о лицевых счетах,
                    доступные в базах платежных агентов (кредитных организаций), обновляются ежемесячно.
                </p>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/pages/personal-account-status.js')
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.20/JsBarcode.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="/assets/js/qr.js"></script>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
