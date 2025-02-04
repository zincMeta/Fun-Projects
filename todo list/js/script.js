document.querySelector("#push").onclick = function(){
    if(document.querySelector('#newtask input').value.length == 0){

        let alert_msg = document.querySelector(".alert");
        let alert_close_btn = document.getElementById("close_btn");

        alert_msg.classList.add("alert_open");

        alert_close_btn.onclick= ()=>{
            alert_msg.classList.remove("alert_open");
        }
    }
    else{
        document.querySelector("#tasks").innerHTML
        += `
             <div class="task">
                    <span id="taskname">
                        ${document.querySelector("#newtask input").value}
                    </span>
                    <button class="delete">
                        <i class="bi-trash"></i>
                    </button>
             </div>
           `;
            // Remove todos
            let current_tasks = document.querySelectorAll(".delete");
            for(let i=0; i<current_tasks.length; i++){
               current_tasks[i].onclick = function(){   
                this.parentNode.remove(); 
               }
           }
        //  Underline todos
        let tasks = document.querySelectorAll(".task  ");
            for(let i=0; i<tasks.length; i++){
               tasks[i].onclick = function(){   
                this.classList.toggle("completed")
               }
           }
        // clear input field
           document.querySelector("#newtask input").value ="";

    }
}
 