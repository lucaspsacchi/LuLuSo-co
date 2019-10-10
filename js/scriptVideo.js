var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '360',
        width: '100%',
        videoId: data.id,
        events: {
            onReady: onReady,
            onStateChange: onPlayerStateChange,
            onStart: fullScreen
        }
    });
}

async function onReady(event) {
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
