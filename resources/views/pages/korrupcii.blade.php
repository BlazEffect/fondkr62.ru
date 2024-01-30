@extends('app')

@section('styles')
    @vite('resources/scss/pages/korrupcii.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('korrupcii') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Противодействие коррупции</h2>

        <div class="main__page-wrapper">
            <h3>1. Нормативные правовые и иные акты в сфере противодействия коррупции</h3>
            <h4>1.1. Действующие федеральные законы, указы Президента Российской Федерации,
                постановления Правительства Российской Федерации</h4>
            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/fz_25_12_2008_n_273-fz_26_07_2019.pdf"
                       target="_blank">
                        Федеральный закон от <b>25 декабря 2008 № 273-ФЗ</b> «О противодействии коррупции»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/fz_12_01_1996_7-fz.docx"
                       target="_blank">
                        Федеральный закон от 12 января 1996 г. № 7-ФЗ (ред. от 02.07.2021) «О некоммерческих организациях»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/fz_17_07_2009_172-fz.docx"
                       target="_blank">
                        Федеральный закон от 17 июля 2009 г. № 172-ФЗ (ред. от 11.10.2018) "Об антикоррупционной экспертизе нормативных правовых актов и проектов нормативных актов"
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/Ukaz_19_05_2008_815.docx"
                       target="_blank">
                        Указ Президента Российской Федерации от 19 мая 2008 г. № 815 (ред. от 17.05.2021) «О мерах по противодействию коррупции»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/Ukaz_16_08_2021_478.docx"
                       target="_blank">
                        Указ Президента Российской Федерации от 16 августа 2021 г. № 478 «О Национальном плане противодействия коррупции на 2021 - 2024 годы»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/Ukaz_16_08_2021_478.docx"
                       target="_blank">
                        Указ Президента Российской Федерации от 16 августа 2021 г. № 478 «О Национальном плане противодействия коррупции на 2021 - 2024 годы»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/Post_26_02_2010_96.docx"
                       target="_blank">
                        Постановление
                        Правительства Российской Федерации от 26 февраля 2010 г. № 96 (ред. от 10.07.2017) "Об
                        антикоррупционной экспертизе нормативных правовых актов и проектов нормативных правовых актов"
                        (вместе с "Правилами проведения антикоррупционной экспертизы нормативных правовых актов и проектов
                        нормативных правовых актов", "Методикой проведения антикоррупционной экспертизы нормативных правовых
                        актов и проектов нормативных правовых актов")
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/Post_01_07_2016_615.docx"
                       target="_blank">
                        Постановление
                        Правительства Российской Федерации от 1 июля 2016 г. № 615 (ред. от 03.11.2021) "О порядке
                        привлечения подрядных организаций для оказания услуг и (или) выполнения работ по капитальному
                        ремонту общего имущества в многоквартирном доме и порядке осуществления закупок товаров, работ,
                        услуг в целях выполнения функций специализированной некоммерческой организации, осуществляющей
                        деятельность, направленную на обеспечение проведения капитального ремонта общего имущества в
                        многоквартирных домах" (вместе с "Положением о привлечении специализированной некоммерческой
                        организации, осуществляющей деятельность, направленную на обеспечение проведения капитального
                        ремонта общего имущества в многоквартирных домах, подрядных организаций для оказания услуг и (или)
                        выполнения работ по капитальному ремонту общего имущества в многоквартирном доме")
                    </a>
                </div>
            </div>
            <h4>1.2. Законы Рязанской области, постановления Правительства Рязанской области</h4>

            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/region/rz_15_07_2010_N_70-OZ.pdf"
                       target="_blank">
                        Региональный
                        закон от <b>15 июля 2010 № 70-ФЗ</b> «О регулировании отдельных вопросов противодействия коррупции в
                        Рязанской области»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/region/post_14_08_2018_234.docx"
                       target="_blank">
                        Постановление
                        Правительства Рязанской области от 14.08.2018 N 234 "О Порядке определения невозможности оказания
                        услуг и (или) выполнения работ по капитальному ремонту общего имущества в многоквартирном доме
                        вследствие установления фактов воспрепятствования проведению работ по капитальному ремонту общего
                        имущества в многоквартирном доме"
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/region/post_16_03_2016_47.docx"
                       target="_blank">
                        Постановление
                        Правительства Рязанской области от 16.03.2016 N 47 (ред. от 09.12.2019) "Об определении Порядка
                        установления необходимости проведения капитального ремонта общего имущества в многоквартирном
                        доме"
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/region/post_06_06.2018_158.docx"
                       target="_blank">
                        Постановление
                        Правительства Рязанской области от 06.06.2018 N 158 (ред. от 05.11.2019) "Об утверждении Порядка
                        принятия решения о проведении капитального ремонта общего имущества в многоквартирном доме в случае
                        возникновения аварии, иных чрезвычайных ситуаций природного или техногенного характера"
                    </a>
                </div>
            </div>

            <h4>1.3. Локальные нормативные акты</h4>
            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/local/antikor_politika.pdf"
                       target="_blank">
                        Приказ Фонда
                        капитального ремонта многоквартирных домов Рязанской области от 3 марта 2020 г. № 0303/5 «О внесении
                        изменений в антикоррупционную политику Фонда капитального ремонта многоквартирных домов Рязанской
                        области»
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/local/kodeks_etiki.pdf"
                       target="_blank">
                        Кодекс этики и
                        служебного поведения работников Фонд капитального ремонта многоквартирных домов Рязанской
                        области
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/local/poryadok_prinyatiya_mer.pdf"
                       target="_blank">
                        Порядок
                        принятия работниками Фонда капитального ремонта многоквартирных домов Рязанской области мер по
                        недопущению любой возможности возникновения (предотвращению) конфликта интересов
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/local/prikaz_plan_meropriyatiy_2023.pdf"
                       target="_blank">
                        Приказ
                        Фонда капитального ремонта многоквартирных домов Рязанской области от № «Об утверждении Плана
                        мероприятий по противодействию коррупции Фонда капитального ремонта многоквартирных домов Рязанской
                        области на 2023 год»
                    </a>
                </div>
            </div>
            <h3>2. Формы документов</h3>
            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/konflikt-interesov.docx"
                       target="_blank">
                        Декларация
                        конфликтов интересов
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/uvedomlenie-konfl-inter.docx"
                       target="_blank">
                        Уведомление о
                        возникшем конфликте интересов или о возможности его возникновения
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/zhurnal-registracii-konfl.docx"
                       target="_blank">
                        Журнал
                        регистрации уведомлений о возникшем конфликте интересов или о возможности его возникновения
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/uvedoml-fact-obr.docx"
                       target="_blank">
                        Уведомление о факте
                        обращения в целях склонения работника Фонда капитального ремонта МКД Рязанской области к совершению
                        коррупционных правонарушений
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/konflikt-interesov.docx"
                       target="_blank">
                        Журнал регистрации уведомлений о фактах обращений в целях склонения работников Фонда капитального ремонта МКД Рязанской области к совершению коррупционных правонарушений
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/talon-uvedomleniya.docx"
                       target="_blank">
                        Талон-уведомление
                        работодателя о фактах обращения в целях склонения работника Фонда капитального ремонта МКД Рязанской
                        области к совершению коррупционных нарушений
                    </a>
                </div>
            </div>

            <h3>3. Комиссия по противодействию коррупции и урегулированию конфликта интересов в Фонде</h3>
            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/polozhenie-komissiya-protiv-kor-22.docx"
                       target="_blank">
                        Положение
                        о комиссии по противодействию коррупции и урегулированию конфликта интересов в Фонде каритального
                        ремонта МКД Рязанской области
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/korrupcii/protokol-protiv-kor.pdf"
                       target="_blank">
                        Протоколы
                    </a>
                </div>
            </div>
            <h3>4. Обращение руководителя учреждения о нетерпимости коррупционных проявлений</h3>
            <p>Одна из наиболее острых проблем, которые существуют в обществе, в нашей стране, – проблема коррупции.
                Коррупция - это злоупотребление служебным положением, дача взятки, получение взятки, злоупотребление
                полномочиями, коммерческий подкуп либо иное незаконное использование физическим лицом своего
                должностного положения вопреки законным интересам общества и государства в целях получения выгоды в виде
                денег, ценностей, иного имущества или услуг имущественного характера, иных имущественных прав для себя
                или для третьих лиц либо незаконное предоставление такой выгоды указанному лицу другими физическими
                лицами.</p>
            <p>Одной из важнейших задач, которые решаются в Фонде капитального ремонта многоквартирных домов Рязанской
                области является активизация антикоррупционного просвещения работников, основ противостояния коррупции,
                гражданской позиции и устойчивых навыков антикоррупционного поведения.</p>
            <p>Эффективно решать поставленные задачи позволяют принятие локальных актов по противодействию коррупции, с
                которыми вы можете познакомиться на нашем сайте в разделе «Противодействие коррупции».</p>
            <p>В целях противодействия коррупции я призываю всех сотрудников Фонда капитального ремонта многоквартирных
                домов Рязанской области проявить нетерпимость к коррупционным проявлениям и выполнить свой
                профессиональный долг посредством уведомления руководителя обо всех случаях обращения каких-либо лиц в
                целях склонения его к совершению коррупционных правонарушений.</p>
            <p></p>
            <h3>5. Сообщение о фактах коррупции</h3>
            <p>Уважаемые посетители!</p>
            <p>Кратко и грамотно сформулируйте текст вашего обращения. В теме обращения напишите главное.</p>
            <p>Чтобы получить оперативный и точный ответ на ваш вопрос, заполните обязательные поля формы. Они выделены
                красными звездочками.</p>
            <p>Ваше обращение будет рассмотрено в течение 30 дней.</p>
            <p>Информация о персональных данных граждан, направивших обращение в электронную приемную, хранится и
                обрабатывается с соблюдением требований Федерального закона от 27.07.2006 №152-ФЗ «О персональных
                данных».</p>

            <div class="main-korrupcii-form-errors">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if(session()->has('message'))
                <div>{{ session()->get('message') }}</div>
            @endif

            <form action="{{ route('korrupcii.store') }}" class="main-korrupcii-form" method="post">
                @csrf

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="second_name">Фамилия:*</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="second_name"
                           id="second_name"
                           placeholder="Фамилия">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="first_name">Имя:*</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="first_name"
                           id="first_name"
                           placeholder="Имя">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="third_name">Отчество (при наличии):</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="third_name"
                           id="third_name"
                           placeholder="Отчество (при наличии)">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="email">Электронный адрес:*</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="email"
                           id="email"
                           placeholder="Электронный адрес">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="adres">Адрес:</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="adres"
                           id="adres"
                           placeholder="Адрес">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="theme">Тема обращения:*</label>
                    <input class="main-korrupcii-form__input"
                           type="text"
                           name="theme"
                           id="theme"
                           placeholder="Тема обращения">
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label" for="detail_text">Текст обращения:*</label>
                    <textarea class="main-korrupcii-form__input"
                              name="detail_text"
                              id="detail_text"
                              placeholder="Текст обращения"></textarea>
                </div>

                <div class="main-korrupcii-form__control">
                    <label class="main-korrupcii-form__label">Согласны ли вы, что ваше обращение может быть опубликовано на официальном сайте?
                        <input type="radio" name="public_agree" value="2" checked="">Да
                        <input type="radio" name="public_agree" value="3">Нет
                    </label>
                </div>

                <label>
                    <input type="checkbox" id="checkPersonal">
                    Я подтверждаю свое согласие на обработку своих персональных данных
                </label>

                <div class="main-korrupcii-form__control">
                    <button type="submit" class="main-korrupcii-form__button" disabled="disabled">
                        Отправить обращение
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/pages/korrupcii.js')
@endsection
