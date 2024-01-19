window['createAss'] = function (ar, ind, isArr, numString) {
    var resAss = {};
    var cont = 0;
    var indexStr = '';

    for (var i = 0; i < ar.length; i++) {
        if (!!numString) {
            indexStr = ar[i][ind].substr(0, numString);
        } else {
            indexStr = ar[i][ind];
        }

        if (isArr) {
            if (!(indexStr in resAss)) {
                resAss[indexStr] = [];
            }

            resAss[indexStr][resAss[indexStr].length] = i;
        } else {
            if (!(indexStr) in resAss) {
                resAss[indexStr] = -1;
            }

            resAss[indexStr] = i;
        }
    }

    return resAss;
}

window['makeAssValue'] = function (ar, ind) {
    var resAss = {};
    for (var r = 0; r < ar.length; r++) {
        resAss[ar[r][0]] = ar[r][1];
    }

    return resAss;
}

window['dateTo'] = function (dateObj, splitStr) {
    var retDateArr = [];
    if (dateObj.length == 3) {
        retDateArr = dateObj.slice();
        retDateArr[1] = addZeroBefore(retDateArr[1] + 1);
        retDateArr[2] = addZeroBefore(retDateArr[2]);
    } else {
        retDateArr[0] = dateObj.getFullYear();
        retDateArr[1] = addZeroBefore(dateObj.getMonth() + 1);
        retDateArr[2] = addZeroBefore(dateObj.getDate());
    }

    if (splitStr == '.') {
        retDateArr.reverse();
    }

    return retDateArr.join(splitStr);
}

window['addZeroBefore'] = function (numLess10) {
    var numCheck = parseInt(numLess10 + '');
    var resultStrLess = '';
    if (numCheck < 10) {
        resultStrLess = '0' + numCheck;
    } else {
        resultStrLess = '' + numCheck;
    }

    return resultStrLess;
}

window['dateDotsToDash'] = function (splitStr) {
    var retDateArr = [];
    var checkStr = splitStr.split('T')[0];
    retDateArr = checkStr.split('.');
    retDateArr.reverse();
    return retDateArr.join('-');
}

window['globalSort'] = function (sortedArr, column, preOrder, ordSubStr) {
    /* ассоциативный массив, где индексом является искомая колонка */
    var sortedAss = {};
    if (!ordSubStr) {
        sortedAss = createAss(sortedArr, column, true);
    } else {
        sortedAss = createAss(sortedArr, column, true, ordSubStr);
    }

    var sortedAssOrder = [];
    var resultArr = [];
    var rowsOfSort = [];
    if (!preOrder) {
        sortedAss.forEach(function (index, value) {
            sortedAssOrder.push(index);
        });
        sortedAssOrder.sort();
    } else {
        sortedAssOrder = preOrder.slice();
    }

    for (var s in sortedAssOrder) {
        if (sortedAssOrder[s] in sortedAss) {
            rowsOfSort = sortedAss[sortedAssOrder[s]];
            for (var r in rowsOfSort) {
                resultArr.push(sortedArr[rowsOfSort[r]].slice());
            }
        }
    }

    return resultArr.slice();
}

function globalSort(sortedArr,column,preOrder,ordSubStr) {
    /* ассоциативный массив, где индексом является искомая колонка */
    var sortedAss = {};
    if (!ordSubStr) {
        sortedAss = createAss(sortedArr,column,true);
    } else {
        sortedAss = createAss(sortedArr,column,true,ordSubStr);
    }

    var sortedAssOrder = [];
    var resultArr = [];
    var rowsOfSort = [];
    if (!preOrder) {
        $.each(sortedAss,function(index,value){
            sortedAssOrder.push(index);
        });
        sortedAssOrder.sort();
    } else {
        sortedAssOrder = preOrder.slice();
    }
    for (var s in sortedAssOrder) {
        if (sortedAssOrder[s] in sortedAss) {
            rowsOfSort = sortedAss[sortedAssOrder[s]];
            for (var r in rowsOfSort) {
                resultArr.push(sortedArr[rowsOfSort[r]].slice());
            }
        }

    }

    return resultArr;
}

