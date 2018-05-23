var day = "";
var startArray = [];
var endArray = []
var maxStudentArray = [];
seen = []
document.onload = () => {
    createButton = document.getElementById("cr1");
    createButton.addEventListener("click", addTime);
};
document.getElementById('cr1').onclick = function (e) {
    e.preventDefault();
    addTime();
}
function checkValidity(){
    let start = document.getElementsByClassName('startTime');
    let end = document.getElementsByClassName('endTime');
    for(let i = 0; i<start.length;i++){
        if(end[i].value - start[i].value <= 0){
            console.log(end[i].value);
            console.log(start[i].value);
            return false;
        }
    }
    return true;
}
function showTime(phpresponse){
    if(phpresponse.length > 0){
        for(let i = 0;i<phpresponse.length;i++){
            let time = phpresponse[i]["Start Time"] + " to " + phpresponse[i]["End Time"];
            if(phpresponse[i]["Day"] in seen){
                seen[phpresponse[i]["Day"]][1].push(time);
                seen[phpresponse[i]["Day"]][0].push(phpresponse[i]["maxStudent"]);
            }else{
                day = phpresponse[i]["Day"].toString();
                let maxStudent = phpresponse[i]["maxStudent"];
                seen[day] = [];
                seen[day][0] = []
                seen[day][0].push(maxStudent);
                seen[day][1] = []
                seen[day][1].push(time);
                
            }
        }
        let table = document.getElementById('timetable');
        let adjust = document.getElementsByClassName('adjust')[0];
        for(let key in seen){  
        let newGuy = adjust.cloneNode(true);
            let row = table.insertRow(1);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);
            cell1.innerHTML = key;
            let time = "<div>" + seen[key][1][0] + "</div>";
            let max = "<div>" + seen[key][0][0] + "</div>";
            for(let i = 1;i<seen[key][0].length;i++){
                time += "<div>" + seen[key][1][i] + "</div>";
                max += "<div>" + seen[key][0][i] + "</div>";
            }
            cell2.innerHTML = time;
            cell3.innerHTML = max;
            cell4.appendChild(newGuy);
        }
    }
    
}
function addTime(){
    if(checkValidity()){
        console.log("yea");
        day = document.getElementById('day').value;
        
        start = document.getElementsByClassName('startTime');
        end = document.getElementsByClassName('endTime');
        maxStudent = document.getElementsByClassName('maxStudent');
        for(let i = 0;i<start.length;i++){
            startArray[i + ""] = start[i].value;
            endArray[i + ""] = end[i].value;
            maxStudentArray[i + ""] = maxStudent[i].value;
        }
        
        console.log(startArray);
        const params = {"day": day, "startTime":JSON.stringify(startArray),"endTime":JSON.stringify(endArray),"maxStudent":JSON.stringify(maxStudentArray)};
        callajax(params,'../php/addTime.php',doNothing);
        addToTable();
    }
}
function doNothing(phpresponse){

}
function addToTable(){
    let  table = document.getElementById('timetable');
    let time = "";
    let max = "";
    for(let i = 0;i<startArray.length;i++){
        time += "<div>" + startArray[i] + " to " + endArray[i] + "</div>";
        max += "<div>" + maxStudentArray[i] + "</div>";
    }
    found = false;
    for(let j = 0;j<table.rows.length;j++){
            if(table.rows[j].cells[0].innerHTML  == day){
                found = true;
                table.rows[j].cells[1].innerHTML += time;
                table.rows[j].cells[2].innerHTML += max;
            }
    }
    if(!found){
        let adjust = document.getElementsByClassName('adjust')[0];
        let newGuy = adjust.cloneNode(true);
        let row = table.insertRow(1);
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        cell1.innerHTML = day;
        cell2.innerHTML = time;
        cell3.innerHTML = max;
        cell4.appendChild(newGuy);
        document.getElementById('createapp').style.display = "none";
    }
    
}