const choose_mo = document.querySelector('#choose_mo');
const dda_shown = document.querySelectorAll('.dda_shown');

choose_mo.addEventListener('focus', function () {
    document.querySelector('.kv_dd').style.display = "block";
});

// document.querySelector('body').addEventListener('click', '#content', function(){
//     if (!document.querySelector('#choose_mo').is(":focus"))
//         document.querySelector('.kv_dd').style.display = "none";
// });

choose_mo.addEventListener('keyup', function () {
    document.querySelector('.kv_dd div').forEach(function () {
        if (document.querySelector(this).innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo').value.toLowerCase()) !== -1) {
            document.querySelector(this).classList.add('dda_shown');
            document.querySelector(this).style.display = "block";
        } else {
            document.querySelector(this).classList.remove('dda_shown');
            document.querySelector(this).style.display = "none";
        }
    });
});

dda_shown.forEach((element) => {
    element.addEventListener('click', function () {
        document.querySelector('#choose_mo').value = element.innerHTML;
        document.querySelector('.for_class div').classList.remove();
        document.querySelector('.for_class div').classList.add(element.getAttribute('href').replace('#', ''));
        document.querySelector('.kv_dd').style.display = "none";
        document.querySelector('.form_mo')?.remove();
        document.querySelector('.form_mo_0')?.remove();
        document.querySelector('.form_mo_2')?.remove();
        document.querySelector('.form_mo_3')?.remove();

        const request = new XMLHttpRequest();
        const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
        request.responseType = "json";
        request.open("POST", "/user/user_mo", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                document.querySelector('.find_ls').insertAdjacentHTML("beforeend", request.response);

                const id = element.getAttribute('href').replace('#', '');

                if (id == 28 || id == 36 || id == 37 || id == 38) {
                    init_choose_mo_1();
                } else {
                    init_choose_mo_0();
                }
            }
        });
        request.send(params);
    });
});

