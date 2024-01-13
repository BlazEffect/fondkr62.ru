const numsOnly = /^\d+$/;
const errorBlock = document.querySelector('.main-personal-account-status__error');

const personalAccountStatusButton = document.querySelector('.main-personal-account-status__button');

personalAccountStatusButton.addEventListener('click', function () {
    let personalAccountCode = document.querySelector('.main-personal-account-status__input');
    let personalAccountCodeValue = personalAccountCode.value;

    let errorMessage = '';

    personalAccountCodeValue = personalAccountCodeValue.replace(/ /g, '').replace('/r/n', '').replace('/n', '');
    if (personalAccountCodeValue.length !== 16) {
        errorMessage += '<li>Указано символов: ' + personalAccountCodeValue.length + ' вместо 16</li>';
    }
    if (!numsOnly.test(personalAccountCodeValue)) {
        errorMessage += '<li>Лицевой счет должен состоять <b>только</b> из цифр</li>';
    }
    if (personalAccountCodeValue.indexOf('62') !== 0) {
        errorMessage += '<li>Лицевой счет должен начинаться с цифр <b>62</b></li>';
    }

    if (errorMessage !== '') {
        errorBlock.innerHTML = 'Лицевой счет введен некорректно:<ul>' + errorMessage + '</ul>';
    } else {
        errorBlock.innerHTML = '';

        const request = new XMLHttpRequest();
        const params = "personal-account-code=" + personalAccountCodeValue + "&_token=" + document.querySelector('input[name=_token]').value;
        request.responseType = "json";
        request.open("POST", "/account/getStatus", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                if (request.response.status === 'error') {
                    errorBlock.innerHTML = request.response.message;
                } else {
                    document.querySelector('.main-personal-account-status__data').innerHTML = request.response.html;

                    var script1 = document.createElement('script');
                    script1.type = 'text/javascript';
                    script1.src = '/assets/js/personal-account-status-data.js';

                    document.body.appendChild(script1);
                }
            }
        });
        request.send(params);
    }
});
