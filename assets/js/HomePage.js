window.addEventListener('resize', sizeImgs)
sizeImgs();

function sizeImgs(){
    let products = document.querySelectorAll('.product>img');
    products.forEach(product => {
        product.style.height = product.getBoundingClientRect().width+"px"
    });
    products = document.querySelectorAll('.news>img');
    products.forEach(product => {
        console.log(product.getBoundingClientRect().width+"px")
        product.style.height = product.getBoundingClientRect().width+"px"
    });
    products = document.querySelectorAll('.promos>img');
    products.forEach(product => {
        console.log(product.getBoundingClientRect().width+"px")
        product.style.height = product.getBoundingClientRect().width+"px"
    });
}