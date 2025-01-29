const menuLinks = document.querySelector('#menu-links');
const menuBtn = document.querySelector('#menu-btn');

menuBtn.addEventListener('click', () => {
    if(menuLinks.style.display === "block"){
        menuLinks.style.display = "none";
        menuBtn.classList.remove("menu-hamburguer-preto");
    } else {
        menuLinks.style.display = "block";
        menuBtn.classList.add("menu-hamburguer-preto");
    }
})