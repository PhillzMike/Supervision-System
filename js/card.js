
confirmYes = document.getElementById("yesConfirmation");
confirmYes.addEventListener("click", deleteCard);
var cardToBeDeleted;
allAppointmentDetails = []
c = document.getElementsByClassName('button-block');
for(let i = 0;i<c.length;i++){
    c[i].addEventListener("click",removeclick);
}
c = document.getElementsByClassName('card');
for(let i = 0;i<c.length;i++){
    c[i].addEventListener("click",showCard);
}
var remove = document.getElementById("cancel_app");
function fillCard(phpresponse){
    let card = document.getElementById('card');
    card.style.display = "none";
    allAppointmentDetails = Object.assign({},allAppointmentDetails,phpresponse);
    for(let i in phpresponse){
        let newCard = card.cloneNode(true);
        newCard.style.display = "grid";
        newCard.id = i;
        newCard.addEventListener("click", showCard);
        newCard.querySelectorAll('.button-block')[0].addEventListener("click",removeclick);
        newCard.querySelectorAll('.image')[0].src = '../profile/studentImages/' + phpresponse[i]['img_path'];
        newCard.querySelectorAll('.textf')[0].innerHTML = "Name: " + phpresponse[i]['lastname'] + " " + phpresponse[i]['firstname'];
        newCard.querySelectorAll('.textf')[1].innerHTML = "Day: " + phpresponse[i]['Date'];
        newCard.querySelectorAll('.textf')[2].innerHTML = "Time: " + phpresponse[i]['Start Time'] + " - " + phpresponse[i]['End Time'];
        document.getElementById('appointmentCards').appendChild(newCard);
    }
}
function showCard(){
    info = document.getElementById('fullinfo_app');
    let id = this.id
    info.querySelectorAll('.textf')[0].innerHTML = "Name: " + allAppointmentDetails[id]['lastname'] + " " + allAppointmentDetails[id]['firstname'];
    info.querySelectorAll('.textf')[1].innerHTML = "Day: " + allAppointmentDetails[id]['Date'];
    info.querySelectorAll('.textf')[2].innerHTML = "Time: " + allAppointmentDetails[id]['Start Time'] + " - " + allAppointmentDetails[id]['End Time'] ;
    info.querySelectorAll('.textf')[3].innerHTML = "Department: " + allAppointmentDetails[id]['department'];
    info.querySelectorAll('.textf')[4].innerHTML = "Level: " + allAppointmentDetails[id]['level'];
    info.querySelectorAll('.textf')[5].innerHTML = "Message: " + allAppointmentDetails[id]['message'];
    info.style.display = "block";
}
function removeclick() {
    remove.style.display = "block";
    cardToBeDeleted = this.parentNode.parentNode;
}
function deleteCard(){
    console.log(cardToBeDeleted);
    const params = {"id" : cardToBeDeleted.id};
    callajax(params,'../php/deleteCard.php',removeCard)
}
function removeCard(phpresponse){
    if(phpresponse === "1"){
        cardToBeDeleted.style.transform = "scale(0,0)";
        cardToBeDeleted.style.animationDuration = "2s";
        cardToBeDeleted.parentNode.removeChild(cardToBeDeleted);
        remove.style.display = "none";
    }
}