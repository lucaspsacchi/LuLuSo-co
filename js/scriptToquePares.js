const dados = [{
        texto: 'item1',
        resposta: 'parItem1'
    },
    {
        texto: 'item2',
        resposta: 'parItem2'
    },
    {
        texto: 'item3',
        resposta: 'parItem3'
    },
    {
        texto: 'item4',
        resposta: 'parItem4'
    },
]

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
"https://www.youtube.com/embed/K1xfGs7pGho"

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '640',
        width: '100%',
        videoId: 'K1xfGs7pGho',
        events: {
            onReady: onReady,
            onStateChange: onPlayerStateChange,
            onStart: fullScreen
        }
    });
}

function onReady(event) {
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    console.log(event.data);
    if (event.data === 0) {
        showMensagem();
    }
    else if(event.data === 2 || event.data === 0){
        var player = document.getElementById('player');
        player.style.height = '200px'
    }

}

function fullScreen() {
    var e = document.getElementById("player");
    if (e.requestFullscreen) {
        e.requestFullscreen();
    } else if (e.webkitRequestFullscreen) {
        e.webkitRequestFullscreen();
    } else if (e.mozRequestFullScreen) {
        e.mozRequestFullScreen();
    } else if (e.msRequestFullscreen) {
        e.msRequestFullscreen();
    }

}


function showMensagem() {
    var quiz = document.getElementById('quiz');
    quiz.classList.remove('d-none');
}


function mountQuiz() {
    var quiz = document.getElementById('quiz');

    quiz.removeChild(document.getElementById('conteudo')); //remove o conteudo da div
    quiz.classList.add('flex-column');

    //Monta a questão

    //adiciona titulo
    var title = document.createElement('h1');
    var node = document.createTextNode('Toque nos pares...');
    title.appendChild(node);

    //adiciona alternativas
    var alts = mountAlternativas();

    quiz.appendChild(title);

    var divAlternativas = document.createElement('div');
    alts.map(x => {
        divAlternativas.appendChild(x);
    })

    divAlternativas.classList.add('d-flex');
    divAlternativas.classList.add('justify-content-center');
    divAlternativas.classList.add('row');

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
    button.classList.add('mt-5');

    button.appendChild(node);

    quiz.appendChild(button);

}

let alternativas = [];

function mountAlternativas() {
    let i = 0;
    var divsAlt = [];

    dados.map(x => (
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

    const i = alternativas.map(x => x.id).indexOf(id);

    if (selecionados.length < 2)
        selecionados.push(alternativas[i]);
    else
        return;

    changeState();

    if (selecionados.length === 2) {
        checkAnswer();
    }
}


setAnswered = (id) => {
    const i = alternativas.map(x => x.id).indexOf(id);

    let newState = [...alternativas]
    newState[i].answered = !newState[i].answered;

    alternativas = [...newState];


    changeState(id);
}

checkAnswer = async () => {
    if (selecionados.length === 2) {
        if (selecionados[0].id === selecionados[1].fk || selecionados[1].id === selecionados[0].fk) {
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
        div = document.getElementById(x.id);
        div.classList.add('selected');
    })

    respondidos.map(x => {
        div = document.getElementById(x.id);
        div.classList.remove('selected');
        div.classList.add('answered');
    })

    activeButton();
}

setWrong = () => {
    let div1 = document.getElementById(selecionados[0].id);
    let div2 = document.getElementById(selecionados[1].id);

    div1.classList.add('wrong');
    div2.classList.add('wrong');

    div1.classList.remove('selected');
    div2.classList.remove('selected');
    
    setTimeout(function(){
        div1.classList.remove('wrong');
        div2.classList.remove('wrong');
    }, 500)

}



activeButton =  () => {
    if (respondidos.length === alternativas.length) {
        let button = document.getElementById('confirmar');

        button.disabled = false;
        button.classList.remove('btn-outline-secondary');
        button.classList.add('btn-success');
    }

}