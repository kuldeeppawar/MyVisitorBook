<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url();?>themes/assets/global/plugins/jscolor.js" type="text/javascript"></script> 

<script src="<?php echo base_url();?>themes/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url();?>themes/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>themes/assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>themes/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>themes/assets/jquery.gritter.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>themes/assets/pages/scripts/jquery.gritter.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
<script>



window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);



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





         </script>
<!-- div show hide starts here -->
<script>

$( document ).ready(function() {



  $('.hide_element').css('visibility','hidden');
  $('.hide_elementp').css('visibility','hidden');

  $('.selected_rows').hide();

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
 



});

$('.check_box').change(function(){

    if($('.check_box:checked').length==0){

        $('.hide_element').css('visibility','hidden');
        $('.hide_elementp').css('visibility','hidden');

        $('.selected_rows').hide();

    }

    else if($('.check_box:checked').length==1){

    $('.hide_element').css('visibility','visible');
    $('.hide_elementp').css('visibility','visible');

     $('.selected_rows').show();

   }



    else if($('.check_box:checked').length>=1){

     $('.hide_element').css('visibility','hidden');
     $('.hide_elementp').css('visibility','visible');

  $('.selected_rows').show();

    }

    else {

        $('.check_box:checked').each(function(){

            $('#'+$(this).attr('data-ptag')).show();

        });

    }

});

$(function () {

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




    $("#checkall").click(function () {

        if ($("#checkall").is(':checked')) {

            $(".check_box").prop("checked", true);

            $('.hide_element').css('visibility','hidden');
            $('.hide_elementp').css('visibility','visible');
            

             $('.selected_rows').show();
             $('#selectall').text('Clear all');

             var result = countChecked($('#sample_1_2'), '.check_box');

             document.querySelector('#show_checkbox_selected').innerHTML=result.checked_1+'/'+result.total+' row(s) selected';

        } else {

            $(".check_box").prop("checked", false);

             $('.selected_rows').hide();
             
            $('.hide_element').css('visibility','hidden');
            $('.hide_elementp').css('visibility','hidden');

        }

    });

});



$("#selectall").click(function(){
    $('.hide_element').css('visibility','hidden');
   
       if ($("input[type='checkbox']").prop("checked"))
       {
           $(':checkbox').prop('checked', false);

           $(this).text('Select all');

           $('.selected_rows').hide();

           $('.hide_element').css('visibility','hidden');
           $('.hide_elementp').css('visibility','visible');
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

</script>
<!-- ends here -->
<script>



$(document).ready(function(){

$('[data-toggle="tooltip"]').tooltip(); 



});



</script>
<!-- script for div show hide -->
<script src="<?php echo base_url();?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
<!-- div show hide ends here -->
<!-- END THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>