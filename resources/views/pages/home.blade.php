@extends('app')

@section('styles')
    @vite('resources/scss/pages/home.scss')
@endsection

@section('main')
    <main class="main">
        <section class="main-cards">
            <div class="main-cards__card">
                <a href="/assets/images/main/cards-block/oplata.png" target="_blank">
                    <img src="/assets/images/main/cards-block/card.png"
                         alt="Оплате взносов"
                         class="main-cards__card-icon">

                    <div class="main-cards__card-text">
                        Об оплате взносов на<br>
                        капитальный ремонт
                    </div>
                </a>
            </div>

            <div class="main-cards__card">
                <a href="/email-receipts">
                    <img src="/assets/images/main/cards-block/letter.png"
                         alt="Получать квитанции"
                         class="main-cards__card-icon">

                    <div class="main-cards__card-text">
                        Получать квитанции за<br>
                        капремонт на<br>
                        электронную почту
                    </div>
                </a>
            </div>

            <div class="main-cards__card">
                <a href="/declaration/declaration/KI21FGc95G0" target="_blank">
                    <img src="/assets/images/main/cards-block/contact.png"
                         alt="Приглашаем на работу"
                         class="main-cards__card-icon">

                    <div class="main-cards__card-text">
                        Приглашаем на работу
                    </div>
                </a>
            </div>

            <div class="main-cards__card">
                <a href="#" target="_blank">
                    <img src="/assets/images/main/cards-block/question.png"
                         alt="Предложение о проведении"
                        class="main-cards__card-icon">

                    <div class="main-cards__card-text">
                        Предложение<br>
                        о проведении<br>
                        капитального ремонта
                    </div>
                </a>
            </div>
        </section>

        <section class="main-about-me">
            <img src="/assets/images/main/about-me-block/person.png"
                 alt="Васин Сергей Владимирович"
                 class="main-about-me__photo">

            <div class="main-about-me__content">
                <h4 class="main-about-me__content-heading">Уважаемые жители Рязани и области!</h4>

                <p class="main-about-me__content-text">
                    Я, Васин Сергей Владимирович, первый заместитель генерального директора – директор<br>
                    по безопасности, режиму и противодействию коррупции фонда капитального ремонта<br>
                    Рязанской области, хотел бы обратиться к вам с предложением. Подробнее...
                </p>
            </div>
        </section>

        <section class="main-questions">
            <div class="main-questions__question">
                <a href="/faq">
                    <img src="/assets/images/main/questions-block/question.png"
                         alt="Вопрос"
                         class="main-questions__question-icon">

                    <div class="main-questions__question-text">
                        Куда обращаться за<br>
                        компенсацией расходов на<br>
                        уплату взносана капремонт
                    </div>
                </a>
            </div>
            <div class="main-questions__question">
                <a href="/faq">
                    <img src="/assets/images/main/questions-block/question.png"
                         alt="Вопрос"
                         class="main-questions__question-icon">

                    <div class="main-questions__question-text">
                        Рекомендации по приёмке<br>
                        работ по капремонту
                    </div>
                </a>
            </div>
            <div class="main-questions__question">
                <a href="/faq">
                    <img src="/assets/images/main/questions-block/question.png"
                         alt="Вопрос"
                         class="main-questions__question-icon">

                    <div class="main-questions__question-text">
                        Алгоритм первоочередных<br>
                        действий в случае залития во<br>
                        время или после капитального<br>
                        ремонта крыши
                    </div>
                </a>
            </div>
            <div class="main-questions__question">
                <a href="/faq">
                    <img src="/assets/images/main/questions-block/question.png"
                         alt="Вопрос"
                         class="main-questions__question-icon">

                    <div class="main-questions__question-text">
                        Отборы подрядных организаций<br>
                        для выполнения работ по<br>
                        капитальному ремонту
                    </div>
                </a>
            </div>
            <div class="main-questions__question">
                <a href="/faq">
                    <img src="/assets/images/main/questions-block/question.png"
                         alt="Вопрос"
                         class="main-questions__question-icon">

                    <div class="main-questions__question-text">
                        Узнайте о своем доме
                    </div>
                </a>
            </div>
            <div class="main-questions__question">
                <div class="main-questions__question-button">
                    Частые вопросы
                </div>
            </div>
        </section>
    </main>
@endsection
