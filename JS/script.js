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

const inputFile = document.querySelector("#picture-input");
const pictureImage = document.querySelector(".picture-image");
const pictureImageTxt = "Choose an image";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture-img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});
