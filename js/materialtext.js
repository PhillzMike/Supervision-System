var materialTexts = document.getElementsByClassName('float-input');
Array.from(materialTexts).forEach(materialText => {
    // materialText.onkeyup = function(){
    //     if(materialText.value.trim().length >0 ){
    //         materialText.setAttribute('value',materialText.value);
    //     }else{
    //         materialText.setAttribute('value',"");
    //     }
    // }
    materialText.onblur = function(){
        if(materialText.value.trim().length >0 ){
            materialText.setAttribute('value',materialText.value);
        }else{
            materialText.setAttribute('value',"");
        }
    }
    if(materialText.value.trim().length >0 ){
        materialText.setAttribute('value',materialText.value);
    }else{
        materialText.setAttribute('value',"");
    }
});

