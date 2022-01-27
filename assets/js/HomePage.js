let products = document.querySelectorAll('.product>img');
products.forEach(product => {
    product.style.height = product.getBoundingClientRect().width+"px"
});