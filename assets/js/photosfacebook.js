

$('.album_list').on('change', function() {

    var id_album = this.value;

    document.location.href= baseUrl+"choice/facebook?a="+id_album;
});