
function clickSuper(supId){
    callajax({'id':supId},'php/changeSupId.php',handleOut);
}
function handleOut(parans){
    location.href = './selectime.php';
}
function HandleSet(slot){
var valuestart = slot[1];
var valuestop = slot[2];

     //create date format       
var timeStart = new Date("01/01/2007 " + valuestart);
var timeEnd = new Date("01/01/2007 " + valuestop);

var difference = timeEnd - timeStart;            
var diff_result = new Date(difference);    

var hourDiff = diff_result.getHours()-1;

    var startTime=moment(slot[1], "HH:mm:ss");
    var endTime=moment(slot[2], "HH:mm:ss");
    var duration = moment.duration(endTime.diff(startTime));
    var hours = parseInt(duration.asHours());
    $date;

    $message = "I created an Apointment sir";
    const params = { "day": slot[0], "startTime": slot[1],"endTime": slot[2],"supervisor" : slot[5],"studentID": slot[6]
    , "date":$date , "message": $message};

    callajax(params,'../php/addAppointment.php',diplayResult);
    
}
function displayResult(params){
    alert(params);
}

function returndays(day){
    day = day.toLower();
    if(day=="monday"){
        return 1;
    }else if(day=="tuesday"){
        return 2;
    }
    else if(day=="wednesday"){
        return 3;
    }
    else if(day=="thursday"){
        return 4;
    }
    else if(day=="friday"){
        return 5;
    }
    else if(day=="saturday"){
        return 6;
    }
    else if(day=="sunday"){
        return 7;
    }
}