let show=document.getElementById('button');
let popup=document.querySelector('.popup');
let close=document.querySelector('.close');

show.addEventListener('click',()=>{
    popup.style.display = "flex";
});
close.addEventListener('click',()=>{
    popup.style.display = "none";
});