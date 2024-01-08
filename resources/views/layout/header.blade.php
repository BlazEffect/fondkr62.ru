<header class="header">
    <div class="header-top">
        <div class="header-top__container">
            <div class="header-top__logo">
                <a href="/" class="header-top__logo-link">
                    <img src="/assets/images/header/logo.png" alt="logo" class="header-top__logo-image">

                    <div class="header-top__logo-text">
                        Фонд капитального ремонта<br>
                        многоквартирных домов<br>
                        Рязанской области
                    </div>
                </a>
            </div>

            <div class="header-top__info">
                <div class="header-top__hotline">
                    Горячая линия:

                    <a href="tel:88003025185" class="header-top__hotline-link">
                        8 (800) 302-51-85
                    </a>
                </div>

                <div class="header-top__search">
                    <input type="text" class="header-top__search-input" placeholder="Поиск...">

                    <span class="header-top__search-button">
                        <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.35713 7.09472C9.51796 5.02393 13.034 5.02393 15.1949 7.09472C17.197 9.01344 17.3285 12.034 15.5892 14.0974L15.1127 14.5947C12.9458 16.588 9.49078 16.5623 7.35713 14.5175C5.21429 12.464 5.21429 9.14827 7.35713 7.09472ZM15.6871 16.0722C12.9319 18.2166 8.88503 18.0594 6.31927 15.6005C3.56024 12.9564 3.56024 8.65581 6.31927 6.01174C9.0603 3.38492 13.4917 3.38492 16.2327 6.01174C18.8007 8.47276 18.9785 12.3689 16.7661 15.0286L19.5189 17.6668L20.0604 18.1857L19.0226 19.2687L18.4811 18.7498L15.6871 16.0722Z"
                                  fill="white"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <nav class="header-bottom__menu">
            <ul class="header-bottom__menu-list">
                @foreach($menu as $menuItems)
                    <li class="header-bottom__menu-item">
                        <a href="{{ $menuItems['link'] }}" class="header-bottom__menu-link">
                            {{ $menuItems['title'] }}
                        </a>

                        @if(isset($menuItems['children']))
                            <ul class="header-bottom__menu-sublist">
                                @foreach($menuItems['children'] as $child)
                                    <li class="header-bottom__menu-subitem">
                                        <a href="{{ $child['link'] }}" class="header-bottom__menu-sublink">
                                            {{ $child['title'] }}
                                        </a>

                                        @if(isset($child['children']))
                                            <ul class="header-bottom__menu-subsublist">
                                                @foreach($child['children'] as $subChild)
                                                    <li class="header-bottom__menu-subsubitem">
                                                        <a href="{{ $subChild['link'] }}"
                                                           class="header-bottom__menu-subsublink">
                                                            {{ $subChild['title'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
