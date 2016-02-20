

$('.album_list').on('change', function() {

    var id_album = this.value;

    document.location.href= baseUrl+"choice/facebook?a="+id_album;
});

var photo_choisie = false;

$(".photo_choix_fb").click( function(){
    photo_choisie = true;
    $(".url_photo").val($(this).attr("src"));
    $(".id_photo_facebook").val($(this).data("id"));
    deselection_photos();
    $(this).addClass("active");
});

function deselection_photos(){
    $(".photo_choix_fb").removeClass("active");
}


function isPhotoChoisie(){
    if(!photo_choisie){
        alert("Veuillez selectionner une photo avant de continuer");
    }
    return photo_choisie;
}