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
        height: '320',
        width: '640',
        videoId: 'K1xfGs7pGho',
        events: {
            onReady: onReady,
            onStateChange: onPlayerStateChange
        }
    });
}

function onReady(event) {
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    if (event.data === 0) {
        showMensagem();
    }
}


function showMensagem() {
    var quiz = document.getElementById('quiz');
    quiz.classList.remove('d-none');
}


function mountQuiz() {
    var quiz = document.getElementById('quiz');

    quiz.removeChild(document.getElementById('conteudo')); //remove o conteudo da div
    quiz.classList.add('d-block');
    quiz.classList.add('justify-content-center');
    quiz.classList.add('align-items-center');

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

    button.classList.add('confirma');
    button.classList.add('btn');
    button.classList.add('btn-outline-success');

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
            selected: false,
            answered: false
        }),
        i++,
        alternativas.push({
            id: i,
            texto: x.resposta,
            selected: false,
            answered: false,
            fk: i - 1,
            isAnswer: true
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


setSelect = (id) => {
    const i = alternativas.map(x => x.id).indexOf(id);

    let newState = [...alternativas];

    if (!newState[i].answered)
        newState[i].selected = !newState[i].selected;


    alternativas = [...newState];

    checkAnswer();

    changeState(id);
}


setAnswered = (id) => {
    const i = alternativas.map(x => x.id).indexOf(id);

    let newState = [...alternativas]
    newState[i].answered = !newState[i].answered;

    alternativas = [...newState];


    changeState(id);
}

checkAnswer = () => {
    //checa as alternativas selecionadas se são  pares
    const selected = [];

    alternativas.map(x => {
        if (x.selected && !x.answered)
            selected.push(x);
    })

    if (selected.length === 2) {
        if (selected[0].id === selected[1].fk || selected[1].id === selected[0].fk) {
            setAnswered(selected[0].id);
            setAnswered(selected[1].id);
        } else {
            setSelect(selected[0].id);
            setSelect(selected[1].id);
        }
    }
}

changeState = (id) => {
    let div = document.getElementById(id);
    const i = alternativas.map(x => x.id).indexOf(id);

    if (alternativas[i].answered) {
        div.classList.remove('selected');
        div.classList.add('answered');
        div.removeEventListener('click', function () {});
    } else if (alternativas[i].selected)
        div.classList.add('selected');
    else {
        div.classList.remove('selected');
        div.classList.remove('answered');
    }

}