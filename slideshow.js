$("#bg > div:gt(0)").hide();

setInterval(function() {
	$('#bg > div:first')
	.fadeOut(1000)
	.next()
	.fadeIn(1000)
	.end()
	.appendTo('#bg');
}, 3000);
