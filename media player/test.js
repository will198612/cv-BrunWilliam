function play() {

    var player = document.getElementById('audioPlayer').play();

     

    if (player.paused) {

        player.play();

        control.textContent = 'Pause';

    } else {

        player.pause();

        control.textContent = 'Play';

    }

}

 