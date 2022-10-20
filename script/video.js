var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#peaky button");
var peaky = document.querySelector("#peaky");

Object.defineProperty(HTMLMediaElement.prototype, 'playing', {
  get: function(){
      return !!(this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2);
  }
})

vid.addEventListener('click', function(){
  if(vid.playing){ 
    peaky.style.display = 'block';
  } else {
    peaky.style.display = 'none';
  }
  
})






/*

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
    

}

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{

vid.pause();

vidFade();
}); 


pauseButton.addEventListener("click", function() {
  vid.classList.toggle("stopfade");
  if (vid.paused) {
    vid.play();
    pauseButton.innerHTML = "Pause";
    
    
  } else {
    vid.pause();
    pauseButton.innerHTML = "Paused";
  }
})

*/