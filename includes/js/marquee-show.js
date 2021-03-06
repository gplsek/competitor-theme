jQuery.noConflict();
jQuery(document).ready(function() {		
	
	//Execute the slideShow
	//slideShow();

});
var interv='';
function slideShow() {
	jQuery('#back_gallery').hide();
	jQuery('#rotate').show();
	jQuery('#rotate-thumbs').show();
	
	
	//Set the opacity of all images to 0
	jQuery('#rotate a').css({opacity: 0.0});
	jQuery('#rotate-thumbs a').css({opacity: 1.0})
	//Get the first image and display it (set it to full opacity)
	jQuery('#rotate a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	//jQuery('#rotate .caption').css({opacity: 1.0});//0.7
	jQuery('#rotate .caption').slideDown(1500);

	//Resize the width of the caption according to the image width
	jQuery('#rotate .caption').css({width: jQuery('#rotate a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	jQuery('#rotate .content').html(jQuery('#rotate a:first').find('img').attr('rel'))
	.animate({opacity: 1.0}, 1000);	//0.7
	
	interv=setInterval('rotate("x")',10000);
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	
}
function changeText(caption){
	//Display the content
	jQuery('#rotate .content').html(caption);
}
function rotate(idd) {
	
	//if no IMGs have the show class, grab the first image
	var current = (jQuery('#rotate a.show')?  jQuery('#rotate a.show') : jQuery('#rotate a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? jQuery('#rotate a:first') :current.next()) : jQuery('#rotate a:first'));	
	
	if(idd!='x'){
		next=jQuery(idd);
		clearInterval(interv);
		//alert (idd);
	}
	jQuery('#rotate-thumbs a').removeClass('border');
	document.getElementById('#'+next.attr('id')).className='border';
	
	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	//$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
//	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	
	
	//jQuery('#rotate-thumbs').hide('slow');
	//jQuery('#rotate-thumbs').slideDown('slow');
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	//var currentcaption = current.find('img').attr('rel');
	//jQuery('#rotate .caption .content').css('opacity','0.0');
	//jQuery('#rotate .caption .content').animate({opacity:0.0},1000);
	
	//jQuery('#rotate .caption').hide(500);
	jQuery('#rotate .caption').slideUp(1, function () {
											jQuery('#rotate .content').html(caption);
											return true;
													   });
	//jQuery('#rotate .caption .content').animate({opacity:0.0},0);
	//currentcaption.animate({opacity: 0.0},1000);
	//jQuery('#rotate .content').html(caption);
	
	//jQuery('#rotate .content').html(caption);
	jQuery('#rotate .caption').slideDown(1);
	//jQuery('#rotate .caption .content').animate({opacity:1.0},1500);
	
}