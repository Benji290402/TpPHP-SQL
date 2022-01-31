let totop = document.getElementById("toTop");

window.addEventListener('resize', sizeImgs)
sizeImgs();
window.addEventListener('scroll', displayToTop)
displayToTop();

function sizeImgs(){
    let products = document.querySelectorAll('*[onclick] img');
    products.forEach(product => {
        product.style.height = product.getBoundingClientRect().width+"px"
    });
    products = document.querySelectorAll('#product img');
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
    // window.scrollTo(0,0);
    scrollToY(0,100, 'easeInOutQuint');
}

function redirect(link){
    window.location.href = "index.php?"+link;
}
