var hamburger = $('.hamburger')
	
hamburger.click(function() {
	$( ".toggle div:nth-child(1)" ).toggleClass('close-first');
	$( ".toggle div:nth-child(2)" ).toggleClass('close-middle');
	$( ".toggle div:nth-child(3)" ).toggleClass('close-last');
	$( ".main_nav" ).toggle('slide', { direction: 'right' }, 500);
	$( ".left_main_nav" ).slideToggle(500);
	$( ".project-nav" ).toggleClass('project-visible');
	$( ".main_nav ul li" ).toggleClass('li-visible');
	$( ".main_nav span" ).toggleClass('li-visible');
	$( ".main_nav .btn" ).toggleClass('btn-visible');
});

$(document).ready(function() {
  $('select').niceSelect();
});


var sluiten = $('.close-aanvragen')
sluiten.click(function() {
	$(".aanvragen").addClass('aanvragen-hidden');
});