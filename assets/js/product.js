function search() {
    let search = document.getElementById("searchInput").value;
    window.location.href="index.php?controller=product&task=search&name="+search
}

function goToProduct(id) {
    window.location.href="index.php?controller=product&task=display&id="+id
}