function createAss(ar,ind,isArr,numString) {
    var resAss = {};
    var cont = 0;
    var indexStr = '';

    for (var i=0;i<ar.length;i++) {
        if (!!numString) {
            indexStr = ar[i][ind].substr(0,numString);
        } else {
            indexStr = ar[i][ind];
        }
        if (isArr) {
            if (!(indexStr in resAss)) {
                resAss[indexStr] = [];
            }
            resAss[indexStr][resAss[indexStr].length] = i;
        } else {
            if (!(indexStr) in resAss) {
                resAss[indexStr] = -1;
            }
            resAss[indexStr] = i;
        }
    }
    return resAss;
}

var moesOrder = ['г. Рязань', 'г. Сасово', 'г. Скопин', 'г. Касимов', 'Рязанский район', 'Александро-Невский район', 'Ермишинский район', 'Захаровский район', 'Кадомский район', 'Касимовский район', 'Клепиковский район', 'Кораблинский район', 'Милославский район', 'Михайловский район', 'Пителинский район', 'Пронский район', 'Путятинский район', 'Рыбновский район', 'Ряжский район', 'Сапожковский район', 'Сараевский район', 'Сасовский район', 'Скопинский район', 'Спасский район', 'Старожиловский район', 'Ухоловский район', 'Чучковский район', 'Шацкий район', 'Шиловский район'];

// var yearValue = '2017';
var yearAss = {};

var moValue = '';
var moAss = {};

var keValue = '';
var keOidAss = {};
var keAss = {};

var stageValue = '';
var stageAss = {};

var yearArr = [];
var outputArr = [];

var statTotalVal = '';
var statYearVal = '';

var buffArr = [];

function baseData() {
    var currentDate = new Date();
    window['currentDateStr'] = dateTo(currentDate, '-');

    for (var k = 0; k < keArr.length; k++) {
        if (keArr[k][1] == 'КП 2014') {
            keArr[k][2] = '2014';
        }

        buffArr.push([keArr[k][0], keArr[k][2]]);
    }

    keArr = [];
    keArr = buffArr.slice();
    buffArr = [];

    var keOidAss = makeAssValue(keArr, 0);
    var dateStatus = '';

    console.log('baseData:start');
//	console.log(wpBaseArr);
    console.log('baseData:end');


    wpBaseArr = globalSort(wpBaseArr, 2, moesOrder);
    for (var w = 0; w < wpBaseArr.length; w++) {
        wpBaseArr[w][5] = wpBaseArr[w][5].replace('Ремонт', 'Кап. Ремонт');
        wpBaseArr[w][16] = keOidAss[wpBaseArr[w][1]];
        if (wpBaseArr[w][13].replace(/ /g, '') != '') {
            dateStatus = '3';
        } else {
            if (currentDateStr < dateDotsToDash(wpBaseArr[w][11])) {
                dateStatus = '1';
            } else {
                dateStatus = '2';
            }
        }

        wpBaseArr[w][17] = dateStatus;
    }


    window['wpStatTotal'] = document.querySelector('#wp_stat_total')[0];
    window['wpStatTotalLow'] = document.querySelector('#wp_stat_total_low')[0];
    window['wpStatYear'] = document.querySelector('#wp_stat_year')[0];
}

function getStats(workArr, writeStages) {
    var resultStr = '';
    resultStr = workArr.length + ' работ в ' + getNumberOfHouses(workArr) + ' многоквартирных домах на территории Рязанской области, из них:<br />';

    var doneArr = [];
    var processArr = [];
    var hssAss = {};
    var hssCounter = 0;
    console.log(workArr.length + ' ' + doneArr.length);
    var doneCounter = 0;
    var workingCounter = 0;
    var plannedCounter = 0;
    for (var w = 0; w < workArr.length; w++) {
        switch (workArr[w][17]) {
            case '1':
                plannedCounter++;
                break;
            case '2':
                workingCounter++;
                processArr.push(workArr[w].slice());
                break;
            case '3':
                doneCounter++;
                doneArr.push(workArr[w].slice());
                break;
            default:
                console.log('Not filled: ' + w)
                break;
        }
    }


    console.log(workArr.length + ' ' + doneArr.length);
    hssAss = createAss(doneArr, 0, true);
    hssAss.forEach(function (index, value) {
        hssCounter++;
    });
    if (doneCounter == workArr.length) {
        resultStr += 'все представленные работы выполнены';
    } else {
        resultStr += doneCounter + ' работ в ' + getNumberOfHouses(doneArr) + ' домах - выполнено';
    }

    hssAss = createAss(processArr, 0, true);
    hssCounter = 0;
    hssAss.forEach(function (index, value) {
        hssCounter++;
    });

    if (writeStages) {
        if (workingCounter > 0) {
            resultStr += ';<br />' + workingCounter + ' работ - в процессе выполнения/согласования';
        }

        if (plannedCounter > 0) {
            resultStr += ';<br />по ' + plannedCounter + ' - заключены договоры, работы запланированы';
        }
    }

    resultStr += '.';

    return resultStr;
}

