
function Del(index){
    callajax({'id':index}, '../php/abort.php',Reload);
    Remove(index);
}
function Sory(){
    let table = document.getElementById('tableBody');
    
    s = document.getElementsByClassName("badge")[0];
    count = table.rows.length;
}

function Remove(id){
    let table = document.getElementById('tableBody');
    row = document.getElementById(id).parentNode.parentNode;
    table.removeChild(row);
    let badge = document.getElementsByClassName('badge')[0];
    badge.innerHTML = table.rows.length;
    localStorage.setItem("count",table.rows.length);
}
function GetNotifyNo(){
    return count;
}
function Reload(gdf){
    //location.href('./notice.php');
}