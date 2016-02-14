

$('.album_list').on('change', function() {

    var id_album = this.value;
    alert(id_album);

    if( id_album = "-1" ){
        $(".message_album").removeClass("hidde");
    }
    else{
        $(".message_album").addClass("hidde");

        var response = '';
        $.ajax({ type: "GET",
            url: baseUrl+"choice/photosalbum/"+id_album,
            async: false,
            success : function(text)
            {
                alert();
            }
        });
    }
});






/*

$.ajax({
    url: baseUrl+"/tirage"
}).done(function( data ) {
    alert(data.new) ;
});
    */