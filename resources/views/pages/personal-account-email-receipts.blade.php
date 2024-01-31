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
                        <label class="main-receipts-form__label" for="personal-account">лицевой счет №:</label>
                        <input class="main-receipts-form__input"
                               type="text"
                               name="personal-account"
                               id="personal-account"
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

                    <div class="main-receipts-form__control">
                        <label class="main-receipts-form__label" for="userfile">
                            Подтверждающий документ:
                        </label>
                        <input class="main-receipts-form__input"
                               type="file"
                               name="userfile"
                               id="userfile">
                    </div>

                    <div class="main-receipts-form__control">
                        <input class="main-receipts-form__input"
                               type="checkbox"
                               name="agree"
                               id="agree"
                               checked>
                        <label class="main-receipts-form__label" for="agree">
                            Я, даю свое согласие Фонду капитального ремонта многоквартирных домов Рязанской области
                            (далее – Фонд), расположенному по адресу г. Рязань, ул. Маяковского, д. 1а, строение 3
                            (корпус Е), на обработку моих персональных данных автоматизированным и неавтоматизированным
                            (смешенным) способом. Согласие касается фамилии, имени, отчества, адреса регистрации, типа
                            документа, удостоверяющего личность (его серии, номера, даты и места выдачи), банковских
                            данных, информации, подтверждающей право собственности на помещение.
                            Я даю согласие на использование персональных данных, включая сбор, запись, систематизацию,
                            накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу
                            (распространение, предоставление, доступ), обезличивание, блокирование, удаление,
                            уничтожение, исключительно в целях формирования документооборота Фонда, бухгалтерских
                            операций и возврата денежных средств, внесения изменений в информационную базу Фонда ПК ODA,
                            а также осуществление любых иных действий, предусмотренных действующим законом Российской
                            Федерации.
                            До моего сведения доведено, что Фонд гарантирует обработку моих персональных данных в
                            соответствии с действующим законодательством Российской Федерации.
                            Срок действия данного согласия устанавливается до момента поступления в Фонд информации о
                            смене собственника. Согласие может быть отозвано в любой момент по моему письменному
                            заявлению.
                            Подтверждаю, что, давая согласие, я действую без принуждения, по собственной воле и в своих
                            интересах.
                            В виду того, что передача квитанций будет осуществляться по открытым каналам данных по
                            средством сети Интернет, Фонд не несет ответственности за попадание данной квитацнии третьим
                            лицам.
                        </label>
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
