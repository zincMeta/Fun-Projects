let toggle_desktop_btn = document.querySelector(".toggle_desktop");
let toggle_mobile_btn = document.querySelector(".toggle_mobile");
let toggle_watch_btn = document.querySelector(".toggle_watch");

let Desktop = document.querySelector(".Desktop")
let Mobile = document.querySelector(".Mobile");
let watch = document.querySelector('.watch')

toggle_desktop_btn.onclick = function(){
    
    Desktop.style="display:flex;flex-direction:column;";
    Mobile.style="display:none;";
    watch.style="display:none";
    
    toggle_desktop_btn.style="color:#000;background-color: rgb(210, 240, 244); transition: 0.2s ease-in-out";
    toggle_mobile_btn.style="color:none;background-color:transparent";
    toggle_watch_btn.style="color:none;background-color:transparent";
 }
toggle_mobile_btn.onclick = function(){
    
    Mobile.style="display:flex;flex-direction:column;";
    Desktop.style="display:none;";
    watch.style="display:none;";
    
    toggle_mobile_btn.style="color:#000;background-color: rgb(210, 242, 244); transition: 0.2s ease-in-out";
    toggle_desktop_btn.style="color:none;background-color:transparent";
    toggle_watch_btn.style="color:none;background-color:transparent";
}
toggle_watch_btn.onclick = function(){
    
    watch.style="display:flex;flex-direction:column;";
    Desktop.style="display:none;";
    Mobile.style="display:none;";

    toggle_watch_btn.style="color:#000;background-color: rgb(210, 242, 244); transition: 0.2s ease-in-out"
    toggle_desktop_btn.style="color:inherit;background-color:transparent";
    toggle_mobile_btn.style="color:inherit;background-color:transparent";
}