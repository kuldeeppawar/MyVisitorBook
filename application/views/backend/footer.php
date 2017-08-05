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
<!--<script src="<?php echo base_url()?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>-->
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
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>


<script src="<?php echo base_url();?>themes/assets/global/plugins/jscolor.js" type="text/javascript"></script> 

<!-- BEGIN THEME GLOBAL SCRIPTS -->

<script src="<?php echo base_url();?>themes/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

<?php

$get_module_name=$this->uri->segment(2);

if($get_module_name!='reminder_management')
{
?>
      <script src="<?php echo base_url();?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script>
<?php	
}
?>

<script src="<?php echo base_url();?>themes/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>themes/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url()?>themes/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url()?>themes/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>

	<script src="<?php echo base_url()?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>themes/assets/pages/scripts/form-fileupload.min.js" type="text/javascript"></script>
<script>



window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);


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
     
		          





		  
	
	$('.make-switch').bootstrapSwitch('state', true);
	$('.make-switch').on('switchChange.bootstrapSwitch', function (event, state) {

		var switchState= state;
		var switchName=this.name;   
		if(switchState==true)    
		{
			$("#"+switchName).prop("checked", true);
			//getConfirmfestival();

			}
		else
			{
				if ($("#"+switchName).is(':checked'))
				{
				   $("#"+switchName).prop("checked", false);
				   //getConfirmfestival();
				}
			}
	 	
	});

	$('.hide_element').css('visibility', 'hidden');
	
	$('.selected_rows').hide();
	$('.p_element').css('visibility','hidden');
	 $('.p_element1').css('visibility','hidden');
	 $('.p_elementd').css('visibility','hidden');
	 

	$('#sb3').hide();
	$('#sb2').hide();


	$("#auto_pwd").click(function(){

	    $(".automatic").show();

	    var auto_generate_pass=randomString(); 

	    $("#lblAutopassword").html(auto_generate_pass);

	    $("#txtAutopassword").val(auto_generate_pass);

	   $(".manual").hide();

	   document.getElementById("txtPassword").required = false;

	   document.getElementById("txtConfirmpassword").required = false;

		

	});



	$("#manual_pwd").click(function(){

	    $(".manual").show();

	    $("#txtAutopassword").val('');

	    $(".automatic").hide();

	    document.getElementById("txtPassword").required = true;

	     document.getElementById("txtConfirmpassword").required = true;

	});

	


	
	
});




$('.check_box').change(function()
{
	if ($('.check_box:checked').length == 0)
	{
		
		$('.hide_element').css('visibility', 'hidden');
		$('.selected_rows').hide();
		$('.p_element').css('visibility','hidden');
		$('.p_element1').css('visibility','hidden');
		 $('.p_elementd').css('visibility','hidden');
    	$('#sb3').hide();
    	$('#sb2').hide();
		
	}

	else if ($('.check_box:checked').length == 1)
	{
		
		$('.hide_element').css('visibility', 'visible');
		$('.selected_rows').show();
	    $('.p_element').css('visibility','visible');
	    $('.p_element1').css('visibility','visible');
	    $('.p_elementd').css('visibility','visible');
	    $('#sb3').show();
	    $('#sb2').show();
	}

	else if ($('.check_box:checked').length >= 1)
	{
		
		$('.hide_element').css('visibility', 'hidden');
		$('.selected_rows').show();
		$('.p_element').css('visibility','hidden');
		 $('.p_element1').css('visibility','visible');
		  $('.p_elementd').css('visibility','visible');
		$('#sb3').hide();
		$('#sb2').hide();
			
	}

	else
	{
		 $('.p_element').show();
		$('.check_box:checked').each(function()
		{
			
			$('#' + $(this).attr('data-ptag')).show();
			$('#sb2').hide();
			$('#sb2').hide();
			
		});
		
	}
	
});

$(function()
{
	var countChecked = function($table, checkboxClass) 
	{
	              if($table) 
	              {
	                    // Find all elements with given class
	                    var chkAll = $table.find(checkboxClass);
	                    // Count checked checkboxes
	                    var checked = chkAll.filter(':checked').length;
	                    // Count total
	                    var total = chkAll.length;    
	                    // Return an object with total and checked values
	                    return {
	                      total: total,
	                      checked_1: checked
	                    }
	              }
	}	


	$(".check_box").change(function ()
	{          
	                var result = countChecked($('#sample_1_2'), '.check_box');

	                document.querySelector('#show_checkbox_selected').innerHTML=result.checked_1+'/'+result.total+' row(s) selected';
	});





	$("#checkall").click(function()
	{
		
		if ($("#checkall").is(':checked'))
		{
			
			$(".check_box").prop("checked", true);
			
			$('.hide_element').css('visibility', 'hidden');
			
			$('.selected_rows').show();
			$('.p_element').css('visibility','hidden');
			$('.p_element1').css('visibility','visible');
			  $('.p_elementd').css('visibility','visible');
			$('#sb3').hide();
			$('#sb2').hide();

			var result = countChecked($('#sample_1_2'), '.check_box');

             document.querySelector('#show_checkbox_selected').innerHTML=result.checked_1+'/'+result.total+' row(s) selected';
			
		} else
		{
			
			$(".check_box").prop("checked", false);

			if($(".check_box").is(':disabled') )
			{
				
				$(".chkdisable").prop("checked", true);
			}
		
			$('.selected_rows').hide();
			
			$('.hide_element').css('visibility', 'hidden');
			$('.p_element').css('visibility','hidden');
			$('.p_element1').css('visibility','hidden');
			  $('.p_elementd').css('visibility','hidden');
			$('#sb3').hide();
			$('#sb2').hide();
			
		}
		
	});
	
});

$("#selectall").click(function()
{
	$('.p_element').css('visibility','hidden');
	$('.p_element1').css('visibility','visible');
	$('.p_elementd').css('visibility','visible');
	   $('#sb3').hide();
	   $('#sb2').hide();
		
	$('.hide_element').css('visibility', 'hidden');
	
	if ($("input[type='checkbox']").prop("checked"))

	{
		
		$(':checkbox').prop('checked', false);
		if($(".check_box").is(':disabled') )
		{
		  $(".chkdisable").prop("checked", true);
		}
		
		$(this).text('Select all');
		
		$('.selected_rows').hide();
		
		$('.hide_element').css('visibility', 'hidden');
		$('.p_element').css('visibility','hidden');

		$('.p_element1').css('visibility','hidden');
		$('.p_elementd').css('visibility','hidden');

		$('#sb3').hide();
		$('#sb2').hide();
				
	}

	else
	{
		
		$(':checkbox').prop('checked', true);
		
		$('.selected_rows').show();
		
		$(this).text('Clear all');
		
	}

	var result = countChecked($('#sample_1_2'), '.check_box');

     document.querySelector('#show_checkbox_selected').innerHTML=result.checked_1+'/'+result.total+' row(s) selected';
	
	
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


function randomString() 
{
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
  var string_length = 10;
  var randomstring = '';
  for (var i=0; i<string_length; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomstring += chars.substring(rnum,rnum+1);
  }
  return randomstring;
}





</script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>