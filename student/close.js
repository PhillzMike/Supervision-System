function Del(index){
    callajax({'id':index}, '../php/abort.php',Reload);
}

function Reload(gdf){
    location.href('./notice.php');
}