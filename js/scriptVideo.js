var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '640px',
        width: '100%',
        videoId: data.id,
        events: {
            onReady: onReady,
            onStateChange: onPlayerStateChange
        }
    });
}

async function onReady(event) {
    event.target.playVideo();
}


function onPlayerStateChange(event) {
    var player = document.getElementById('player');

    console.log(event.data);
    if(event.data === 2 || event.data === 0){
        player.style.height = '200px';
        showMensagem();
    }else if(event.data === 1){
        player.style.height = '640px';
        hideMensagem();
    }

}


function showMensagem() {
    var quiz = document.getElementById('quiz');
    quiz.classList.remove('d-none');
}


function hideMensagem() {
    var quiz = document.getElementById('quiz');
    quiz.classList.add('d-none');
}
