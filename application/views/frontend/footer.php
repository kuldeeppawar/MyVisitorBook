<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
</div>
<!--[if lt IE 9]>



<script src="<?php echo base_url()?>themes/assets/global/plugins/respond.min.js"></script>



<script src="<?php echo base_url()?>themes/assets/global/plugins/excanvas.min.js"></script> 



<![endif]-->

<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>themes/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url()?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>themes/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url()?>themes/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script>

   jQuery(function($) {

        var panelList = $('#draggablePanelList');



        panelList.sortable({

            
            handle: '.panel-heading1', 

            update: function() {

                $('.panel1', panelList).each(function(index, elem) {

                     var $listItem = $(elem),

                         newIndex = $listItem.index();



                     // Persist the new indices.

                });

            }

        });

    });

	

	

	  

</script>
<script>



$(document).ready(function()
{
	
	$('.hide_element').css('visibility', 'hidden');
	
	$('.selected_rows').hide();
	$('.p_element').css('visibility','hidden');

	$('#sb3').hide();
	
});

$('.check_box').change(function()
{
	if ($('.check_box:checked').length == 0)
	{
		
		$('.hide_element').css('visibility', 'hidden');
		$('.selected_rows').hide();
		$('.p_element').css('visibility','hidden');
    	$('#sb3').hide();
		
	}

	else if ($('.check_box:checked').length == 1)
	{
		
		$('.hide_element').css('visibility', 'visible');
		$('.selected_rows').show();
	    $('.p_element').css('visibility','visible');
	    $('#sb3').show();
		
	}

	else if ($('.check_box:checked').length >= 1)
	{
		
		$('.hide_element').css('visibility', 'hidden');
		$('.selected_rows').show();
		$('.p_element').css('visibility','visible');
		$('#sb3').hide();
			
	}

	else
	{
		 $('.p_element').show();
		$('.check_box:checked').each(function()
		{
			
			$('#' + $(this).attr('data-ptag')).show();
			$('#sb2').hide();
			
		});
		
	}
	
});

$(function()
{
	
	$("#checkall").click(function()
	{
		
		if ($("#checkall").is(':checked'))
		{
			
			$(".check_box").prop("checked", true);
			
			$('.hide_element').css('visibility', 'hidden');
			
			$('.selected_rows').show();
			$('.p_element').css('visibility','visible');
			$('#sb3').hide();
			
		} else
		{
			
			$(".check_box").prop("checked", false);

			$('.selected_rows').hide();
			
			$('.hide_element').css('visibility', 'hidden');
			$('.p_element').css('visibility','hidden');
			$('#sb3').hide();
			
		}
		
	});
	
});

$("#selectall").click(function()
{
	$('.p_element').css('visibility','visible');
	   $('#sb3').hide();
		
	$('.hide_element').css('visibility', 'hidden');
	
	if ($("input[type='checkbox']").prop("checked"))

	{
		
		$(':checkbox').prop('checked', false);
		
		$(this).text('Select all');
		
		$('.selected_rows').hide();
		
		$('.hide_element').css('visibility', 'hidden');
		$('.p_element').css('visibility','hidden');



		$('#sb3').hide();
				
	}

	else
	{
		
		$(':checkbox').prop('checked', true);
		
		$('.selected_rows').show();
		
		$(this).text('Clear all');
		
	}
	
});

jQuery('#growl-primary').click(function(){

	   $("#myModal_m").hide();

	   $(".modal-backdrop").removeClass();

	 jQuery.gritter.add({
					title: 'Successfully Deleted!',
					//text: 'This will fade out after a certain amount of time.',
	                class_name: 'growl-primary',
                //image: 'images/screen.png',
					sticky: false,
					time: ''

							 });
	 return false;
});


jQuery('#growl-primary').click(function(){


					 jQuery.gritter.add({
				
						title: 'Successfully Deleted!',
				
						//text: 'This will fade out after a certain amount of time.',
				
				      class_name: 'growl-primary',
				
				      //image: 'images/screen.png',
				
						sticky: false,
				
						time: ''
				
					 });

   return false;

});


jQuery('#growl-secondary').click(function(){
    $("#myModal_m").hide();

    $(".modal-backdrop").removeClass();

   jQuery.gritter.add({



 title: 'All Rows Are Successfully Cleared!',



 //text: 'This will fade out after a certain amount of time.',



   class_name: 'growl-primary',



   //image: 'images/screen.png',



 sticky: false,



 time: ''



});



return false;



});







$('#checkboxAll').click(function() {

     if ($(this).is(':checked')) {

  

jQuery.gritter.add({



 title: 'All rows selected"',

   class_name: 'growl-primary',



 sticky: false,



 time: ''



});

}



// return false;



});





$('#checkbox1').click(function() {

     if ($(this).is(':checked')) {

  

jQuery.gritter.add({



 title: 'One row selected"',

   class_name: 'growl-primary',



 sticky: false,



 time: ''



});

}





});

</script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>