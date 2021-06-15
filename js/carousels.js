// carousels

function carousel() {
    
    var carousel = $('.card__container').flickity({
        cellAlign: 'left',
        cellSelector: '.b-card',
        friction: 0.55,
        prevNextButtons: true,
        wrapAround: true,
        freeScroll: false,
        autoPlay: 4000,
        pageDots: false,
        groupCells: 1
    });

}

function carouselrelated() {
    
    var carouselrelated = $('.b-related').flickity({
        cellAlign: 'left',
        cellSelector: '.b-card',
        friction: 0.55,
        prevNextButtons: true,
        wrapAround: true,
        freeScroll: false,
        autoPlay: 4000,
        pageDots: false,
        groupCells: 1
    });

}