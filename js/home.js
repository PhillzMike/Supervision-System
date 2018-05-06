// Get the modal
var loginmodal = document.getElementById('logging');
var signupmodal = document.getElementById('signup');
// Get the button that opens the modal
var logbtn = document.getElementById('log');
var regbtn = document.getElementById('register');
// Get the <span> element that closes the modal
var logx = document.getElementById("logx");
var regx = document.getElementById("regx");


// When the user clicks the button, open the modal 
logbtn.onclick = function () {
    loginmodal.style.display = "flex";
    loginmodal.style.flexDirection = "column";
    loginmodal.style.justifyContent = "space-around";
    loginmodal.style.alignItems = "center";
}
regbtn.onclick = function () {
    signupmodal.style.display = "flex";
    signupmodal.style.flexDirection = "column";
    signupmodal.style.justifyContent = "space-around";
    signupmodal.style.alignItems = "center";
}
// When the user clicks on <span> (x), close the modal
logx.onclick = function () {
    loginmodal.style.display = "none";
}
regx.onclick = function () {
    signupmodal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == loginmodal | event.target == signupmodal) {
        loginmodal.style.display = "none";
        signupmodal.style.display = "none";
    }
}
var dropdownlbl = document.getElementById('stu-drop');
var dropdown = document.getElementById('drop');
dropdownlbl.onmouseover = function () {
    content.style.display = "";
    dropdownlbl.focus();
}
dropdown.onmouseleave = function () {
    dropdownlbl.blur();
}
var studentform = document.getElementById('student-form');
var supervisorform = document.getElementById('super-form');
var studentbutton = document.getElementById('stu-a');
var superbutton = document.getElementById('sup-a');
var content = document.getElementById('dropdown-content');
studentbutton.onmouseover = function () {
    dropdownlbl.value = "Student";
    dropdownlbl.setAttribute('value', dropdownlbl.value);

    studentform.style.display = "block";
    supervisorform.style.display = "none";
}
superbutton.onmouseover = function () {
    dropdownlbl.value = "Supervisor";
    dropdownlbl.setAttribute('value', dropdownlbl.value);
    studentform.style.display = "none";
    supervisorform.style.display = "block";
}
if (dropdownlbl.value == "Student") {
    dropdownlbl.setAttribute('value', dropdownlbl.value);
    studentform.style.display = "block";
    supervisorform.style.display = "none";
} else if (dropdownlbl.value == "Supervisor") {
    dropdownlbl.setAttribute('value', dropdownlbl.value);
    studentform.style.display = "none";
    supervisorform.style.display = "block";
}
superbutton.onclick = function () {
    dropdownlbl.blur();
    content.style.display = "none";
    // document.getElementById('dropdown-content').style.display = "";
}
studentbutton.onclick = function () {

    dropdownlbl.blur();
    content.style.display = "none";
}
function displayLoginError(text) {
    document.getElementById('loginerror').innerHTML = text;
    document.getElementById('loginerror').style.display = "block";
}
function displayRegisterError(text) {
    document.getElementById('signuperror').innerHTML = text;
    document.getElementById('signuperror').style.display = "block";
}
var materialTexts = document.getElementsByClassName('float-input');
Array.from(materialTexts).forEach(materialText => {
    materialText.onfocus = function () {
        document.getElementById('signuperror').innerHTML = "";
        document.getElementById('signuperror').style.display = "none";
        document.getElementById('loginerror').innerHTML = "";
        document.getElementById('loginerror').style.display = "none";
    }
});
var loginbutton = document.getElementById('loginbutton');
loginbutton.onclick = function(e){
    e.preventDefault();
    const params = {
        'username' : document.querySelector('#usr').value,
        'password': document.querySelector('#psd').value,
        'submit' : document.querySelector('#loginbutton').value
    }
    callajax(params,'./php/login.php',handleLogin);
}
function handleLogin(phpResponse){
    if(phpResponse['link']){
        location.href = phpResponse['value'];
    }else{
        displayLoginError(phpResponse['value']);
    }
} 
function handleRegister(phpResponse){
    if(phpResponse['link']){
        location.href = phpResponse['value'];
    }else{
        if(phpResponse['errors']){
            
            //TODO
        }
        displayLoginError(phpResponse['value']);
    }
} 
