function redirectForm() {
    let form = document.getElementById("formPayement");
    let url = "index.php?controller=cart&task=payement";
    for (let i = 0; i < form.length; i++) {
        url+="&"+form[i].name+"="+form[i].value;
    }
    window.location.href = url;
}