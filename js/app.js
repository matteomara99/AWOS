setInterval(showTime, 1000);
function showTime() {
    let time = new Date();
    let utc = new Date(time.getTime() + time.getTimezoneOffset() * 60000);
    let hour = utc.getHours();
    let min = utc.getMinutes();
    let sec = utc.getSeconds();
 
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
 
    let currentTime = hour + ":" + min + ":" + sec + " UTC";
 
    document.getElementById("clock").innerHTML = currentTime;
}
showTime();

function rwyOcc() {
    if(occupied == 0){
        document.getElementById("runway").style.backgroundColor = "red";
        occupied = 1;
    }else{
        document.getElementById("runway").style.backgroundColor = "grey";
        occupied = 0;
    }
}