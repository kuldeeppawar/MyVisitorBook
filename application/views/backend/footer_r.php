</body>
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>


window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);



    jQuery(function ($) {
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading1',
            update: function () {
                $('.panel1', panelList).each(function (index, elem) {
                    var $listItem = $(elem),
                            newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });



</script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 

<!-- END CORE PLUGINS --> 

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS --> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/moment.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script> 

<!-- END PAGE LEVEL PLUGINS --> 

<!-- BEGIN THEME GLOBAL SCRIPTS --> 

<script src="<?php echo base_url(); ?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 

<!-- END THEME GLOBAL SCRIPTS --> 

<!-- BEGIN PAGE LEVEL SCRIPTS --> 

<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script> 

<!-- END PAGE LEVEL SCRIPTS --> 

<!-- BEGIN THEME LAYOUT SCRIPTS --> 

<script src="<?php echo base_url(); ?>themes/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>themes/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

<link href="<?php echo base_url(); ?>themes/assets/jquery.gritter.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/jquery.gritter.min.js" type="text/javascript"></script> 






<!-- div show hide starts here --> 



<!-- ends here --> 


<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script> 


<script src="<?php echo base_url(); ?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
<!-- div show hide ends here --> 



<!-- END THEME LAYOUT SCRIPTS --> 



<!-- END THEME LAYOUT SCRIPTS -->
