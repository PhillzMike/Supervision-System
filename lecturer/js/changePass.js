old = document.getElementById('oldpass');
new2 =  document.getElementById('compass');
new1 = document.getElementById('newpass');
function changeP(){
    if(new1.value == new2.value){
        let params = {
            "stu_oldpass":old.value,
            "stu_newpass":new1.value,
            "submit":"yeah"
        };
        callajax(params,'../php/changePassword.php',Out);
    }else{
        Out({"value":"Password mismatch","success":false});
    }
}
function Out($output){
    alert($output['value']);
    if($output['success'] ){
        location.href = "./passwordlect.php";
    }
}