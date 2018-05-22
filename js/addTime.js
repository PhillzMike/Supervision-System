var day = "";
var start = "";
var end = ""
var maxStudent = "";
seen = []
document.onload = () => {
    createButton = document.getElementById("cr1");
    createButton.addEventListener("click", addTime);
};
console.log("yea");
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
                seen[phpresponse[i]["Day"]].push(time);
            }else{
                day = phpresponse[i]["Day"].toString();
                let maxStudent = phpresponse[i]["maxStudent"];
                seen[day] = [];
                seen[day][0]= maxStudent;
                seen[day][1] = time;
                
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
            time = "<li>" + seen[key][1] + "</li>";
            for(let i = 2;i<seen[key].length;i++){
                //TODO how to break line;
                time += "<li>" + seen[key][i] + "</li>";
            }
            cell2.innerHTML = time;
            cell3.innerHTML = seen[key][0]
            cell4.appendChild(newGuy);
        }
    }
    
}
function addTime(){
    if(checkValidity()){
        console.log("yea");
        day = document.getElementById('day').value;
        start = document.getElementsByClassName('startTime')[0].value;
        end = document.getElementsByClassName('endTime')[0].value;
        maxStudent = document.getElementById('maxStudent').value;
        const params = {"day": day, "startTime":start,"endTime":end,"maxStudent":maxStudent};
        callajax(params,'../php/addTime.php',doNothing);
        addToTable();
    }
}
function doNothing(phpresponse){

}
function addToTable(){
    
    let table = document.getElementById('timetable');
    let adjust = document.getElementsByClassName('adjust')[0];
    let newGuy = adjust.cloneNode(true);
    let row = table.insertRow(1);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let cell4 = row.insertCell(3);
    console.log("5463");
    cell1.innerHTML = day;
    cell2.innerHTML = start + " to " + end;
    cell3.innerHTML = maxStudent;
    cell4.appendChild(newGuy);
    document.getElementById('createapp').style.display = "none";
}