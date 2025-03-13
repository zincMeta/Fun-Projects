
let Query = document.querySelector("#Query");
let msg_response = document.querySelector(".Bot_msg");
let user_response = document.querySelector(".User_msg");
let submit = document.querySelector("#submit")
let loading = document.querySelector(".loading");

var msg = document.querySelector(".msg");
var user = document.querySelector(".user_container");

submit.onclick = ()=>{    
    callResponse();
}
Query.addEventListener("keypress", (e)=>{
    if(e.key == "Enter"){
        callResponse();
    }
})

function callResponse(){
    
    const data = JSON.stringify({
        messages: [
            {
                role: 'user',
                content: Query.value,
            }
        ],
        web_access: false
    });

    user.style.display = "flex"
    user_response.innerHTML = Query.value;
    loading.style.display ="flex";
    msg.style.display ="none";
    
    window.scrollTo(0, document.body.scrollHeight);

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === this.DONE) {
            
            loading.style.display ="none";

            msg.style.display ="flex";
            user.style.display ="flex"; 
            
            msg_res = JSON.parse(this.responseText);
            msg_response.innerHTML = msg_res.result;

            window.scrollTo(0, document.body.scrollHeight);
                            
        }
    });

    xhr.open('POST', 'https://chatgpt-42.p.rapidapi.com/deepseekai');
    xhr.setRequestHeader('x-rapidapi-key', '33a40efe94msh5a6631a28783b9bp1f1814jsncf9d1e0b47bf');
    xhr.setRequestHeader('x-rapidapi-host', 'chatgpt-42.p.rapidapi.com');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(data);
}
  