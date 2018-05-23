function changePassword(){
    old = document.getElementById('oldPass').value;
    newPass = document.getElementById('newPass').value;
    confirmPass = document.getElementById('confirmPass').value;
    if(newPass === confirmPass){
        const params = {"oldPass" : old, "newPass" : newPass};
        callajax(params,"../php/changePassword.php",displayMessage)
    }else{
        display("New password does not match");
    }
}
function displayMessage(phpresponse){
    if(phpresponse == 1){
        //Put password changed successfully
    }else{
        //put phpresponse;
    }
}