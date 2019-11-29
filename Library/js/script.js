
function display(element){
    elementDisplaying = getComputedStyle(element, null).display;
    if(elementDisplaying=="none"){
        element.style.display = "flex";
    }else
    if(elementDisplaying=="flex"){
        element.style.display = "none";
    }

}