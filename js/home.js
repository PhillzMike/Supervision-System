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
window.onclick = function (event){
    if (event.target == loginmodal | event.target == signupmodal) {
        loginmodal.style.display = "none";
        signupmodal.style.display = "none";
    }
}
//Student Supervisor Dropdown in register
var dropdownlbl = document.getElementById('stu-drop');
var dropdown = document.getElementById('drop');
dropdownlbl.onmouseover = function () {
    content.style.display = "";
    dropdownlbl.focus();
}
dropdown.onmouseleave = function () {
    dropdownlbl.blur();
}
//Gets student and supervisor forms
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
}
studentbutton.onclick = function () {

    dropdownlbl.blur();
    content.style.display = "none";
}




//Errors
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





//Log in
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
function getFileExtension(filename) {
    return filename.split('.').pop();
}
var userrole
//Register/ Sign up
var signbutton = document.getElementById('signup-button');
signbutton.onclick = function(e){
    e.preventDefault();
   userrole = dropdownlbl.value;
   let params;
    if (userrole == "Student") {
        if(document.querySelector('#stu_pass1').value != document.querySelector('#stu_pass2').value){
        handleRegister({'link':false,'value':'Password mismatch','errors':['#stu_pass1','#stu_pass2']});
        return;
    }
        let imageX = document.getElementById('fileUpload');
        let xten = "";
        if(imageX.files.length>0){
          xten = getFileExtension(imageX.files[0].name).toLowerCase();
        }
        
         params = {
            'role': userrole.toLowerCase(),
            'id':document.querySelector('#stu_matric').value,
            'fname':document.querySelector('#stu_fname').value,
            'mname':document.querySelector('#stu_mname').value,
            'lname':document.querySelector('#stu_lname').value,
            'institute':document.querySelector('#stu_institute').value,
            'email':document.querySelector('#stu_email').value,
            'img':document.querySelector('#stu_matric').value+"."+xten,
            'password':document.querySelector('#stu_pass1').value,
            'submit' : document.querySelector('#signup-button').value,
       
       
            'dept':document.querySelector('#stu_dept').value,
            'level':document.querySelector('#stu_level').value
        }
    } else if (userrole == "Supervisor") {
        if(document.querySelector('#sup_pass1').value != document.querySelector('#sup_pass2').value){
            handleRegister({'link':false,'value':'Password mismatch','errors':['#sup_pass1','#sup_pass2']});
            return;
        }
         params = {
            'role':userrole.toLowerCase(),
            'id':document.querySelector('#staff_id').value,
            'fname':document.querySelector('#sup_fname').value,
            'mname':document.querySelector('#sup_mname').value,
            'lname':document.querySelector('#sup_lname').value,
            'institute':document.querySelector('#sup_institute').value,
            'email':document.querySelector('#sup_email').value,
            'password':document.querySelector('#sup_pass1').value,
            'submit' : document.querySelector('#signup-button').value,
       

            'pno':document.querySelector('#sup_phonenumber').value,
            'title':document.querySelector('#sup_title').value
        }
    }
   
    callajax(params,'./php/signup.php',handleRegister);
}
function handleRegister(phpResponse){
    if(phpResponse['link']){
        if(userrole == 'Student'){
            let imgbtn = document.getElementById('picturebutton');
            let checksize = document.getElementById('fileUpload');
            if(checksize.files.length==0){
                displayRegisterError('No Image selected');
            }else{
            imgbtn.click();
            }
        }else{
            location.href = phpResponse['value'];
        }
    }else{
        if(phpResponse['errors']){
            
            //TODO
        }
        displayRegisterError(phpResponse['value']);
    }
} 
//when the user starts typing on a tooltip
var tool = document.getElementById("usr");
usr.onclick = function(e){
    var tooltip = document.getElementById("tooltip");
    tooltip.style.display = "none";
}

