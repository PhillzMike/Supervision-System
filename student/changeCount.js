ChangeCount();
function ChangeCount(){
    document.getElementsByClassName("badge")[0].innerHTML = localStorage.getItem("count");
}
