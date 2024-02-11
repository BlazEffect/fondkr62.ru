const choose_mo_act = document.querySelector('#choose_mo_act');
const dda_shown_act = document.querySelectorAll('.dda_shown_act');

/* Акты поиск */
choose_mo_act.addEventListener('focus',function(){
    document.querySelector('.kv_dd_act').style.display = "block";
});

choose_mo_act.addEventListener('keyup',function(){
    document.querySelector('.kv_dd_act div').forEach(function(){
        const element = document.querySelector(this);

        if (element.innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_act').value.toLowerCase()) !== -1) {
            element.classList.add('dda_shown_act');
            element.style.display = "block";
        } else {
            element.classList.remove('dda_shown_act');
            element.style.display = "none";
        }
    });
});

dda_shown_act.forEach((element) => {
    element.addEventListener('click', function(){
        document.querySelector('#choose_mo_act').value = element.innerHTML;
        // document.querySelector('.for_class div').classList.remove();
        // document.querySelector('.for_class div').classList.add(element.getAttribute('href').replace('#', ''));
        document.querySelector('.kv_dd_act').style.display = "none";
        document.querySelector('.form_mo_act')?.remove();
        document.querySelector('.form_mo_act_hs')?.remove();
        document.querySelector('.form_mo_act_result')?.remove();

        const request = new XMLHttpRequest();
        const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
        request.responseType = "json";
        request.open("POST", "/reports/operator/search_act_mo", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                document.querySelector('.find_act').insertAdjacentHTML("beforeend", request.response);

                init_choose_mo_act_0();
            }
        });
        request.send(params);
    });
});

function init_choose_mo_act_0() {
    const choose_mo_act_0 = document.querySelector('#choose_mo_act_0');
    const dda_shown_act_np = document.querySelectorAll('.dda_shown_act_np');

    /* Акты поиск первый уровень */
    choose_mo_act_0.addEventListener('focus', function(){
        document.querySelector('.kv_dd_act_np').style.display = "block";
    });

// body.addEventListener('click', '.main', function(){
//     if (!document.querySelector('#choose_mo_act_0').is(":focus"))
//         document.querySelector('.kv_dd_act_np').style.display = "none";
// });

    choose_mo_act_0.addEventListener('keyup', function(){
        document.querySelector('.kv_dd_act_np div').forEach(function(){
            const element = document.querySelector(this);

            if (element.innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_act_0').value.toLowerCase()) !== -1) {
                element.classList.add('dda_shown_act_np');
                element.style.display = "block";
            } else {
                element.classList.remove('dda_shown_act_np');
                element.style.display = "none";
            }
        });
    });

    dda_shown_act_np.forEach((element) => {
        element.addEventListener('click', function(){
            document.querySelector('#choose_mo_act_0').value = element.innerHTML;
            //document.querySelector('.for_class_mo_act_0 div').classList.remove();
            //document.querySelector('.for_class_mo_act_0 div').classList.add(document.querySelector('.dda_shown_act_np').getAttribute('href').replace('#', ''));
            document.querySelector('.kv_dd_act_np').style.display = "none";
            document.querySelector('.form_mo_act_hs')?.remove();
            document.querySelector('.form_mo_act_result')?.remove();

            const request = new XMLHttpRequest();
            const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
            request.responseType = "json";
            request.open("POST", "/reports/operator/search_act_np", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.addEventListener("readystatechange", () => {
                if (request.readyState === 4 && request.status === 200) {
                    document.querySelector('.find_act').insertAdjacentHTML("beforeend", request.response);

                    init_choose_mo_act_1();
                }
            });
            request.send(params);
        });
    });
}

function init_choose_mo_act_1() {
    const choose_mo_act_1 = document.querySelector('#choose_mo_act_1');
    const dda_shown_act_hs = document.querySelectorAll('.dda_shown_act_hs');

    /* Акты поиск второй уровень */
    choose_mo_act_1.addEventListener('focus',function(){
        document.querySelector('.kv_dd_act_hs').style.display = "block";
    });

// body.addEventListener('click', '.main', function(){
//     if (!document.querySelector('#choose_mo_act_1').is(":focus"))
//         document.querySelector('.kv_dd_act_hs').style.display = "none";
// });

    choose_mo_act_1.addEventListener('keyup', function(){
        document.querySelector('.kv_dd_act_hs div').forEach(function(){
            const element = document.querySelector(this);

            if (element.innerHTML.toLowerCase().indexOf(document.querySelector('#choose_mo_act_1').value.toLowerCase()) !== -1) {
                element.classList.add('dda_shown_act_hs');
                element.style.display = "block";
            } else {
                element.classList.remove('dda_shown_act_hs');
                element.style.display = "none";
            }
        });
    });

    dda_shown_act_hs.forEach((element) => {
        element.addEventListener('click', function(){
            document.querySelector('#choose_mo_act_1').value = element.innerHTML;
            //document.querySelector('.for_class_mo_act_1 div').classList.remove();
            //document.querySelector('.for_class_mo_act_1 div').classList.add(document.querySelector('.dda_shown_act_hs').getAttribute('href').replace('#', ''));
            document.querySelector('.kv_dd_act_hs').style.display = "none";
            document.querySelector('.form_mo_act_result')?.remove();
            document.querySelector('.kv_dd_act_hs').remove();

            const request = new XMLHttpRequest();
            const params = "id=" + element.getAttribute('href').replace('#', '') + "&_token=" + document.querySelector('input[name=_token]').value;
            request.responseType = "json";
            request.open("POST", "/reports/operator/search_act_hs", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.addEventListener("readystatechange", () => {
                if (request.readyState === 4 && request.status === 200) {
                    document.querySelector('.find_act').insertAdjacentHTML("beforeend", request.response);
                }
            });
            request.send(params);
        });
    });
}
