/**
 * Created by Thibault on 06/02/2016.
 */


$(".critere_heart").click( function(){
    var critere = $(this).data("critere");
    var number = $(this).data("number");
    $(".input_critere_".critere).val(number);
    desactiveHeartCritere( critere );
    activeHeartNumber( critere , number );
});



function desactiveHeartCritere( critere ){
    $(".critere_"+critere).removeClass("active");
}



function activeHeartNumber( critere , number ){
    var nb = 1;

    $(".critere_"+critere).each( function(){

        if( nb <= number ){
            $(this).addClass("active");
        }

        nb++;
    });
}