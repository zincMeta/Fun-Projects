const header = document.querySelector("header");

window.onscroll = ()=>{
    if(window.scrollY > 20){
        header.classList.add("sticky")    
    }else{
        header.classList.remove("sticky")  
    }
}


let nav_open_close = document.getElementById("open_close_btn")

let menubar = document.querySelector("nav")

nav_open_close.onclick = ()=>{

    if(nav_open_close.classList.contains("bi-x")){
            
        menubar.classList.remove('nav_active');
        nav_open_close.classList.replace("bi-x","bi-list")

    }else{
            
        menubar.classList.add('nav_active');
        nav_open_close.classList.replace("bi-list","bi-x")
    }
}

const close_btn = document.getElementsByClassName("close_btn")[0];
const link_unavailable = document.getElementsByClassName("link_unavailable")[0];

if(link_unavailable !== undefined){
  
    close_btn.addEventListener("click",()=>{
        link_unavailable.style.display="none"
    })
    
}

let resolution = document.querySelectorAll(".resolution");

resolution.forEach(downloading => {

   let download_text = downloading.innerHTML;

    downloading.onclick = ()=>{
        downloading.classList.add("downloading");
        downloading.innerHTML = "Downloading <div class='spinner_download'></div>";
  
        setTimeout(() => {
            downloading.classList.remove("downloading");
            downloading.innerHTML = download_text;
        }, 20000);
    }
    
});


let loading = document.getElementById("loading");
let notification = document.querySelector(".notice")
let submit_btn = document.getElementsByClassName("submit_btn")[0];
let link_url = document.getElementsByClassName("link_url")[0];
const result = document.getElementById("display")

submit_btn.onmouseover = ()=>{
    submit_btn.classList.add("hover_btn");
    link_url.classList.add("hover_input");
}

submit_btn.onmouseleave = ()=>{
    submit_btn.classList.remove("hover_btn");
    link_url.classList.remove("hover_input");
}

submit_btn.onclick = ()=>{ 
    notification.innerHTML = "Loading <div class='spinner'></div>";
    notification.classList.add("notice_active");
    result.style="display:none";
}

window.onload = ()=>{
    notification.innerHTML =""
    notification.classList.remove("notice_active");
}


let steps = document.querySelectorAll(".step_container");
let indicator_step = document.getElementsByClassName("indicator_step")[0]

const step_prev = document.getElementsByClassName("step_prev")[0];
const step_next = document.getElementsByClassName("step_next")[0];

let i = 0

step_next.addEventListener("click", ()=>{

    if( i < steps.length - 1 ){
            
           i++

           if(i == 0){
                steps[i].style.display = "flex"
                steps[1].style.display = "none"
                steps[2].style.display = "none"
                indicator_step.innerHTML = "ONE"
                i=1
           }
           
           if(i == 1){
                steps[i].style.display = "flex"
                steps[0].style.display = "none"
                steps[2].style.display = "none"
                indicator_step.innerHTML = "TWO"
                i=1
            }
             
            if(i == 2){
                steps[i].style.display = "flex"
                steps[0].style.display = "none"
                steps[1].style.display = "none"
                indicator_step.innerHTML = "THREE"
                i=2
            }
    }

})

step_prev.addEventListener("click", ()=>{

    if( 0 < i ){

       i--

       if(i == 0){
            steps[i].style.display = "flex"
            steps[1].style.display = "none"
            steps[2].style.display = "none"
            indicator_step.innerHTML = "ONE"
            i=0
       }
       
       if(i == 1){
            steps[i].style.display = "flex"
            steps[0].style.display = "none"
            steps[2].style.display = "none"
            indicator_step.innerHTML = "TWO"
            i=1
        }
        
       if(i == 2){
            steps[i].style.display = "flex"
            steps[0].style.display = "none"
            steps[1].style.display = "none"
            indicator_step.innerHTML = "THREE"
            i=2
        }
}

})



