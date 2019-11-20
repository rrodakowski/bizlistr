$(document).ready(function(){
    $('.toggle').click(function(){
        idToggle = $(this).attr('href');
        $(idToggle).toggleClass('hide');
        return false;
    });
});

