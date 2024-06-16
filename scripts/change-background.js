const images = ['assets/images/background3.jpeg', 'assets/images/backFuckinGround.jpeg', 'assets/images/background5.jpeg'];
const body = document.querySelector('.our-works');
let currentIndex = 0;

function changeBackground() {
    body.style.backgroundImage = `url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length; 
}

changeBackground();
setInterval(changeBackground, 4000);
