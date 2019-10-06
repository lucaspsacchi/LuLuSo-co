var alternativa = 0;

function main(alt) {
    if(alternativa != 0) {
        var div = document.getElementById(alternativa);
        div.className = "button btn btn-outline-secondary btn-custom-alternativa";
    }

    alternativa = alt;
    var div = document.getElementById(alternativa);
    div.className = "button btn btn-outline-primary btn-custom-alternativa btn-custom-selecionado";

    activeButton();
}

activeButton = () => {
    let button = document.getElementById('confirmar');

    button.disabled = false; 
    button.classList.remove('btn-outline-secondary');
    button.classList.add('btn-success');

}