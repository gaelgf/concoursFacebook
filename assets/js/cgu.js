
var cgu = false;



$(".validation_cgu").click(function(){
    $(this).addClass("active");
    cgu = true;
});





function validation_cgu(){
    if(!cgu){
        alert("Veuillez accepter les CGU avant de continuer");
    }
    return cgu;
}