function scrollG(id){
    $("html,body").animate({scrollTop: $('#'+id).offset().top}, 1000);
}

$(document).ready(function(){
    $("button").click(function(){
        $("ghl").animate({
            height: '150px', 
            left: '500px',
            opacity: '0.7',
            top: '100px',
            width: '150px'
        }, 1500);
    });
});


