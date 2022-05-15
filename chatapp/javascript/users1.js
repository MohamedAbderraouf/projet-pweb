chat_ps=document.querySelector(".chat-ps");
chat_ps.style.left="100%";
chat_ps.style.top="100%";
chat_ps.style.transform="translate(-100%,-100%)";

chatBtn=document.querySelector("#chat");
chatBtn.onclick=() => {
    chat_ps.style.left="67.1%";
    chat_ps.style.top="100%";
    chat_ps.style.transform="translate(-100%,-100%)";
    chat_ps.style.transition="all .5s ease ";
}

cancelBtn=document.querySelector("#cancel");
cancelBtn.onclick=() => {
    chat_ps.style.left="100%";
    chat_ps.style.top="100%";
    chat_ps.style.transform="translate(-100%,-100%)";
    chat_ps.style.transition="all .5s ease ";
}



const searchBar=document.querySelector(".users .search input"),
     searchBtn=document.querySelector(".users .search button "),
     usersList=document.querySelector(".users .users-list ");


searchBtn.onclick=() => {
        searchBar.classList.toggle("active");
        searchBtn.focus();
        searchBtn.classList.toggle("active");
        searchBar.value="";
        }   

        

searchBar.onkeyup=() => {
  
            let searchTerm=searchBar.value;
            if(searchTerm !="")
            {
              searchBar.classList.add("active");
            }else {
              searchBar.classList.remove("active")
            }
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "php/search.php", true);
          xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    usersList.innerHTML= data;
                }
            }
          }
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.send("searchTerm=" + searchTerm);
          }   
        


setInterval(()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "php/users.php", true);
            xhr.onload = ()=>{
              if(xhr.readyState === XMLHttpRequest.DONE){
                  if(xhr.status === 200){
                      let data = xhr.response;
                      if(!searchBar.classList.contains("active")){
                      usersList.innerHTML= data;}
                  }
              }
            }
            xhr.send();
       },500)
       
const form=document.querySelector(".typing-area"),
inputField=form.querySelector(".input-field"),
sendBtn=form.querySelector("button"),
chatbox=document.querySelector(".chat-box");


form.onsubmit = (e)=>{
  e.preventDefault();
}

sendBtn.onclick= ()=>{
  let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            inputField.value=""
            scrolltobottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

chatbox.onmouseenter= ()=>{

  chatbox.classList.add("active");
}


chatbox.onmouseleave= ()=>{

  chatbox.classList.remove("active");
}


setInterval(()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            chatbox.innerHTML= data;
            if(!chatbox.classList.contains("active"))
            {
              scrolltobottom();
            }
          }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);

},500)


function scrolltobottom(){
  chatbox.scrollTop=chatbox.scrollHeight;

}