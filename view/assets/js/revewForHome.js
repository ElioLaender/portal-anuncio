$(window).load(function(){
    $('#revews').cycle({
        next:'#next01',
        prev:'#prev01',
        timeout:5000
    });
});


$(document).ready(function(){
    $('#slide').cycle({
        next:'#next',
        prev:'#prev',
        pager:'#nav',
        timeout: 3000
    });
    //gera bairros dinamicamente.
    $("#revews").html(geraRevewForHome());
});



