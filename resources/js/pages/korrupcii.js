const agreementCheckBox = document.querySelector('#checkPersonal');
const submitButton = document.querySelector('.main-korrupcii-form__button');

agreementCheckBox.addEventListener('click', () => {
    submitButton.disabled = !agreementCheckBox.checked;
});
