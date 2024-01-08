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
}

document.addEventListener("DOMContentLoaded", DOMLoaded);
