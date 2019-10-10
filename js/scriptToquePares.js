var nPares;
mountToquePares = (dados) => {
    var quiz = document.getElementById('quiz');

    nPares = dados.alternativas.length;

    quiz.classList.add('flex-column');

    //Monta a questão

    //adiciona titulo
    var title = document.createElement('h3');
    var node = document.createTextNode(dados.pergunta);
    title.appendChild(node);

    //adiciona alternativas
    var alts = mountAlternativas(dados);

    quiz.appendChild(title);

    var divAlternativas = document.createElement('div');
    alts.map(x => {
        divAlternativas.appendChild(x);
    })

    divAlternativas.classList.add('d-flex');
    divAlternativas.classList.add('justify-content-center');
    divAlternativas.classList.add('row');
    divAlternativas.classList.add('mb-2');

    quiz.appendChild(divAlternativas);

    //adiciona botao
    var button = document.createElement('button');
    node = document.createTextNode('Confirmar');

    button.id = 'confirmar'
    button.disabled = true;

    button.classList.add('confirma');
    button.classList.add('btn');
    button.classList.add('btn-outline-secondary');
    button.classList.add('btn-custom');

    button.appendChild(node);

    quiz.appendChild(button);

}


function mountAlternativas(dados) {
    let alternativas = [];
    let i = 0;
    var divsAlt = [];

    dados.alternativas.map(x => (
        alternativas.push({
            id: i,
            texto: x.texto,
        }),
        i++,
        alternativas.push({
            id: i,
            texto: x.resposta,
            fk: i - 1,
        }),
        i++
    ))


    shuffle(alternativas); //aleatoriza o array


    alternativas.map(x => {
        var div = document.createElement('div');
        div.id = x.id;
        div.addEventListener('click', function () {
            setSelect(x.id);
        });
        div.classList.add('alternativa-container');

        var temp = document.createElement('span');
        var node = document.createTextNode(x.texto);
        temp.appendChild(node);

        div.appendChild(temp);

        divsAlt.push(div);
    })

    return divsAlt;
}

shuffle = (array) => {
    var m = array.length,
        t, i;

    // Enquanto ainda exitir elementos
    while (m) {

        // Pega um elemento aleatorio
        i = Math.floor(Math.random() * m--);

        // e troca com o elemento atual
        t = array[m];
        array[m] = array[i];
        array[i] = t;
    }

    return array;
}

respondidos = [];
selecionados = [];

setSelect = (id) => {
    if (selecionados.length < 2)
        selecionados.push(id);
    else
        return;

    changeState();

    if (selecionados.length === 2) {
        checkAnswer();
    }
}

checkAnswer = async () => {
    if (selecionados.length === 2) {
        if (selecionados[0] === selecionados[1] + 1 || selecionados[1] === selecionados[0] + 1) {
            respondidos.push(selecionados[0]);
            respondidos.push(selecionados[1]);
            selecionados = [];

            setTimeout(function () {
                changeState()
            }, 500);

        } else {
            setTimeout(async function () {
                setWrong();
                selecionados = await [];
            }, 500);
        }
    }


}

changeState = () => {
    let div;
    selecionados.map(x => {
        div = document.getElementById(x);
        div.classList.add('selected');
    })

    respondidos.map(x => {
        div = document.getElementById(x);
        div.classList.remove('selected');
        div.classList.add('answered');
    })

    activeButtonToquePares();
}

setWrong = () => {
    let div1 = document.getElementById(selecionados[0]);
    let div2 = document.getElementById(selecionados[1]);

    div1.classList.add('wrong');
    div2.classList.add('wrong');

    div1.classList.remove('selected');
    div2.classList.remove('selected');

    setTimeout(function () {
        div1.classList.remove('wrong');
        div2.classList.remove('wrong');
    }, 500)

}



activeButtonToquePares = () => {
    console.log(respondidos.length)
    console.log(nAlternativas)
    if (respondidos.length === nAlternativas) {
        let button = document.getElementById('confirmar');

        button.disabled = false;
        button.classList.remove('btn-outline-secondary');
        button.classList.add('btn-success');
    }

}