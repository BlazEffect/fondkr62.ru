import SlimSelect from 'slim-select'
import addDropDowns from "../app.js";

const streetSelectorBlock = document.querySelector('.main-selectors__streets-selector');
const houseInfo = document.querySelector('.main__house-info');

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

            const request = new XMLHttpRequest();
            const params = "&_token=" + document.querySelector('input[name=_token]').value;
            request.responseType = "json";
            request.open("POST", "/base/house/getStreets/" + newMunicipalFormation[0].value, true);
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
                        ]);

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
                                        const request = new XMLHttpRequest();
                                        const params = "&_token=" + document.querySelector('input[name=_token]').value;
                                        request.responseType = "json";
                                        request.open("POST", "/base/house/getHouse/" + newStreet[0].value, true);
                                        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                                        request.addEventListener("readystatechange", () => {
                                            if (request.readyState === 4 && request.status === 200) {
                                                houseInfo.innerHTML = '';

                                                houseInfo.innerHTML = request.response.html;
                                                houseInfo.style.display = 'block';
                                                addDropDowns();
                                            }
                                        });

                                        request.send(params);
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
    }
})

function formingOptions(id, streets, arrOptions = []) {
    if (id in streets) {
        for (const key in streets[id]) {
            const item = streets[id][key];

            if (item.CodeHouse === undefined) {
                arrOptions.push({
                    label: item.DopNumber + ' ' + item.Name + ' ' + item.Type,
                    closable: 'close',
                    options: formingOptions(item.Id, streets, [])
                });
            } else {
                const korp = ["Корпус", "Строение", "Секция"].includes(item.KorpType) ? " " + item.KorpType + " " : item.KorpType;

                arrOptions.push({
                    text: 'д. ' + item.NumberHouse + item.Litera + korp + item.NumKorp,
                    value: parseInt(item.CodeHouse) + 909132453675,
                });
            }
        }
    }

    return arrOptions;
}
