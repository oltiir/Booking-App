// Simple list of image paths for the slideshow
var images = [
    "images/turkiye.jpg",
    "images/paris.jpg",
    "images/switzerland.jpg",
    "images/slovenia.jpg",
    "images/italy.jpg"
];

// Start from the first image (index 0)
var currentImage = 0;

// Get the <img> element where we show the slideshow
var slideshow = document.getElementById("slideshow");

// This function changes the image
function changeImage() {
    // Move to the next image
    currentImage = currentImage + 1;

    // If we are past the last image, go back to the first one
    if (currentImage >= images.length) {
        currentImage = 0;
    }

    // Change the src of the <img> to the new image
    slideshow.src = images[currentImage];
}

// Change image every 3000 milliseconds (3 seconds)
setInterval(changeImage, 5000);
