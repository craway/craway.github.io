const get = element => document.getElementById(element);

let open = document.getElementById("menu-btn");
let nav = document.getElementById("nav");
let exit = document.getElementById("exit-btn");

let title = document.getElementsByClassName('a')

open.addEventListener('click', () => {
    nav.classList.add('open-nav');
})

exit.addEventListener('click', () => {
    nav.classList.remove('open-nav');
})
 