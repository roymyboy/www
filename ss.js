function slideSwitch() {
    var $stretch = $('#bg IMG.stretch');

    if ( $stretch.length == 0 ) $stretch = $('#bg IMG:last');

    var $next =  $stretch.next().length ? $stretch.next()
        : $('#bg IMG:first');

    $stretch.addClass('last-stretch');
        
    $next.css({opacity: 0.0})
        .addClass('stretch')
        .animate({opacity: 1.0}, 1000, function() {
            $stretch.removeClass('stretch last-stretch');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});
