import SlimSelect from 'slim-select'
import addDropDowns from "../app.js";

const streetSelectorBlock = document.querySelector('.main-selectors__streets-selector');
const houseInfo = document.querySelector('.main__house-info');

const queryString = window.location.search;
let url = new URLSearchParams(queryString);
let house = url.get('house');

new SlimSelect({
    select: '.main-selectors__municipalities-selector > select',
    settings: {
        placeholderText: 'Выберите Муниципальное образование',
        searchPlaceholder: 'Поиск',
        searchText: 'Извините. По Вашему запросу ничего не найдено.'
    },
    events: {
        afterChange: (newMunicipalFormation) => {
            streetSelectorBlock.style.display = 'none';

            addStreetSelector(newMunicipalFormation[0].value);
        }
    }
});

if (house !== null) {
    document.querySelector('#wp_top_preloader').style.display = 'block';
    document.querySelector('.overlay').style.display = 'block';
    document.querySelector('body').style.overflowY = 'hidden';

    let selectedRegion = document.querySelector('.main-selectors__municipalities-selector > select option[selected]').value;

    getHouseInfo(house);

    addStreetSelector(selectedRegion, house);
}

function addStreetSelector(regionId, selectedHouse = null) {
    const request = new XMLHttpRequest();
    const params = "&_token=" + document.querySelector('input[name=_token]').value;
    request.responseType = "json";
    request.open("POST", "/base/house/getStreets/" + regionId, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            const id = request.response.id;
            const streets = request.response.streets_and_houses;

            if (id in streets) {
                const data = formingOptions(id, streets, [
                    {
                        text: '',
                        placeholder: true
                    }
                ], selectedHouse);

                let streetSelect = document.querySelector('.main-selectors__streets-selector > select');

                let slimSelect = streetSelect.slim;

                if (slimSelect) {
                    slimSelect.setData(data);
                } else {
                    new SlimSelect({
                        select: '.main-selectors__streets-selector > select',
                        data: data,
                        settings: {
                            placeholderText: 'Выберите улицу',
                            searchPlaceholder: 'Поиск',
                            searchText: 'Извините. По Вашему запросу ничего не найдено.'
                        },
                        events: {
                            afterChange: (newStreet) => {
                                getHouseInfo(newStreet[0].value);
                            }
                        }
                    });
                }

                streetSelectorBlock.style.display = 'block';
            } else {
                //streetSelectorBlock.innerHTML = 'Ничего не найдено';
                streetSelectorBlock.style.display = 'none';
            }
        }
    });

    request.send(params);
}

function getHouseInfo(codeHouse) {
    const request = new XMLHttpRequest();
    const params = "&_token=" + document.querySelector('input[name=_token]').value;
    request.responseType = "json";
    request.open("POST", "/base/house/getHouse/" + codeHouse, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            houseInfo.innerHTML = '';

            houseInfo.innerHTML = request.response.html;
            houseInfo.style.display = 'block';
            addDropDowns();

            document.querySelector('#wp_top_preloader').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('body').style.overflowY = 'scroll';
        }
    });

    request.send(params);
}

function formingOptions(id, streets, arrOptions = [], selectedHouse = null) {
    if (id in streets) {
        for (const key in streets[id]) {
            const item = streets[id][key];

            if (item.Type !== undefined && (item.Type.toLowerCase() === 'село' || item.Type.toLowerCase() === 'деревня' || item.Type.toLowerCase() === 'городок' || item.Type.toLowerCase() === 'город' || item.Type.toLowerCase().indexOf('поселок') !== -1)) {
                if (streets[item.Id][0].CodeHouse === undefined) {
                    arrOptions.push({
                        text: item.DopNumber + ' ' + item.Name + ' ' + item.Type,
                        disabled: true
                    });

                    formingOptions(item.Id, streets, [], selectedHouse).forEach(item => arrOptions.push(item));
                } else {
                    arrOptions.push({
                        label: item.DopNumber + ' ' + item.Name + ' ' + item.Type,
                        closable: 'close',
                        options: formingOptions(item.Id, streets, [], selectedHouse)
                    });
                }
            } else if (item.CodeHouse === undefined) {
                arrOptions.push({
                    label: item.DopNumber + ' ' + item.Name + ' ' + item.Type,
                    closable: 'close',
                    options: formingOptions(item.Id, streets, [], selectedHouse)
                });
            } else {
                const korp = ["Корпус", "Строение", "Секция"].includes(item.KorpType) ? " " + item.KorpType + " " : ' ';

                let litera = item.Litera ?? ' ';
                let numKorp = item.NumKorp ?? ' ';

                arrOptions.push({
                    text: 'д. ' + item.NumberHouse + litera + korp + numKorp,
                    value: parseInt(item.CodeHouse) + 909132453675,
                    selected: parseInt(selectedHouse) === parseInt(item.CodeHouse) + 909132453675
                });
            }
        }
    }

    return arrOptions;
}