function getNumberOfHouses(konstArr) {
    var hsCounter = 0;
    var hsTempAss = createAss(konstArr, 0, true);
    hsTempAss.forEach(function (index, value) {
        hsCounter++;
    });
    return hsCounter;
}

function formateYearTab() {
    yearArr = [];
    console.log(yearValue);
    for (const element of yearAss[yearValue]) {
        yearArr.push(wpBaseArr[element].slice());
    }

    setValues();
    makeTable();
}

var kePreOrder = ['0', 'Крыша', 'Фасады', 'Подвалы', 'Фундаменты', 'Лифты', 'ХВС', 'ГВС', 'Водоотведение', 'Газоснабжение', 'Электроснабжение', 'Отопление', 'Внутридомовые системы при переводе на индивидуальное отопление'];

function simpleToDouble(srcArray) {
    var retArr = [];
    for (var s = 0; s < srcArray.length; s++) {
        retArr.push([srcArray[s]]);
    }

    return retArr;
}

function doubleToSimple(srcArray) {
    var retArr = [];
    for (var s = 0; s < srcArray.length; s++) {
        retArr.push(srcArray[s][0]);
    }

    return retArr;
}

function createSelect(selectObject, valuesAss, assotiativeOfValues, setOrder) {
    var optionObj = {};
    selectObject.innerHTML = '';

    var listOfValues = [];

    for (var key of Object.keys(valuesAss)) {
        listOfValues.push(key);
    }

    if (setOrder) {
        var tempArr = simpleToDouble(listOfValues);
        tempArr = globalSort(tempArr, 0, kePreOrder);
        listOfValues = [];
        listOfValues = doubleToSimple(tempArr);
    }

    for (var l = 0; l < listOfValues.length; l++) {
        optionObj = document.createElement('option');
        optionObj.value = listOfValues[l];
        if (listOfValues[l] in assotiativeOfValues) {
            optionObj.innerHTML = assotiativeOfValues[listOfValues[l]];
        } else {
            optionObj.innerHTML = listOfValues[l];
        }

        if (yearValue == listOfValues[l]) {
            optionObj.setAttribute('selected', 'selected');
        }

        selectObject.appendChild(optionObj);
    }
}

function setValues() {
    var assOfValues = {};

    moAss = createAss(yearArr, 2, true);
    moAss['0'] = [];
    for (var y = 0; y < yearArr.length; y++) {
        moAss['0'].push(y);
    }

    assOfValues['0'] = '-- По всему региону --';
    console.log('wtMoSelect');
    createSelect(wtMoSelect, moAss, assOfValues);

    keAss = createAss(yearArr, 4, true);
    keAss['0'] = [];
    for (var y = 0; y < yearArr.length; y++) {
        keAss['0'].push(y);
    }

    assOfValues['0'] = '-- Все виды работ --';
    assOfValues['Подвалы'] = 'Подвальные помещения, относящиеся к общему имуществу';
    assOfValues['ХВС'] = 'Внутридомовые системы холодного водоснабжения';
    assOfValues['ГВС'] = 'Внутридомовые системы горячего водоснабжения';
    assOfValues['Отопление'] = 'Теплоснабжение (внутридомовые системы)';
    assOfValues['Газоснабжение'] = 'Газоснабжение (внутридомовые системы)';
    assOfValues['Электроснабжение'] = 'Электроснабжение (внутридомовые системы)';
    assOfValues['Водоотведение'] = 'Водоотведение (внутридомовые системы)';
    assOfValues['Лифты'] = 'Лифтовое оборудование';
    assOfValues['Фундаменты'] = 'Фундамент';
    console.log('wtKeSelect');
    createSelect(wtKeSelect, keAss, assOfValues, true);

    stageAss = createAss(yearArr, 17, true);
    stageAss['0'] = [];
    for (var y = 0; y < yearArr.length; y++) {
        stageAss['0'].push(y);
    }

    assOfValues['0'] = ['-- Все --']; //
    assOfValues['1'] = 'Запланировано'; //
    assOfValues['2'] = 'Выполняется/Идет согласование';
    assOfValues['3'] = 'Подписан акт выполненных работ'; // Работы
    console.log('wtStageSelect');
    createSelect(wtStageSelect, stageAss, assOfValues);
}

