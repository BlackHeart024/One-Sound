const openOverlay = document.getElementById('addSong');
const overlay = document.getElementById('overlayForm');
const submit = document.getElementById('closeOverlay');

openOverlay.addEventListener("click", () => {
    overlay.classList.remove("visually-hidden")
})

submit.addEventListener("click", ()=> {
    overlay.classList.add("visually-hidden")
})

const start = document.getElementById('onPlay')
const player = document.getElementById('musicPlayer')

let count = 0;

start.addEventListener("click", ()=>{
    if(count === 0){
        player.classList.add('up')
        count = 1;
    }else{
        player.classList.remove('up')
        count = 0;
    }
})