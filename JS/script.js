function executar(){
    var texto = document.getElementById('texto').value;
    var lista = document.getElementById('historico');
    var adicionar = true;

    var opt = document.createElement('option');

    for(i=0; i<lista.options.length; i++){
        if(texto==lista.options[i].value){
            adicionar=false;
        }
    }

    if(adicionar==true){
        opt.value=texto;
        lista.appendChild(opt);
    }
}

const form = document.querySelector('.add');
const formInitialHeight = form.clientHeight;
const overflow = document.querySelector ('.overflow');
const btn = document.querySelector('.toggle');

btn.addEventListener('click', initToggle);

function initToggle(e){
    form.style.maxHeight = 
    e.target.dataset.state === 'more'
    ? '${form.scrollHeight}px'
    : '${formInitialHeight}px' ;

    overflow.setAttribute(
        'data-state',
        e.target.dataset.state === 'more' ? 'visible' :'hidden'
    )
    
}

const inputFile = 
document.querySelector('#picture-input');
const pictureImage =
document.querySelector('.picture-img');
const pictureImageTxt = 'Escolha uma foto';
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener('change', function(e){
    const inputTarget = e.target;
    const file = inputTarget.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function(e){
            const readerTarget = e.target;

            const img = document.createElement('img');
            img.src = readerTarget.result;
            img.classList.add('picture-img');

            pictureImage.appendChild(img);
        });

        reader.readAsDataURL(file);
    } else {
        pictureImage.innerHTML = pictureImageTxt;
    }
});