const password=document.querySelector(".field.input input[type='password']"),
       showpsBtn=document.querySelector(".field.input .fas.fa-eye")   ;

    
showpsBtn.onclick=()=>{
if(password.type=='password')
{
password.type='text';
showpsBtn.classList.toggle("active");

}else {
    password.type='password';   
    showpsBtn.classList.remove("active");
}

}