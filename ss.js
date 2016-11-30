function slideSwitch() {
    var $active = $('#bg IMG.stretch');

    if ( $active.length == 0 ) $active = $('#bg IMG:last');

    var $next =  $active.next().length ? $active.next()
        : $('#bg IMG:first');

    $active.addClass('last-stretch');
        
    $next.css({opacity: 0.0})
        .addClass('stretch')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('stretch last-stretch');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});