function makeTable() {
    var keStr = '';
    var auctionHref = '';
    var auctionTitle = '';
    var auctionBlank = '';

    /* Заполнение таблицы по опции */
    outputArr = [];

    var addThisRow = false;

    var fitsByMo = false;
    var fitsByKe = false;
    var fitsByStage = false;

    for (var y = 0; y < yearArr.length; y++) {
        addThisRow = false;
        fitsByMo = false;
        fitsByKe = false;
        fitsByStage = false;

        // проверка на МО
        if (moValue == '0') {
            fitsByMo = true;
        } else {
            if (moValue == yearArr[y][2]) {
                fitsByMo = true;
            }
        }

        // проверка на КЭ
        if (keValue == '0') {
            fitsByKe = true;
        } else {
            if (keValue == yearArr[y][4]) {
                fitsByKe = true;
            }
        }

        // проверка на стадию
        if (stageValue == '0') {
            fitsByStage = true;
        } else {
            if (stageValue == yearArr[y][17]) {
                fitsByStage = true;
            }
        }

        /* Добавить ряд */
        if ((fitsByMo) && (fitsByKe) && (fitsByStage)) {
            outputArr.push(yearArr[y].slice());
        }
    }

    var resultStr = '';
    if (outputArr.length > 0) {
        resultStr = '<table class="report_table">';

        resultStr += '<colgroup><col width="30%" /><col width="12%" /><col width="20%" /><col width="11%" /><col width="14%" /><col width="13%" /></colgroup>';

        resultStr += '<tr><th>Адрес МКД</th><th>Конструктивный элемент</th><th>Подрядная организация</th><th>Начало работ</th><th>Срок исполнения контракта</th><th>Дата подписания <nobr>акта вып. работ</nobr><br>(КС-2)</th></tr>'

        for (var w = 0; w < outputArr.length; w++) {
            resultStr += '<tr>';
            resultStr += '<td><a id="' + outputArr[w][0] + '" href="/base/house/' + outputArr[w][0] + '/">';
            resultStr += outputArr[w][2] + ', ' + outputArr[w][3] + '</a></td>';

            keStr = outputArr[w][4];
            if (outputArr[w][5].replace(/ /g, '') != '') {
                keStr += ' <nobr>(' + outputArr[w][5] + ')</nobr>';
            }

            resultStr += '<td>' + keStr + '</td>';
            if (outputArr[w][9].replace(/ /g, '') != '') {
                auctionHref = 'https://223.rts-tender.ru/supplier/auction/Trade/View.aspx?Id=' + outputArr[w][9] + '#BaseMainContent_MainContent_documentPanel';
                auctionTitle = 'По итогам аукциона № ' + outputArr[w][10];
                auctionBlank = 'target="_blank"';
            } else {
                auctionHref = '/team/selection/' + outputArr[w][7] + '/#lot' + outputArr[w][8];
                auctionTitle = 'По итогам отбора № ' + outputArr[w][7] + ' (Лот № ' + outputArr[w][8] + ')';
                auctionBlank = '';
            }

            resultStr += '<td><a ' + auctionBlank + ' title="' + auctionTitle + '" href="' + auctionHref + '">' + outputArr[w][6] + '</a></td>';
            resultStr += '<td>' + outputArr[w][11] + '</td>';
            resultStr += '<td>' + outputArr[w][12] + '</td>';
            resultStr += '<td>' + outputArr[w][13] + '</td>';
            resultStr += '</tr>';
        }

        resultStr += '</table>';
    } else {
        resultStr = '<div class="wpWarning">Отсутствуют работы, соответствующие заданным условиям. Попробуйте выбрать другие параметры.</div>';
    }

    if (yearValue == '0') {
        document.querySelector(wpStatYear).style.display = 'none';
        document.querySelector(wpStatTotal).innerHTML = 'Всего в данном разделе представлено ' + getStats(wpBaseArr, true);
        document.querySelector(wpStatTotalLow).innerHTML = 'Всего в данном разделе представлено ' + getStats(wpBaseArr, true);
    } else {
        document.querySelector(wpStatTotal).innerHTML = 'Всего в данном разделе представлено ' + getStats(wpBaseArr, false);
        document.querySelector(wpStatTotalLow).innerHTML = 'Всего в данном разделе представлено ' + getStats(wpBaseArr, false);
        document.querySelector(wpStatYear).innerHTML = 'По <a href="/programs/urgent/" target="_blank">краткосрочному плану</a> на ' + yearValue + ' год приведено ' + getStats(yearArr, true);
        document.querySelector(wpStatYear).style.display = 'block';
    }

    document.querySelector('#wp_result').innerHTML = resultStr;
    document.querySelector('#preloader_bar').style.display = 'none';
}

