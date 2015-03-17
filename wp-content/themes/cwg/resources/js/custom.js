jQuery(document).ready(function($){
	
	// heart+ JS Action
	$('img.port-item-heart').on('click', 
		function heartPlus(){
			var child_id = $( this ).attr( "childId" );
			var ele = '.count_' + child_id;
			$(ele).html("updating...");
			/*$.post("/wp-content/themes/cwg/includes/heartPlus.php", {childId : child_id},
		        function(data,status){
		            $(ele).html(data);
		        }
	        );*/

			var request = $.ajax(
				{
				  url: "/wp-content/themes/cwg/functions.php",
				  type : "POST",
				  data: {action : 'heartPlusAction',{childId : child_id },
				  dataType: "html",
				  success : function(data,status){
					  		    $(ele).html(data);
							}
				}
		    );
			 
			request.done(function( msg ) {
				alert(msg);
			});
			 
			request.fail(function( jqXHR, textStatus ) {
			  alert( "Request failed: " + textStatus );
			});
		}
	);
	//for the sliding effect of the chevron
	$('#chevron-holder').on('click', function () {
		if( $('#site-navigation').is(":visible") ){
			$('#site-navigation').toggle( "fast");
		    
		    $('#menu-holder').toggleClass('col-md-7 col-md-1');
		    $('#menu-holder').toggleClass('col-sm-8 col-sm-1');
		    $('#menu-holder').toggleClass('col-xs-8 col-xs-1');
		    
		    $('#chevron-holder').toggleClass('col-md-2 col-md-8');
		    $('#chevron-holder').toggleClass('col-sm-4 col-sm-11');
		    $('#chevron-holder').toggleClass('col-xs-4 col-xs-11');
		    
		    $('#revealSection').toggle('fast');
		    $('#trigSection').toggle('fast');
		    $('#chevron-img').attr('src','http://cwg.cookwheelwright.com/wp-content/themes/cwg/resources/images/chevron-angle-right.jpg');
		}
		
		if( $('#site-navigation').is(":visible")==false ){
			$('#revealSection').toggle(10);
		    
		    $('#chevron-holder').toggleClass('col-md-2 col-md-8');
		    $('#chevron-holder').toggleClass('col-sm-4 col-sm-11');
		    $('#chevron-holder').toggleClass('col-xs-4 col-xs-11');
		    
		    $('#menu-holder').toggleClass('col-md-7 col-md-1');
			$('#menu-holder').toggleClass('col-sm-8 col-sm-1');
			$('#menu-holder').toggleClass('col-xs-8 col-xs-1');
			
			$('#chevron-img').attr('src','http://cwg.cookwheelwright.com/wp-content/themes/cwg/resources/images/chevron-angle.jpg');
		    $('#trigSection').toggle('fast');
		    setTimeout(function() {
			      $('#site-navigation').toggle( "fast");
			}, 300);
		}
		
	});
	//menu sliding ends here
	
	//script for Theme Options
	//for image 1
	jQuery('#upload_image1_button').click(function() {
		formfield = jQuery('#cwg_home_fullwidth_image1').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_fullwidth_image1').val(imgurl);
			tb_remove();
		}
		return false;
	});
	 
	
	
	//for image 2
	jQuery('#upload_image2_button').click(function() {
		formfield = jQuery('#cwg_home_fullwidth_image2').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_fullwidth_image2').val(imgurl);
			tb_remove();
		}
		return false;
	});

	//Split section image 1
	jQuery('#upload_split_image1').click(function() {
		formfield = jQuery('#cwg_home_split-section_image1_link').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_split-section_image1_link').val(imgurl);
			tb_remove();
		}
		return false;
	});
	
	//Split section image 2
	jQuery('#upload_split_image2').click(function() {
		formfield = jQuery('#cwg_home_split-section_image2_link').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_split-section_image2_link').val(imgurl);
			tb_remove();
		}
		return false;
	});
	 
	
	//Split section left logo
	jQuery('#upload_split_logo').click(function() {
		formfield = jQuery('#cwg_home_split-section_logo').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_split-section_logo').val(imgurl);
			tb_remove();
		}
		return false;
	});
	
	//Split section right logo
	jQuery('#upload_split_logo2').click(function() {
		formfield = jQuery('#cwg_home_split-section_logo2').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cwg_home_split-section_logo2').val(imgurl);
			tb_remove();
		}
		return false;
	});
	

	//home page testimonials on hover mechanism
	var items = $('.testimonials-items');
	var index = 0;
	var item = 0 ;
	var speed = 1000;
	var isHovering = 0;
	$('#testimonials-holder').hover( 
		function(){
			loop = function(){
				isHovering = 1;
				var item = $(items[index]);
				item.fadeIn(speed);
				setTimeout(function() {
					if(isHovering==1){
						item.fadeOut(speed, 
							function() {
								index = index + 1 < items.length ? index + 1 : 0;
								if(isHovering == 1) loop();
								else{
									item = $(items[index]);
									item.fadeIn(50);
								}
							}
						);
					}
				}, speed);
				
			}
			loop();
		}
		,
		function(){
			isHovering = 0;
		}
	);
	
 $("#testimonials-holder").hover(function(){
    $('#hover-text').fadeOut(500, function() {
        $(this).text('First Text!').fadeIn(2000);
        $('#hover-text').fadeOut(500, function() {
        $(this).text('Second Text!').fadeIn(2000);
        $('#hover-text').fadeOut(500, function() {
        $(this).text('Third Text!').fadeIn(2000);
        $('#hover-text').fadeOut(500, function() {
        $(this).text('ideas!').fadeIn(2000);    
        });
        });
        });
        });
 });
	
});


