let inputFile = document.querySelector('.input-file input[type=file]');

inputFile.addEventListener('change', function(){
    let file = inputFile.files[0];
    let parentElement = inputFile.closest('.input-file');

    parentElement.querySelector('.input-file-text').innerHTML = file.name;
});
