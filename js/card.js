
function fillCard(phpresponse){
    card = document.getElementById('card');
    card.style.display = "none";

    for(i = 0;i<phpresponse.length;i++){
        let newCard = card.cloneNode(true);
        newCard.style.display = "grid";
        newCard.querySelectorAll('.image')[0].src = phpresponse[i]['img_path'];
        newCard.querySelectorAll('.textf')[0].innerHTML = "Name: " + phpresponse[i]['lastname'] + " " + phpresponse[i]['firstname'];
        newCard.querySelectorAll('.textf')[1].innerHTML = "Day: " + phpresponse[i]['Date'];
        newCard.querySelectorAll('.textf')[2].innerHTML = "Time: " + phpresponse[i]['Start Time'] + " - " + phpresponse[i]['End Time'];
        document.getElementById('appointmentCards').appendChild(newCard);
    }
}