let indice = 0;
let indSlider = 1;

function avanzaSlide(n){
    indice = indSlider+=n;
    muestraSlides(indice);
}

function positionSlider(n){
    muestraSlides(indice=n);
}

function muestraSlides(n){
    let i;
    let slides = document.getElementsByClassName("slider");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length){
        indice = 1;
    }
    if(n < 1){
        indice = slides.length;
    }

    for(i = 0; i < slides.length; i++){
        slides[i].className = slides[i].className.replace(" active-slider", "");
    }

    for(i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace(" active-dot", "");
    }

    slides[indice-1].className += ' active-slider';
    dots[indice-1].className += ' active-dot';
    
    indSlider = indice;
}