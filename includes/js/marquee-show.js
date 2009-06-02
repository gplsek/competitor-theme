jQuery.noConflict();
function slideShow() {

	//Set the opacity of all images to 0
	jQuery('#rotate a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	jQuery('#rotate a:first').css({opacity: 1.0});
	//Set the caption background to semi-transparent


	//Resize the width of the caption according to the image width
	jQuery('#rotate .caption').css({width: jQuery('#rotate a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it (0.7 for made the text semitransparent)
	jQuery('#rotate .content').html(jQuery('#rotate a:first').find('img').attr('rel'))
	.animate({opacity: 1.0}, 400);
	
	//Call the rotate function to run the slideshow, 6000 = change to next image after 6 seconds
	//setInterval('rotate("x")',6000); This show the images each 6 seconds
	
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
	/*jQuery('#maqnav a').removeClass('border');
	document.getElementById('#'+next.attr('id')).className='border';*/
	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);


	
	
	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	//jQuery('#rotate .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '100px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	//jQuery('#rotate .caption').animate({opacity: 1.0},100 ).animate({height: '100px'},1 );
	//jQuery('#rotate .caption .content').css('opacity','1.0');
	//Display the content
	//jQuery('#rotate .content').html(caption);
	
	
	jQuery('#rotate .caption').hide();
	jQuery('#rotate .caption').slideDown('slow');
	
	jQuery('#rotate .caption .content').css('opacity','1.0');
	//Display the content
	jQuery('#rotate .content').html(caption);

	
	
	jQuery('#maqnav a').removeClass('border');
	document.getElementById('#'+next.attr('id')).className='border';
}


jQuery(document).ready(function() {
  var interv=setInterval('rotate("x")',6000);
  // some code here

});