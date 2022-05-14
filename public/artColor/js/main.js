
// loader

let loader = document.getElementById('loader-content');
setTimeout(() => {
  loader.style.opacity = '0'
  setTimeout(()=>{
    loader.style.display = 'none'
  }, 1000)
} , 2000)

let slideIndex = 1;
showSlides(slideIndex);

function nextSlide() {
    showSlides(slideIndex += 1);
}

function previousSlide() {
    showSlides(slideIndex -= 1);  
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("main-slider-item");
    
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
  
    for (let slide of slides) {
        slide.style.display = "none";
    }   
    slides[slideIndex - 1].style.display = "block"; 
}

// progress bar
const showOnPx = 100;
const pageProgressBar = document.querySelector(".progress-bar");

const scrollContainer = () => {
    return document.documentElement || document.body;
  };

document.addEventListener("scroll", () => {

    const scrolledPercentage =
      (scrollContainer().scrollTop /
        (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
      100;
  
    pageProgressBar.style.width = `${scrolledPercentage}%`;
  
    
  });

//  to check input 




const validateEmail = (mail) => {
  return mail.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};

let checkbox = document.getElementById('ok');
if(checkbox){
  checkbox.addEventListener('click' , function(){
    if(checkbox.checked == true){
        // input value
        let name = document.getElementById('Имя').value ;
        let tel = document.getElementById('tel').value ;
        let mail = document.getElementById('mail').value ;
        
        // input
        let mailInput = document.getElementById('mail');
        let telInput = document.getElementById('tel') ;
        let nameInput = document.getElementById('Имя') ;

        if(validateEmail(mail)){
          mailInput.style.borderBottom = '2px solid green'
        }else{
          mailInput.style.borderBottom = '2px solid red'
        }
        
        if(name == ''){
          nameInput.style.borderBottom = '2px solid red'
        }else{
          nameInput.style.borderBottom = '2px solid green'
        }

        if(tel == ""){
          telInput.style.borderBottom = '2px solid red'
        }else{
          telInput.style.borderBottom = '2px solid green'
        }
        


      }else{
        console.log('checkbox isn\'t checked ')
      }
  })
}



//   scroll top
let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll = function () {
        scrollFunction();
        };

        function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }

// card - item tab -- filter
function filterCard(){
  let cardBtn = document.querySelectorAll('.card-head-item');
  let cardInput = document.querySelectorAll('#card-input:checked') ;
  let cards = document.querySelectorAll('.card-foot-item-a');
  
  cards.forEach(card => {
      let cardId = card.getAttribute('data-card-id');

      cardInput.forEach(element => {
        let inputItem = element.getAttribute('data-value');

        cardBtn.forEach(item => {
            let itemid = item.getAttribute('data-card');
            if(itemid == inputItem){
              item.classList.add('active')
            }else{
              item.classList.remove('active')
            }
        });
        

        if(!(cardId == inputItem)){
          card.style.display = 'none'
        }else{
          card.style.display = 'block'
        }


      });
      

  });

}


// our product slider
let nextBtnOur = document.querySelector('.nextOurBtn');
let prevBtnOur = document.querySelector('.prevOurBtn');

let currentSlides = document.getElementsByClassName('our-right-item');
let nextSlides = document.getElementsByClassName('nextOur') ;
let ourright = document.querySelector('.our-right-content')
let ourrightContent = document.querySelector('.our-right-content').children ;
let ourproductcontentitem = document.querySelector('.our-product-content-item').children ;
let totalImages = ourrightContent.length ;
let totalproduct = ourproductcontentitem.length;

let index = 0 ;
let indexNext = 1 ;
let indexProduct = 0 ;

nextBtnOur.addEventListener('click', () => {
  nextImage('next');
})

prevBtnOur.addEventListener('click', () => {
  nextImage('prev');
})


function nextImage(direction){
  if(direction == 'next'){
    index++ ;
    indexNext++ ;
    indexProduct++ ;
    if(index == totalImages ||indexNext == 0  || indexProduct == totalproduct){
      index = 0 ;
      indexNext = 1 ;
      indexProduct = 0 ;
      ourright.style.flexDirection = 'row';
    }else if(indexNext == totalImages) {
      indexNext = 0 ;
      ourright.style.flexDirection = 'row-reverse';
    }
  }else{
    if(index == 0 || indexNext == 1 || indexProduct == 0){
      index = totalImages - 1 ;
      indexProduct = totalproduct - 1 ;
      ourright.style.flexDirection = 'row-reverse';
      indexNext = 0 ;
    }else if (indexNext == 0 || index == totalImages.length || indexProduct == totalproduct.length){
      indexNext = totalImages - 1 ;
      ourright.style.flexDirection = 'row';
      index-- ;
      indexProduct-- ;
    }else{
      index-- ;
      indexNext-- ;
      indexProduct-- ;
    }
  }


  for(let i = 0; i < ourrightContent.length; i++) {
    ourrightContent[i].classList.remove('activeItem');
  }
  ourrightContent[index].classList.add('activeItem');

  for(let i = 0 ; i < nextSlides.length ; i++){
    nextSlides[i].classList.remove("nextItem")
  }
  nextSlides[indexNext].classList.add("nextItem")

  for(let i = 0; i < ourproductcontentitem.length; i++) {
    ourproductcontentitem[i].classList.remove('active');
  }
  ourproductcontentitem[indexProduct].classList.add('active');

}


// slider Product

let answere = document.querySelector('.answere');
let item1 = document.querySelector('.item-1-1');
let item2 = document.querySelector('.item-1-2');
let item3 = document.querySelector('.item-1-3');
let item4 = document.querySelector('.item-1-4');
let item5 = document.querySelector('.item-1-5');
let item6 = document.querySelector('.item-1-6');


let slidepitem1 = document.querySelector('.slide-p-item-1');
    slidepitem2 = document.querySelector('.slide-p-item-2');
    slidepitem3 = document.querySelector('.slide-p-item-3');
    slidepitem4 = document.querySelector('.slide-p-item-4');
    slidepitem5 = document.querySelector('.slide-p-item-5');
    slidepitem6 = document.querySelector('.slide-p-item-6');

let productitem1 = document.querySelector('.product-item-1');
    productitem2 = document.querySelector('.product-item-2');
    productitem3 = document.querySelector('.product-item-3');
    productitem4 = document.querySelector('.product-item-4');
    productitem5 = document.querySelector('.product-item-5');
    productitem6 = document.querySelector('.product-item-6');


let sliderProductIndex = 1;

if(answere.innerHTML == '1'){
  item1.style.border = '5px solid #FFC300';
}

function nextBtn(sliderProductIndex) {
    sliderProductIndex += 1 ;
    answere.innerHTML++;

    if(answere.innerHTML == '7'){
      answere.innerHTML = '1' ;
      item1.style.border = '5px solid #FFC300';
      item2.style.border = 'none';
      item3.style.border = 'none';
      item4.style.border = 'none';
      item5.style.border = 'none';
      item6.style.border = 'none';
      slidepitem1.style.display = 'block';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'block';
      productitem2.style.display = 'none';
      productitem3.style.display = 'none';
      productitem4.style.display = 'none';
      productitem5.style.display = 'none';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '3'){
      item1.style.border = 'none'
      item2.style.border = 'none'
      item3.style.border = '5px solid #FFC300'
      item4.style.border = 'none';
      item5.style.border = 'none';
      item6.style.border = 'none';
      slidepitem1.style.display = 'none';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'block';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'none';
      productitem2.style.display = 'none';
      productitem3.style.display = 'block';
      productitem4.style.display = 'none';
      productitem5.style.display = 'none';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '2'){
      item1.style.border = 'none'
      item2.style.border = '5px solid #FFC300'
      item3.style.border = 'none'
      item4.style.border = 'none';
      item5.style.border = 'none'
      item6.style.border = 'none'
      slidepitem1.style.display = 'none';
      slidepitem2.style.display = 'block';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'none';
      productitem2.style.display = 'block';
      productitem3.style.display = 'none';
      productitem4.style.display = 'none';
      productitem5.style.display = 'none';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '1'){
      item1.style.border = '5px solid #FFC300'
      item2.style.border = 'none'
      item3.style.border = 'none'
      item4.style.border = 'none';
      item5.style.border = 'none';
      item6.style.border = 'none';
      slidepitem1.style.display = 'block';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'block';
      productitem2.style.display = 'none';
      productitem3.style.display = 'none';
      productitem4.style.display = 'none';
      productitem5.style.display = 'none';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '4'){
      item4.style.border = '5px solid #FFC300';
      item1.style.border = 'none'
      item2.style.border = 'none'
      item3.style.border = 'none'
      item5.style.border = 'none'
      item6.style.border = 'none'
      slidepitem1.style.display = 'none';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'block';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'none';
      productitem2.style.display = 'none';
      productitem3.style.display = 'none';
      productitem4.style.display = 'block';
      productitem5.style.display = 'none';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '5'){
      item4.style.border = 'none';
      item1.style.border = 'none'
      item2.style.border = 'none'
      item3.style.border = 'none'
      item5.style.border = '5px solid #FFC300'
      item6.style.border = 'none'
      slidepitem1.style.display = 'none';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'block';
      slidepitem6.style.display = 'none';
      productitem1.style.display = 'none';
      productitem2.style.display = 'none';
      productitem3.style.display = 'none';
      productitem4.style.display = 'none';
      productitem5.style.display = 'block';
      productitem6.style.display = 'none';
    }else if(answere.innerHTML == '6'){
      item4.style.border = 'none';
      item1.style.border = 'none'
      item2.style.border = 'none'
      item3.style.border = 'none'
      item5.style.border = 'none'
      item6.style.border = '5px solid #FFC300'
      slidepitem1.style.display = 'none';
      slidepitem2.style.display = 'none';
      slidepitem3.style.display = 'none';
      slidepitem4.style.display = 'none';
      slidepitem5.style.display = 'none';
      slidepitem6.style.display = 'block';
      productitem1.style.display = 'none';
      productitem2.style.display = 'none';
      productitem3.style.display = 'none';
      productitem4.style.display = 'none';
      productitem5.style.display = 'none';
      productitem6.style.display = 'block';
    }
    
}

function prevBtn(sliderProductIndex) {
  sliderProductIndex -= 1 ;
  answere.innerHTML--;

  if(answere.innerHTML == '0'){
    answere.innerHTML = '6' ;
    item1.style.border = 'none';
    item2.style.border = 'none';
    item3.style.border = 'none';
    item4.style.border = 'none';
    item5.style.border = 'none';
    item6.style.border = '5px solid #FFC300';
    slidepitem1.style.display = 'none';
    slidepitem2.style.display = 'none';
    slidepitem3.style.display = 'none';
    slidepitem4.style.display = 'none';
    slidepitem5.style.display = 'none';
    slidepitem6.style.display = 'block';
    productitem1.style.display = 'none';
    productitem2.style.display = 'none';
    productitem3.style.display = 'none';
    productitem4.style.display = 'none';
    productitem5.style.display = 'none';
    productitem6.style.display = 'block';
  }else if(answere.innerHTML == '3'){
    item1.style.border = 'none';
    item2.style.border = 'none';
    item3.style.border = '5px solid #FFC300';
    item4.style.border = 'none';
    item5.style.border = 'none';
    item6.style.border = 'none';
    slidepitem1.style.display = 'none';
    slidepitem2.style.display = 'none';
    slidepitem3.style.display = 'block';
    slidepitem4.style.display = 'none';
    slidepitem5.style.display = 'none';
    slidepitem6.style.display = 'none';
    productitem1.style.display = 'none';
    productitem2.style.display = 'none';
    productitem3.style.display = 'block';
    productitem4.style.display = 'none';
    productitem5.style.display = 'none';
    productitem6.style.display = 'none';
  }else if(answere.innerHTML == '2'){
    item1.style.border = 'none';
    item2.style.border = '5px solid #FFC300';
    item3.style.border = 'none' ;
    item4.style.border = 'none';
    item5.style.border = 'none';
    item6.style.border = 'none';
    slidepitem1.style.display = 'none';
    slidepitem2.style.display = 'block';
    slidepitem3.style.display = 'none';
    slidepitem4.style.display = 'none';
    slidepitem5.style.display = 'none';
    slidepitem6.style.display = 'none';
    productitem1.style.display = 'none';
    productitem2.style.display = 'block';
    productitem3.style.display = 'none';
    productitem4.style.display = 'none';
    productitem5.style.display = 'none';
    productitem6.style.display = 'none';
  }else if(answere.innerHTML == '1'){
    item4.style.border = 'none';
    item1.style.border = '5px solid #FFC300';
    item2.style.border = 'none';
    item3.style.border = 'none';
    item5.style.border = 'none';
    item6.style.border = 'none';
    slidepitem1.style.display = 'block';
    slidepitem2.style.display = 'none';
    slidepitem3.style.display = 'none';
    slidepitem4.style.display = 'none';
    slidepitem5.style.display = 'none';
    slidepitem6.style.display = 'none';
    productitem1.style.display = 'block';
    productitem2.style.display = 'none';
    productitem3.style.display = 'none';
    productitem4.style.display = 'none';
    productitem5.style.display = 'none';
    productitem6.style.display = 'none';
  }else if(answere.innerHTML == '4'){
    item1.style.border = 'none';
    item2.style.border = 'none';
    item3.style.border = 'none';
    item4.style.border = '5px solid #FFC300';
    item5.style.border = 'none';
    item6.style.border = 'none';
    slidepitem1.style.display = 'none';
    slidepitem2.style.display = 'none';
    slidepitem3.style.display = 'none';
    slidepitem4.style.display = 'block';
    slidepitem5.style.display = 'none';
    slidepitem6.style.display = 'none';
    productitem1.style.display = 'none';
    productitem2.style.display = 'none';
    productitem3.style.display = 'none';
    productitem4.style.display = 'block';
    productitem5.style.display = 'none';
    productitem6.style.display = 'none';
  }else if(answere.innerHTML == '5'){
    item1.style.border = 'none';
    item2.style.border = 'none';
    item3.style.border = 'none';
    item4.style.border = 'none';
    item5.style.border = '5px solid #FFC300';
    item6.style.border = 'none';
    slidepitem1.style.display = 'none';
    slidepitem2.style.display = 'none';
    slidepitem3.style.display = 'none';
    slidepitem4.style.display = 'none';
    slidepitem5.style.display = 'block';
    slidepitem6.style.display = 'none';
    productitem1.style.display = 'none';
    productitem2.style.display = 'none';
    productitem3.style.display = 'none';
    productitem4.style.display = 'none';
    productitem5.style.display = 'block';
    productitem6.style.display = 'none';
  }



}



// item slider -2 
item1.onclick = function(){
  answere.innerHTML = '1'
  item1.style.border = '5px solid #FFC300';
  item2.style.border = 'none';
  item3.style.border = 'none';
  item4.style.border = 'none';
  item5.style.border = 'none';
  item6.style.border = 'none';
  slidepitem1.style.display = 'block';
  slidepitem2.style.display = 'none';
  slidepitem3.style.display = 'none';
  slidepitem4.style.display = 'none';
  slidepitem5.style.display = 'none';
  slidepitem6.style.display = 'none';
  productitem1.style.display = 'block';
  productitem2.style.display = 'none';
  productitem3.style.display = 'none';
  productitem4.style.display = 'none';
  productitem5.style.display = 'none';
  productitem6.style.display = 'none';
}
item2.onclick = function(){
  answere.innerHTML = '2'
  item1.style.border = 'none';
  item2.style.border = '5px solid #FFC300';
  item3.style.border = 'none';
  item4.style.border = 'none';
  item5.style.border = 'none';
  item6.style.border = 'none';
  slidepitem1.style.display = 'none';
  slidepitem2.style.display = 'block';
  slidepitem3.style.display = 'none';
  slidepitem4.style.display = 'none';
  slidepitem5.style.display = 'none';
  slidepitem6.style.display = 'none';
  productitem1.style.display = 'none';
  productitem2.style.display = 'block';
  productitem3.style.display = 'none';
  productitem4.style.display = 'none';
  productitem5.style.display = 'none';
  productitem6.style.display = 'none';
}
item3.onclick = function(){
  answere.innerHTML = '3'
  item1.style.border = 'none';
  item2.style.border = 'none';
  item3.style.border = '5px solid #FFC300';
  item4.style.border = 'none';
  item5.style.border = 'none';
  item6.style.border = 'none';
  slidepitem1.style.display = 'none';
  slidepitem2.style.display = 'none';
  slidepitem3.style.display = 'block';
  slidepitem4.style.display = 'none';
  slidepitem5.style.display = 'none';
  slidepitem6.style.display = 'none';
  productitem1.style.display = 'none';
  productitem2.style.display = 'none';
  productitem3.style.display = 'block';
  productitem4.style.display = 'none';
  productitem5.style.display = 'none';
  productitem6.style.display = 'none';
}
item4.onclick = function(){
  answere.innerHTML = '4'
  item1.style.border = 'none';
  item2.style.border = 'none';
  item3.style.border = 'none';
  item4.style.border = '5px solid #FFC300';
  item5.style.border = 'none';
  item6.style.border = 'none';
  slidepitem1.style.display = 'none';
  slidepitem2.style.display = 'none';
  slidepitem3.style.display = 'none';
  slidepitem4.style.display = 'block';
  slidepitem5.style.display = 'none';
  slidepitem6.style.display = 'none';
  productitem1.style.display = 'none';
  productitem2.style.display = 'none';
  productitem3.style.display = 'none';
  productitem4.style.display = 'block';
  productitem5.style.display = 'none';
  productitem6.style.display = 'none';
}
item5.onclick = function(){
  answere.innerHTML = '5'
  item1.style.border = 'none';
  item2.style.border = 'none';
  item3.style.border = 'none';
  item4.style.border = 'none';
  item5.style.border = '5px solid #FFC300';
  item6.style.border = 'none';
  slidepitem1.style.display = 'none';
  slidepitem2.style.display = 'none';
  slidepitem3.style.display = 'none';
  slidepitem4.style.display = 'none';
  slidepitem5.style.display = 'block';
  slidepitem6.style.display = 'none';
  productitem1.style.display = 'none';
  productitem2.style.display = 'none';
  productitem3.style.display = 'none';
  productitem4.style.display = 'none';
  productitem5.style.display = 'block';
  productitem6.style.display = 'none';
}
item6.onclick = function(){
  answere.innerHTML = '6'
  item1.style.border = 'none';
  item2.style.border = 'none';
  item3.style.border = 'none';
  item4.style.border = 'none';
  item5.style.border = 'none';
  item6.style.border = '5px solid #FFC300';
  slidepitem1.style.display = 'none';
  slidepitem2.style.display = 'none';
  slidepitem3.style.display = 'none';
  slidepitem4.style.display = 'none';
  slidepitem5.style.display = 'none';
  slidepitem6.style.display = 'block';
  productitem1.style.display = 'none';
  productitem2.style.display = 'none';
  productitem3.style.display = 'none';
  productitem4.style.display = 'none';
  productitem5.style.display = 'none';
  productitem6.style.display = 'block';
}


// first slide item

let answereOne = document.querySelector('.answereOne');
let itemOne = document.querySelector('.item-1');
let itemTwo = document.querySelector('.item-2');
let itemThree = document.querySelector('.item-3');
let itemFour = document.querySelector('.item-4');
let itemFive = document.querySelector('.item-5');
let itemSix = document.querySelector('.item-6');


let slidepitemOne = document.querySelector('.slide-p-item-One');
    slidepitemTwo = document.querySelector('.slide-p-item-Two');
    slidepitemThree = document.querySelector('.slide-p-item-Three');
    slidepitemFour = document.querySelector('.slide-p-item-Four');
    slidepitemFive = document.querySelector('.slide-p-item-Five');
    slidepitemSix = document.querySelector('.slide-p-item-Six');

let productitemOne = document.querySelector('.product-item1');
    productitemTwo = document.querySelector('.product-item2');
    productitemThree = document.querySelector('.product-item3');
    productitemFour = document.querySelector('.product-item4');
    productitemFive = document.querySelector('.product-item5');
    productitemSix = document.querySelector('.product-item6');


let sliderProductIndexOne = 1;

if(answereOne.innerHTML == '1'){
  itemOne.style.border = '5px solid #FFC300';
}

function nextBtnOne(sliderProductIndexOne) {
    sliderProductIndexOne += 1 ;
    answereOne.innerHTML++;

    if(answereOne.innerHTML == '7'){
      answereOne.innerHTML = '1' ;
      itemOne.style.border = '5px solid #FFC300';
      itemTwo.style.border = 'none';
      itemThree.style.border = 'none';
      itemFour.style.border = 'none';
      itemFive.style.border = 'none';
      itemSix.style.border = 'none';
      slidepitemOne.style.display = 'block';
      slidepitemTwo.style.display = 'none';
      slidepitemThree.style.display = 'none';
      slidepitemFour.style.display = 'none';
      slidepitemFive.style.display = 'none';
      slidepitemSix.style.display = 'none';
      productitemOne.style.display = 'block';
      productitemTwo.style.display = 'none';
      productitemThree.style.display = 'none';
      productitemFour.style.display = 'none';
      productitemFive.style.display = 'none';
      productitemSix.style.display = 'none';
    }else if(answereOne.innerHTML == '3'){
      itemOne.style.border = 'none';
      itemTwo.style.border = 'none';
      itemThree.style.border = '5px solid #FFC300';
      itemFour.style.border = 'none';
      slidepitemOne.style.display = 'none';
      slidepitemTwo.style.display = 'none';
      slidepitemThree.style.display = 'block';
      slidepitemFour.style.display = 'none';
      slidepitemFive.style.display = 'none';
      slidepitemSix.style.display = 'none';
      productitemOne.style.display = 'none';
      productitemTwo.style.display = 'none';
      productitemThree.style.display = 'block';
      productitemFour.style.display = 'none';
      productitemFive.style.display = 'none';
      productitemSix.style.display = 'none';
    }else if(answereOne.innerHTML == '2'){
      itemOne.style.border = 'none';
      itemTwo.style.border = '5px solid #FFC300';
      itemThree.style.border = 'none';
      itemFour.style.border = 'none';
      slidepitemOne.style.display = 'none';
      slidepitemTwo.style.display = 'block';
      slidepitemThree.style.display = 'none';
      slidepitemFour.style.display = 'none';
      slidepitemFive.style.display = 'none';
      slidepitemSix.style.display = 'none';
      productitemOne.style.display = 'none';
      productitemTwo.style.display = 'block';
      productitemThree.style.display = 'none';
      productitemFour.style.display = 'none';
      productitemFive.style.display = 'none';
      productitemSix.style.display = 'none';
    }else if(answereOne.innerHTML == '4'){
      itemOne.style.border = 'none';
      itemTwo.style.border = 'none';
      itemThree.style.border = 'none';
      itemFour.style.border = '5px solid #FFC300';
      slidepitemOne.style.display = 'none';
      slidepitemTwo.style.display = 'none';
      slidepitemThree.style.display = 'none';
      slidepitemFour.style.display = 'block';
      slidepitemFive.style.display = 'none';
      slidepitemSix.style.display = 'none';
      productitemOne.style.display = 'none';
      productitemTwo.style.display = 'none';
      productitemThree.style.display = 'none';
      productitemFour.style.display = 'block';
      productitemFive.style.display = 'none';
      productitemSix.style.display = 'none';
    }else if(answereOne.innerHTML == '5'){
      itemOne.style.border = 'none';
      itemTwo.style.border = 'none';
      itemThree.style.border = 'none';
      itemFour.style.border = 'none';
      itemFive.style.border = '5px solid #FFC300';
      itemSix.style.border = 'none';
      slidepitemOne.style.display = 'none';
      slidepitemTwo.style.display = 'none';
      slidepitemThree.style.display = 'none';
      slidepitemFour.style.display = 'none';
      slidepitemFive.style.display = 'block';
      slidepitemSix.style.display = 'none';
      productitemOne.style.display = 'none';
      productitemTwo.style.display = 'none';
      productitemThree.style.display = 'none';
      productitemFour.style.display = 'none';
      productitemFive.style.display = 'block';
      productitemSix.style.display = 'none';
    }else if(answereOne.innerHTML == '6'){
      itemOne.style.border = 'none';
      itemTwo.style.border = 'none';
      itemThree.style.border = 'none';
      itemFour.style.border = 'none';
      itemFive.style.border = 'none';
      itemSix.style.border = '5px solid #FFC300';
      slidepitemOne.style.display = 'none';
      slidepitemTwo.style.display = 'none';
      slidepitemThree.style.display = 'none';
      slidepitemFour.style.display = 'none';
      slidepitemFive.style.display = 'none';
      slidepitemSix.style.display = 'block';
      productitemOne.style.display = 'none';
      productitemTwo.style.display = 'none';
      productitemThree.style.display = 'none';
      productitemFour.style.display = 'none';
      productitemFive.style.display = 'none';
      productitemSix.style.display = 'block';
    }
    
}

function prevBtnOne(sliderProductIndexOne) {
  sliderProductIndexOne -= 1 ;
  answereOne.innerHTML--;

  if(answereOne.innerHTML == '0'){
    answereOne.innerHTML = '6' ;
    itemOne.style.border = 'none';
    itemTwo.style.border = 'none';
    itemThree.style.border = 'none';
    itemFour.style.border = 'none';
    itemFive.style.border = 'none';
    itemSix.style.border = '5px solid #FFC300';
    slidepitemOne.style.display = 'none';
    slidepitemTwo.style.display = 'none';
    slidepitemThree.style.display = 'none';
    slidepitemFour.style.display = 'none';
    slidepitemFive.style.display = 'none';
    slidepitemSix.style.display = 'block';
    productitemOne.style.display = 'none';
    productitemTwo.style.display = 'none';
    productitemThree.style.display = 'none';
    productitemFour.style.display = 'none';
    productitemFive.style.display = 'none';
    productitemSix.style.display = 'block';
  }else if(answereOne.innerHTML == '5'){
    answereOne.innerHTML = '5' ;
    itemOne.style.border = 'none';
    itemTwo.style.border = 'none';
    itemThree.style.border = 'none';
    itemFour.style.border = 'none';
    itemFive.style.border = '5px solid #FFC300';
    itemSix.style.border = 'none';
    slidepitemOne.style.display = 'none';
    slidepitemTwo.style.display = 'none';
    slidepitemThree.style.display = 'none';
    slidepitemFour.style.display = 'none';
    slidepitemFive.style.display = 'block';
    slidepitemSix.style.display = 'none';
    productitemOne.style.display = 'none';
    productitemTwo.style.display = 'none';
    productitemThree.style.display = 'none';
    productitemFour.style.display = 'none';
    productitemFive.style.display = 'block';
    productitemSix.style.display = 'none';
  }else if(answereOne.innerHTML == '4'){
    answereOne.innerHTML = '4' ;
    itemOne.style.border = 'none';
    itemTwo.style.border = 'none';
    itemThree.style.border = 'none';
    itemFour.style.border = '5px solid #FFC300';
    itemFive.style.border = 'none';
    itemSix.style.border = 'none';
    slidepitemOne.style.display = 'none';
    slidepitemTwo.style.display = 'none';
    slidepitemThree.style.display = 'none';
    slidepitemFour.style.display = 'block';
    slidepitemFive.style.display = 'none';
    slidepitemSix.style.display = 'none';
    productitemOne.style.display = 'none';
    productitemTwo.style.display = 'none';
    productitemThree.style.display = 'none';
    productitemFour.style.display = 'block';
    productitemFive.style.display = 'none';
    productitemSix.style.display = 'none';
  }else if(answereOne.innerHTML == '3'){
    itemOne.style.border = 'none';
    itemTwo.style.border = 'none';
    itemThree.style.border = '5px solid #FFC300';
    itemFour.style.border = 'none';
    itemFive.style.border = 'none';
    itemSix.style.border = 'none';
    slidepitemOne.style.display = 'none';
    slidepitemTwo.style.display = 'none';
    slidepitemThree.style.display = 'block';
    slidepitemFour.style.display = 'none';
    slidepitemFive.style.display = 'none';
    slidepitemSix.style.display = 'none';
    productitemOne.style.display = 'none';
    productitemTwo.style.display = 'none';
    productitemThree.style.display = 'block';
    productitemFour.style.display = 'none';
    productitemFive.style.display = 'none';
    productitemSix.style.display = 'none';
  }else if(answereOne.innerHTML == '2'){
    itemOne.style.border = 'none';
    itemTwo.style.border = '5px solid #FFC300';
    itemThree.style.border = 'none';
    itemFour.style.border = 'none';
    itemFive.style.border = 'none';
    itemSix.style.border = 'none';
    slidepitemOne.style.display = 'none';
    slidepitemTwo.style.display = 'block';
    slidepitemThree.style.display = 'none';
    slidepitemFour.style.display = 'none';
    slidepitemFive.style.display = 'none';
    slidepitemSix.style.display = 'none';
    productitemOne.style.display = 'none';
    productitemTwo.style.display = 'block';
    productitemThree.style.display = 'none';
    productitemFour.style.display = 'none';
    productitemFive.style.display = 'none';
    productitemSix.style.display = 'none';
  }else if(answereOne.innerHTML == '1'){
    itemOne.style.border = '5px solid #FFC300';
    itemTwo.style.border = 'none';
    itemThree.style.border = 'none';
    itemFour.style.border = 'none';
    itemFive.style.border = 'none';
    itemSix.style.border = 'none';
    slidepitemOne.style.display = 'block';
    slidepitemTwo.style.display = 'none';
    slidepitemThree.style.display = 'none';
    slidepitemFour.style.display = 'none';
    slidepitemFive.style.display = 'none';
    slidepitemSix.style.display = 'none';
    productitemOne.style.display = 'block';
    productitemTwo.style.display = 'none';
    productitemThree.style.display = 'none';
    productitemFour.style.display = 'none';
    productitemFive.style.display = 'none';
    productitemSix.style.display = 'none';
  }
}



// img item slider
itemOne.onclick = function(){
  answereOne.innerHTML = '1'
  itemOne.style.border = '5px solid #FFC300';
  itemTwo.style.border = 'none';
  itemThree.style.border = 'none';
  itemFour.style.border = 'none';
  itemFive.style.border = 'none';
  itemSix.style.border = 'none';
  slidepitemOne.style.display = 'block';
  slidepitemTwo.style.display = 'none';
  slidepitemThree.style.display = 'none';
  slidepitemFour.style.display = 'none';
  slidepitemFive.style.display = 'none';
  slidepitemSix.style.display = 'none';
  productitemOne.style.display = 'block';
  productitemTwo.style.display = 'none';
  productitemThree.style.display = 'none';
  productitemFour.style.display = 'none';
  productitemFive.style.display = 'none';
  productitemSix.style.display = 'none';
}
itemTwo.onclick = function(){
  answereOne.innerHTML = '2'
  itemOne.style.border = 'none';
  itemTwo.style.border = '5px solid #FFC300';
  itemThree.style.border = 'none';
  itemFour.style.border = 'none';
  itemFive.style.border = 'none';
  itemSix.style.border = 'none';
  slidepitemOne.style.display = 'none';
  slidepitemTwo.style.display = 'block';
  slidepitemThree.style.display = 'none';
  slidepitemFour.style.display = 'none';
  slidepitemFive.style.display = 'none';
  slidepitemSix.style.display = 'none';
  productitemOne.style.display = 'none';
  productitemTwo.style.display = 'block';
  productitemThree.style.display = 'none';
  productitemFour.style.display = 'none';
  productitemFive.style.display = 'none';
  productitemSix.style.display = 'none';
}
itemThree.onclick = function(){
  answereOne.innerHTML = '3'
  itemOne.style.border = 'none';
  itemTwo.style.border = 'none';
  itemThree.style.border = '5px solid #FFC300';
  itemFour.style.border = 'none';
  itemFive.style.border = 'none';
  itemSix.style.border = 'none';
  slidepitemOne.style.display = 'none';
  slidepitemTwo.style.display = 'none';
  slidepitemThree.style.display = 'block';
  slidepitemFour.style.display = 'none';
  slidepitemFive.style.display = 'none';
  slidepitemSix.style.display = 'none';
  productitemOne.style.display = 'none';
  productitemTwo.style.display = 'none';
  productitemThree.style.display = 'block';
  productitemFour.style.display = 'none';
  productitemFive.style.display = 'none';
  productitemSix.style.display = 'none';
}
itemFour.onclick = function(){
  answereOne.innerHTML = '4'
  itemOne.style.border = 'none';
  itemTwo.style.border = 'none';
  itemThree.style.border = 'none';
  itemFour.style.border = '5px solid #FFC300';
  itemFive.style.border = 'none';
  itemSix.style.border = 'none';
  slidepitemOne.style.display = 'none';
  slidepitemTwo.style.display = 'none';
  slidepitemThree.style.display = 'none';
  slidepitemFour.style.display = 'block';
  slidepitemFive.style.display = 'none';
  slidepitemSix.style.display = 'none';
  productitemOne.style.display = 'none';
  productitemTwo.style.display = 'none';
  productitemThree.style.display = 'none';
  productitemFour.style.display = 'block';
  productitemFive.style.display = 'none';
  productitemSix.style.display = 'none';
}
itemFive.onclick = function(){
  answereOne.innerHTML = '5'
  itemOne.style.border = 'none';
  itemTwo.style.border = 'none';
  itemThree.style.border = 'none';
  itemFour.style.border = 'none';
  itemFive.style.border = '5px solid #FFC300';
  itemSix.style.border = 'none';
  slidepitemOne.style.display = 'none';
  slidepitemTwo.style.display = 'none';
  slidepitemThree.style.display = 'none';
  slidepitemFour.style.display = 'none';
  slidepitemFive.style.display = 'block';
  slidepitemSix.style.display = 'none';
  productitemOne.style.display = 'none';
  productitemTwo.style.display = 'none';
  productitemThree.style.display = 'none';
  productitemFour.style.display = 'none';
  productitemFive.style.display = 'block';
  productitemSix.style.display = 'none';
}
itemSix.onclick = function(){
  answereOne.innerHTML = '6'
  itemOne.style.border = 'none';
  itemTwo.style.border = 'none';
  itemThree.style.border = 'none';
  itemFour.style.border = 'none';
  itemFive.style.border = 'none';
  itemSix.style.border = '5px solid #FFC300';
  slidepitemThree.style.display = 'none'
  slidepitemOne.style.display = 'none';
  productitemOne.style.display = 'none';
  slidepitemTwo.style.display = 'none';
  productitemTwo.style.display = 'none';
  slidepitemOne.style.display = 'none';
  productitemThree.style.display = 'none';
  slidepitemFour.style.display = 'none';
  productitemFour.style.display = 'none';
  slidepitemFive.style.display = 'none';
  productitemFive.style.display = 'none';
  slidepitemSix.style.display = 'block';
  productitemSix.style.display = 'block';
}










