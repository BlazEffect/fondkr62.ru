function DOMLoaded() {
    const searchButton = document.querySelector('.header-top__search-button');
    const searchInput = document.querySelector('.header-top__search-input');

    searchButton.addEventListener('click', function () {
        let searchBlock = document.querySelector('.header-top__search');

        if (searchBlock.classList.contains('header-top__search--open')) {
            searchBlock.classList.remove('header-top__search--open');
            searchInput.style.display = 'none';
        } else {
            searchBlock.classList.add('header-top__search--open');
            searchInput.style.display = 'block';
        }
    });

    if (document.documentElement.clientWidth < 991) {
        const overlay = document.querySelector('.overlay');
        const menu = document.querySelector(".header-bottom__menu");

        document.addEventListener('click', function (event) {
            const target = event.target;
            const its_menu = target === menu || menu.contains(target);
            const menu_is_active =  menu.classList.contains('header-bottom__menu--open');

            if (!its_menu && menu_is_active) {
                menu.classList.remove('header-bottom__menu--open');
                overlay.style.display = 'none';
            }
        });

        let hamburger = document.querySelector('.header-bottom__hamburger');
        hamburger.addEventListener('click', function (event) {
            event.stopPropagation();
            menu.classList.add('header-bottom__menu--open');
            overlay.style.display = 'block';
        })

        const headerBottomMenuItem = [].slice.call(document.querySelectorAll('.header-bottom__menu-item'))
        const backLinkItem = `<li class="header-bottom__menu-subitem">
            <a class="header-bottom__menu-sublink nav-back-link" href="javascript:;">
                Назад
            </a>
        </li>`

        headerBottomMenuItem.forEach(item => {
            item.querySelector('.header-bottom__menu-sublist')?.insertAdjacentHTML('afterbegin', backLinkItem)
            item.querySelector('.header-bottom__menu-link:not(:only-child)')?.addEventListener('click', (event) => {
                event.preventDefault();
                item.classList.add('header-bottom__menu-item--active');
            })
            item.querySelector('.nav-back-link')?.addEventListener('click', (event) => {
                event.preventDefault();
                item.classList.remove('header-bottom__menu-item--active');
            })
        })

        const headerBottomMenuSubItem = [].slice.call(document.querySelectorAll('.header-bottom__menu-subitem'))
        const backLinkSubItem = `<li class="header-bottom__menu-subsubitem">
            <a class="header-bottom__menu-subsublink nav-back-link" href="javascript:;">
                Назад
            </a>
        </li>`

        headerBottomMenuSubItem.forEach(item => {
            item.querySelector('.header-bottom__menu-subsublist')?.insertAdjacentHTML('afterbegin', backLinkSubItem)
            item.querySelector('.header-bottom__menu-sublink:not(:only-child)')?.addEventListener('click', (event) => {
                event.preventDefault();
                item.classList.add('header-bottom__menu-subitem--active');
            })
            item.querySelector('.nav-back-link')?.addEventListener('click', (event) => {
                event.preventDefault();
                item.classList.remove('header-bottom__menu-subitem--active');
            })
        })
    }

    addDropDowns();
}

document.addEventListener("DOMContentLoaded", DOMLoaded);

export default function addDropDowns() {
    const dropdownToggle = document.querySelector('#dropdown-toggle');
    const dropdownContent = document.querySelector('.main__dropdown-content');
    const dropdownItems = document.querySelector('.main__dropdown-content > *');

    if (dropdownToggle && dropdownContent && dropdownItems) {
        dropdownToggle.addEventListener('change', function () {
            if (dropdownToggle.checked) {
                dropdownContent.style.height = dropdownItems.offsetHeight + 'px';
            } else {
                dropdownContent.style.height = '0';
            }
        });
    }
}
