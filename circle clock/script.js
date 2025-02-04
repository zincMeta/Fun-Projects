setInterval(setClock,1000);

const hourHand = document.querySelector('[data-hour-hand]');
const minuteHand = document.querySelector('[data-minute-hand]');
const secondHand = document.querySelector('[data-second-hand]')

function setClock(){
    const currentDate = new Date();
    const secondsRation = currentDate.getSeconds() / 60
    const minuteRation = (secondsRation + currentDate.getMinutes()) / 60
    const hourRation = (minuteRation + currentDate.getHours()) / 12

    setRotation(hourHand,hourRation);
    setRotation(hourHand,minuteRation);
    setRotation(secondHand,secondsRation);

}

function setRotation(element, rotationRatio){

    setInterval(setClock,1000);

    let hourHand = document.querySelector('[data-hour-hand]');
    let minuteHand = document.querySelector('[data-minute-hand]');
    let secondHand = document.querySelector('[data-second-hand]');
    
    function setClock(){
        let currentDate = new Date();
        let secondsRation = currentDate.getSeconds() / 60
        let minuteRation = (secondsRation + currentDate.getMinutes()) / 60
        let hourRation = (minuteRation + currentDate.getHours() ) / 12
    
        setRotation(secondHand, secondsRation);
        setRotation(hourHand, hourRation);
        setRotation(minuteHand, minuteRation);
    
    
    }
    
    function setRotation(element, rotationRatio){
    
    element.style.setProperty('--rotation', rotationRatio * 360)
    
    }
    setInterval(()=>{
        let weekdays = document.querySelector(".day")
        
        
        let timeDate = new Date();

        let day = timeDate.getDay();
        let hh = timeDate.getHours();
        let mm = timeDate.getMinutes();
        let ss = timeDate.getSeconds();
       

        if(day == 1){
            weekdays.innerHTML = "Monday";
        }else{
            if(day == 2){
                weekdays.innerHTML = "Tuesday";
            }else{
                if(day == 3){
                    weekdays.innerHTML = "Wednesday";
                }else{
                    if(day == 4){
                        weekdays.innerHTML = "Thursday";
                    }else{
                        if(day == 5){
                            weekdays.innerHTML = "Friday";
                        }else{
                            if(day == 6){
                                weekdays.innerHTML = "Saturday";
                            }else{
                                if(day == 0){
                                    weekdays.innerHTML = "Sunday"
                                }
                            }
                        }
                    }
                }
            }
        }

        if(hh >= 12){
            
            document.querySelector('.h').innerHTML =   hh - 12 +  " : "+ "PM"
    
        }else{
            
            document.querySelector('.h').innerHTML ="0" + hh + " : " + "AM" 
    
            if(hh == 0){
                document.querySelector('.h').innerHTML =12 + " : " + "AM" 
            }
    
        }
        if(ss < 10){
            document.querySelector('.s').innerHTML =`${"0" + ss}` 
        }else{
            document.querySelector('.s').innerHTML =ss; 
        }
        document.querySelector('.m').innerHTML =mm 
       
    
    },1000)
    
    // setClock()
    
// element.style.setProperty('--rotation', rotationRatio * 360)

}

