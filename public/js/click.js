document.getElementById("burge-ico").addEventListener("click", function () {
    let burge = document.getElementById("burge");

    if (burge.style.display == "block") {
        burge.setAttribute('style', 'display: none;');
    } else {
        burge.setAttribute('style', 'display: block;');

    }
});