/* главенствующая роль */
function setValues_year() {
    // годы
    console.log(wpBaseArr);
    yearAss = createAss(wpBaseArr, 16, true);
    yearAss['0'] = [];
    for (var w = 0; w < wpBaseArr.length; w++) {
        yearAss['0'].push(w);
    }

    if ((yearValue == '') || (yearValue == 0)) {
        yearValue = '0';
    }

    var selectObj = document.getElementById('wt_year');
    var assotiativeYear = {};
    assotiativeYear['0'] = '-- Весь период --';
    console.log('selectObj');
    createSelect(selectObj, yearAss, assotiativeYear);
    selectObj.addEventListener('change', function () {
        document.querySelector('#preloader_bar').style.display = 'block';
        yearValue = document.querySelector(this).value;
        keValue = '0';
        moValue = '0';
        stageValue = '0';
        formateYearTab();
    });

    keValue = '0';
    moValue = '0';
    stageValue = '0';

    window['wtMoSelect'] = document.querySelector('#wt_mo');
    window['wtKeSelect'] = document.querySelector('#wt_ke');
    window['wtStageSelect'] = document.querySelector('#wt_stage');

    wtMoSelect.addEventListener('change', function () {
        document.querySelector('#preloader_bar').style.display = 'block';
        moValue = document.querySelector(this).value;
        makeTable();
    });
    wtKeSelect.addEventListener('change', function () {
        document.querySelector('#preloader_bar').style.display = 'block';
        keValue = document.querySelector(this).value;
        makeTable();
    });
    wtStageSelect.addEventListener('change', function () {
        document.querySelector('#preloader_bar').style.display = 'block';
        stageValue = document.querySelector(this).value;
        makeTable();
    });
    console.log(yearAss);
    formateYearTab();
    document.querySelector('#wp_top_wrap').style.visibility = 'visible';
    document.querySelector('#wp_top_preloader').style.display = 'none';
}


function initWpOutput() {
    fillWpBaseAddress();
    baseData();
    setValues_year();
}


function fillWpBaseAddress() {
    var wpMo = '';
    for (var w = 0; w < wpBaseArr.length; w++) {
        if (wpBaseArr[w][0] in hssAssociative) {
            wpMo = wpBaseArr[w][0].substr(0, 7);
            wpBaseArr[w][3] = hssAssociative[wpBaseArr[w][0]];

            if (wpBaseArr[w][0] in hssExceptions) {
                wpBaseArr[w][2] = hssExceptions[wpBaseArr[w][0]];
            } else {
                wpBaseArr[w][2] = moAssociative[wpMo];
            }
        } else {
            console.log('НЕ НАЙДЕН: ' + wpBaseArr[w][0]);
        }
    }
}

initWpOutput();
