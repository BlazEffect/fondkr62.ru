
let get_kvit = document.querySelector('.get_kvit');
let load_kvit = document.querySelector('.load_kvit');

get_kvit.addEventListener('click', function () {
    let cl = get_kvit.getAttribute('class').split(' ');

    const request = new XMLHttpRequest();
    const params = 'ls=' + cl[1] + "&_token=" + document.querySelector('input[name=_token]').value;
    request.responseType = "json";
    request.open("POST", "/account/getReceipt", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            let p = request.response.split('||');
            let month = document.querySelectorAll('.month');
            let square = document.querySelectorAll('.square');
            let ls_itself = document.querySelectorAll('.ls_itself');
            let address_sign = document.querySelectorAll('.address_sign');
            let fio = document.querySelectorAll('.fio');
            let dolg = document.querySelectorAll('.dolg');
            let nachisleno = document.querySelectorAll('.nachisleno');
            let peni = document.querySelectorAll('.peni');
            let total = document.querySelectorAll('.total');

            month[0].value = p[0];
            month[1].value = p[0];
            square[0].value = p[1];
            square[1].value = p[1];
            ls_itself[0].innerHTML = p[2];
            ls_itself[1].innerHTML = p[2];
            address_sign[0].innerHTML = p[3];
            address_sign[1].innerHTML = p[3];
            fio[0].innerHTML = 'Собственник помещения';
            fio[1].innerHTML = 'Собственник помещения';
            dolg[0].innerHTML = p[4];
            dolg[1].innerHTML = p[4];
            nachisleno[0].innerHTML = p[5];
            nachisleno[1].innerHTML = p[5];
            peni[0].innerHTML = p[6];
            peni[1].innerHTML = p[6];
            total[0].innerHTML = p[7];
            total[1].innerHTML = p[7];

            const el = (selector) => document.querySelector(selector);
            // получаем блок куда будет выводиться QR-код
            let qrCodeOutput = el('#qrcode');
            // очищаем блок с QR-кодом
            qrCodeOutput.innerHTML = "";
            // и помещаем в него сгенерированный библиотекой QR-код
            qrCodeOutput.append(QRCode.generateHTML(p[8], {}))

            let ls_barcode_inner = document.querySelectorAll('.ls_barcode_inner');

            JsBarcode(ls_barcode_inner[0], p[2], {
                format: 'code128',
                width: 2,
                height: 50,
                background: 'transparent',
            });
            JsBarcode(ls_barcode_inner[1], p[2], {
                format: 'code128',
                width: 2,
                height: 50,
                background: 'transparent',
            });

            let inner_izv_block = document.querySelector('#inner_izv_block');
            inner_izv_block.style.display = 'block';
        }
    });
    request.send(params);
});

load_kvit.addEventListener('click', function () {
    let inner_izv_block = document.querySelectorAll('#inner_izv_block');

    html2canvas(inner_izv_block[0], {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 670
                }]
            };
            pdfMake.createPdf(docDefinition).download("cutomer-details.pdf");
        }
    });
});
