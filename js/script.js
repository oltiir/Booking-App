var images = [
    "/images/turkiye.jpg",
    "/images/paris.jpg",
    "/images/switzerland.jpg",
    "/images/slovenia.jpg",
    "/images/italy.jpg"
];

var currentImage = 0;
var slideshow = document.getElementById("slideshow");

function changeImage() {
    currentImage = currentImage + 1;
    if (currentImage >= images.length) {
        currentImage = 0;
    }
    slideshow.src = images[currentImage];
}

setInterval(changeImage, 5000);
