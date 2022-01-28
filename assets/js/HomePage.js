let totop = document.getElementById("toTop");

window.addEventListener('resize', sizeImgs)
sizeImgs();
window.addEventListener('scroll', displayToTop)
displayToTop();

function sizeImgs(){
    let products = document.querySelectorAll('.product>img');
    products.forEach(product => {
        product.style.height = product.getBoundingClientRect().width+"px"
    });
    products = document.querySelectorAll('.news>img');
    products.forEach(product => {
        product.style.height = product.getBoundingClientRect().width+"px"
    });
    products = document.querySelectorAll('.promos>img');
    products.forEach(product => {
        product.style.height = product.getBoundingClientRect().width+"px"
    });
}

function displayToTop(){
    if(window.scrollY > 100){
        totop.style.display = "flex";
        totop.classList.add("active");
        totop.style.top = "calc(100vh - 50px - 50px + "+window.scrollY+"px)";
    }else{
        totop.classList.remove("active");
        totop.style.display = "none";
    }
}

function toTop(){
    console.log("le chat");
    window.scrollTo(0,0);
}