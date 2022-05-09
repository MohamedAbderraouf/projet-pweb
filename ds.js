const review=[
    {
        id:1,
       
        img:"Annotation 2022-04-19 033215.png",

    },
    {
        id:2,
        img:"Annotation 2022-04-19 033216.png",
    },
    {
        id:3,
        img:"Annotation 2022-04-19 164736.png",
    },
];
const img = document.getElementById("imag_emploi");
const next=document.querySelector(".next-btn");
const prev=document.querySelector(".prev-btn");
 
let currentitem=0;
let n1=0;
let n2=0;
let n3=0;
window.addEventListener("DOMContentLoaded",function(){
    showperson();
});

function showperson(){
const item=review[currentitem];
img.src=item.img;
}

next.addEventListener("click",function(){
    currentitem++;
    if(currentitem >review.length -1){
        currentitem=0;
    }
    showperson();
});
prev.addEventListener("click",function(){
    currentitem--;
    if(currentitem <0){
        currentitem=review.length -1;
    }
    showperson();
});
window.addEventListener("DOMContentLoaded",function(){
    var header=document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY >= 0);
  });
const navtoggle=document.querySelector(".k");
const link=document.querySelector(".navigation");
const login=document.getElementById("login-button");
const exit=document.querySelector(".exit");
const center=document.querySelector(".center");

navtoggle.addEventListener("click",function(){
 if(link.classList.contains("navigation")){
  link.classList.replace("navigation","show-links");
 }
 else{
  link.classList.replace("show-links","navigation");
 }
 
});

login.addEventListener("click",function(){
    if(center.classList.contains("center")){
     center.classList.replace("center","show-center");
    }
    
    
   });
   exit.addEventListener("click",function(){
    
     center.classList.replace("show-center","center");
    
    
   });
   
   const option=document.querySelector(".option");
   option.addEventListener("click",function(){
    const myWindow = window.open();
    
    document.write("<input type='text' class='option'  placeholder='ajouter une option '></input>");
   
    
   });

