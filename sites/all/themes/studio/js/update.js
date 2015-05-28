jQuery(document).ready(function($) {
	//JS Services
	$('.services_info .border_services:first .item_services:first > h2').text('01');
	$('.services_info .border_services:first .item_services:last > h2').text('02');
	$('.services_info .border_services:last .item_services:first > h2').text('03');
	$('.services_info .border_services:last .item_services:last > h2').text('04');

	//Contact form JS
	$('.modal-body form .form-item input').attr('required', 'required');

	//JS menu
	if ($('.flat-mega-menu ul.collapse').text()) {

	} else {
		$('.flat-mega-menu ul').removeAttr('class');
		$('.flat-mega-menu ul').addClass('collapse');
	}

	$('.flat-mega-menu #mobile-button').change(function() {
        if($(this).is(":checked")) {
            $('.flat-mega-menu ul.collapse').css({
            	display: 'block',
            	background: '#141414',
            	height: 'auto'
            });
        } else {
        	$('.flat-mega-menu ul.collapse').css('display', 'none');
        }
    });
    $('ul.collapse a.404').attr('href', $('ul.collapse a.404').attr('href')+'404');
    $('ul.collapse ul.collapse').addClass('drop-down one-column hover-zoom');
    $('ul.collapse ul.collapse').removeClass('collapse');

    for (var i = 1; i <= $('.flat-mega-menu ul.collapse > li').length; i++) {
		if ($('.flat-mega-menu ul.collapse > li:nth-child('+i+') ul').text()) {
			$('.flat-mega-menu ul.collapse > li:nth-child('+i+') > a').append(' <i class="fa fa-angle-down"></i>');
		}
	};

	for (var i = 1; i <= $('.flat-mega-menu ul.collapse > li').length; i++) {
		if ($('.flat-mega-menu ul.collapse > li:nth-child('+i+') ul').text()) {
			for (var j = 1; j <= $('ul.collapse > li:nth-child('+i+') > ul > li').length; j++) {
				if ($('ul.collapse > li:nth-child('+i+') > ul > li:nth-child('+j+') ul').text()) {
					$('ul.collapse > li:nth-child('+i+') > ul > li:nth-child('+j+') > a').append(' <i class="fa fa-angle-right"></i>');
				}
			};
		}
	};

    //Home style JS
    if ($('#home-style').val() && $('#home-style').val() == "image") {
    	$('section div.opacy').addClass('background-image');
    }
    if ($('section.color.color-light.paddings .container').height() < 5) {
    	$('section.color.color-light.paddings').remove();
    }
    if ($('#title-style').val() && $('#title-style').val() == "center") {
    	$('.row.title > div').removeAttr('class');
    	$('.row.title > div').addClass('col-md-12');
    	$('.row.title').addClass('centered center');
    }

    //Js Blog
    $('section.blogs .row section').removeAttr('class');
    $('section.blogs .row section > .container').removeAttr('class');

});