function init_choose_mo_0()
{
    const choose_mo_0 = document.querySelector('#choose_mo_0');
    const dda_shown_np = document.querySelectorAll('.dda_shown_np');

    /*Первый уровень*/
    choose_mo_0.addEventListener('focus', function () {
        document.querySelector('.kv_dd_np').style.display = "block";
    });

// document.querySelector('body').addEventListener('click', '#content', function () {
//     if (!document.querySelector('#choose_mo_0').is(":focus"))
//         document.querySelector('.kv_dd_np').style.display = "none";
// });

    choose_mo_0.addEventListener('keyup', function () {
        document.querySelector('.kv_dd_np div').forEach(function () {
            if (document.querySelector(this).innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_0').value.toLowerCase()) !== -1) {
                document.querySelector(this).classList.add('dda_shown_np');
                document.querySelector(this).style.display = "block";
            } else {
                document.querySelector(this).classList.remove('dda_shown_np');
                document.querySelector(this).style.display = "none";
            }
        });
    });

    dda_shown_np.forEach((element) => {
        element.addEventListener('click', function () {
            document.querySelector('#choose_mo_0').value = element.innerHTML;
            document.querySelector('.for_class_mo_0 div').classList.remove();
            document.querySelector('.for_class_mo_0 div').classList.add(element.getAttribute('href').replace('#', ''));
            document.querySelector('.kv_dd_np').style.display = "none";
            document.querySelector('.form_mo')?.remove();
            document.querySelector('.form_mo_2')?.remove();
            document.querySelector('.form_mo_3')?.remove();

            const request = new XMLHttpRequest();
            const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
            request.responseType = "json";
            request.open("POST", "/user/user_np", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.addEventListener("readystatechange", () => {
                if (request.readyState === 4 && request.status === 200) {
                    document.querySelector('.find_ls').insertAdjacentHTML("beforeend", request.response);

                    init_choose_mo_1();
                }
            });
            request.send(params);
        });
    });
}

function init_choose_mo_1() {
    const choose_mo_2 = document.querySelector('#choose_mo_2');
    const dda_shown_mo = document.querySelectorAll('.dda_shown_mo');

    if (choose_mo_2 && dda_shown_mo) {
        /*Второй уровень*/
        choose_mo_2.addEventListener('focus', function () {
            document.querySelector('.kv_dd_mo').style.display = "block";
        });

// document.querySelector('body').addEventListener('click', '#content', function () {
//     if (!document.querySelector('#choose_mo_2').is(":focus"))
//         document.querySelector('.kv_dd_mo').style.display = "none";
// });

        choose_mo_2.addEventListener('keyup', function () {
            document.querySelector('.kv_dd_mo div').forEach(function () {
                if (document.querySelector(this).innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_2').value.toLowerCase()) !== -1) {
                    document.querySelector(this).classList.add('dda_shown_mo');
                    document.querySelector(this).style.display = "block";
                } else {
                    document.querySelector(this).classList.remove('dda_shown_mo');
                    document.querySelector(this).style.display = "none";
                }
            });
        });

        dda_shown_mo.forEach((element) => {
            element.addEventListener('click', function () {
                document.querySelector('#choose_mo_2').value = element.innerHTML;
                document.querySelector('.for_class_mo div').classList.remove();
                document.querySelector('.for_class_mo div').classList.add(element.getAttribute('href').replace('#', ''));
                document.querySelector('.kv_dd_mo').style.display = "none";
                document.querySelector('.form_mo_2')?.remove();
                document.querySelector('.form_mo_3')?.remove();

                const request = new XMLHttpRequest();
                const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
                request.responseType = "json";
                request.open("POST", "/user/user_hs", true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                request.addEventListener("readystatechange", () => {
                    if (request.readyState === 4 && request.status === 200) {
                        document.querySelector('.find_ls').insertAdjacentHTML("beforeend", request.response);

                        init_choose_mo_2();
                    }
                });
                request.send(params);
            });
        })
    } else {
        init_choose_mo_2();
    }
}

function init_choose_mo_2() {
    const choose_mo_3 = document.querySelector('#choose_mo_3');
    const dda_shown_hs = document.querySelectorAll('.dda_shown_hs');

    /*Третий уровень*/
    choose_mo_3.addEventListener('focus', function () {
        document.querySelector('.kv_dd_hs').style.display = "block";
    });

// document.querySelector('body').addEventListener('click', '#content', function () {
//     if (!document.querySelector('#choose_mo_3').is(":focus"))
//         document.querySelector('.kv_dd_hs').style.display = "none";
// });

    choose_mo_3.addEventListener('keyup', function () {
        document.querySelector('.kv_dd_hs div').forEach(function () {
            if (document.querySelector(this).innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_3').value.toLowerCase()) !== -1) {
                document.querySelector(this).classList.add('dda_shown_hs');
                document.querySelector(this).style.display = "block";
            } else {
                document.querySelector(this).classList.remove('dda_shown_hs');
                document.querySelector(this).style.display = "none";
            }
        });
    });

    dda_shown_hs.forEach((element) => {
        element.addEventListener('click', function () {
            document.querySelector('#choose_mo_3').value = element.innerHTML;
            document.querySelector('.for_class_hs div').classList.remove();
            document.querySelector('.for_class_hs div').classList.add(element.getAttribute('href').replace('#', ''));
            document.querySelector('.kv_dd_hs').style.display = "none";
            document.querySelector('.form_mo_3')?.remove();
            document.querySelector('.find_ls').insertAdjacentHTML("beforeend", '<div style="position: relative; margin-top: .5vw;" class="form_mo_3">' +
                '<input class="kv_input_kv" style="font-size: 1.2em; padding: .3vw .5vw; width: 150px; margin-right: 10px;" type="text" rel="0" id="choose_mo_4" autocomplete="off" value="" alt="" placeholder="Квартира">' +
                '<input class="kv_input_km" style="font-size: 1.2em; padding: .3vw .5vw; width: 150px;" type="text" rel="0" id="choose_mo_5" autocomplete="off" value="" alt="" placeholder="Комната">' +
                '<div id="find_ls" style="background: red; color: white; font-size: 1.2em; width: 350px; text-align: center; cursor: pointer; padding: .3vw 0; margin-top: 10px;">Узнать</div>' +
                '</div>');
        });
    });
}

function init_find_ls() {
    const find_ls = document.querySelector('#find_ls');

    find_ls.addEventListener('click', function () {
        document.querySelector('.result')?.remove();

        const request = new XMLHttpRequest();
        const params = 'ch=' + document.querySelector('.for_class_hs div').getAttribute('class') + '&kv=' + document.querySelector('#choose_mo_4').value + '&kom=' + document.querySelector('#choose_mo_5').value + "&_token=" + document.querySelector('input[name=_token]').value;
        request.responseType = "json";
        request.open("POST", "/user/user_ls", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                document.querySelector('.form_mo_3').insertAdjacentHTML("beforeend", request.response);
            }
        });
        request.send(params);
    });
}
