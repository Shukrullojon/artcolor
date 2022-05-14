
let btnCl = document.getElementById('btn-cl')
let btnCl1 = document.getElementById('btn-cl-1')
btnCl.addEventListener('click' , function(){
    ymaps.ready(init) 
    btnCl.style.display = 'none'
})
btnCl1.addEventListener('click' , function(){
    ymaps.ready(init2) 
    btnCl1.style.display = 'none'
})
function init() {
    var myMap = new ymaps.Map('map', {
        center: [41.35, 69.25],
        zoom: 10 ,
        controls : []
    }, {
        searchControlProvider: 'yandex#search'
    }),


    myPlacemark = new ymaps.Placemark([41.35, 69.25], {
    }, {
        /**
         * Options.
         * You must specify this type of layout.
         */
        iconLayout: 'default#image',
        // Custom image for the placemark icon.
        iconImageHref: 'images/location-icons.png',
        // The size of the placemark.
        iconImageSize: [30, 42],
        /**
         * The offset of the upper left corner of the icon relative
         * to its "tail" (the anchor point).
         */
        iconImageOffset: [-5, -38]
    })


    myMap.geoObjects
        .add(myPlacemark)
}

// ymaps.ready(init2);

function init2() {
    var myMap2 = new ymaps.Map('map-2', {
        center: [41.35, 69.25],
        zoom: 10 ,
        controls : []
    }, {
        searchControlProvider: 'yandex#search'
    }),


    myPlacemark2 = new ymaps.Placemark([41.35, 69.25], {
    }, {
        /**
         * Options.
         * You must specify this type of layout.
         */
        iconLayout: 'default#image',
        // Custom image for the placemark icon.
        iconImageHref: 'images/location-icons.png',
        // The size of the placemark.
        iconImageSize: [30, 42],
        /**
         * The offset of the upper left corner of the icon relative
         * to its "tail" (the anchor point).
         */
        iconImageOffset: [-5, -38]
    })


    myMap2.geoObjects
        .add(myPlacemark2)
}
