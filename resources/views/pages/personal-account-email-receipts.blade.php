@extends('app')

@section('styles')
    @vite('resources/scss/pages/personal-account-email-receipts.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('email-receipts') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Заявление на получение квитанции на электронную почту</h2>

        <div class="main__page-wrapper">
            <form method="post" action="" class="main-receipts-form">
                <div class="main-receipts-form__half-width">
                    И.о. генерального директора Фонда капитального ремонта А.Л. Роготовскому

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="from">От:</label>
                        <input class="main-receipts-form__input" type="text" name="from" id="from" placeholder="От">
                    </div>

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="address">Адрес:</label>
                        <input class="main-receipts-form__input"
                               type="text"
                               name="address"
                               id="address"
                               placeholder="Адрес">
                    </div>

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="telephone">Телефон:</label>
                        <input class="main-receipts-form__input"
                               type="tel"
                               name="telephone"
                               id="telephone"
                               placeholder="Телефон">
                    </div>
                </div>

                <div class="main-receipts-form__full-width">
                    <div class="main-receipts-form__heading">
                        Заявление
                    </div>

                    <div class="main-receipts-form__content">
                        Прошу платежные документы на оплату взносов на капитальный ремонт общего имущества в
                        многоквартирном доме, расположенном по адресу:
                    </div>

                    <div class="main-receipts-form__control">
                        <input class="main-receipts-form__input"
                               type="text"
                               name="address1"
                               id="address1"
                               placeholder="Адрес">
                    </div>

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="personal-accaount">лицевой счет №:</label>
                        <input class="main-receipts-form__input"
                               type="text"
                               name="personal-accaount"
                               id="personal-accaount"
                               placeholder="лицевой счет №">
                    </div>

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="email">
                            направлять на следующий электронный адрес:
                        </label>
                        <input class="main-receipts-form__input"
                               type="text"
                               name="email"
                               id="email"
                               placeholder="Email">
                    </div>

                    <div class="main-review-form__control">
                        <button type="submit" class="main-receipts-form__button">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
