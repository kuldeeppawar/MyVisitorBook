<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Newsletter Management');?></h3>
                            <ul class="page-breadcrumb ">
                                <li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
                                <li><span><?php getLocalkeyword('Newsletter Management');?>s</span></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--modal-->
                        <!--end modal-->
                        <div class="col-md-12">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <ul class="nav navbar-nav pl0">
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>											</a>
                                                <ul class="dropdown-menu dropdown-menu-default">
                                                    <li><a href="#">All Contacts</a></li>
                                                    <li><a href="#">My Contacts </a></li>
                                                    <li><a href="#">Recently viewed</a></li>
                                                    <li><a href="#">Not updated in 30 Days</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="newsletter" class="modal fade in" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content" style="width: 680px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                    <h2 class="modal-title text-left">														
                                                    <i class="fa fa-send"></i> <?php getLocalkeyword('Send Newsletters');?>										</h2> </div>
                                                <div class="modal-body">
                                                    <div class="portlet-body form">
                                                        <form class="form-horizontal">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class=""><?php getLocalkeyword('Subject');?></label>
                                                                    <input type="text" class=" input-sm form-control " placeholder="" id="txtSubject" name="txtSubject"> </div>
                                                                <div class="form-group last">
                                                                    <textarea name="summernote" class="summernote" id="summernote_1"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" onclick="saveNewsLetter();"><?php getLocalkeyword('Save');?></button>
                                                                    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php                                    if (getAccessRights( 'mvbNmSend'))                                     { ?>
                                        <div class="col-md-5  pull-right">
                                            <div class="pull-right"><!--data-target="#newsletter"-->
                                                <div class="btn-group"> <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal"  class="btn btn-primary show_newsletter_modal" onclick="setStatus();"><?php getLocalkeyword('Send Newsletters');?>	</a> </div>
                                                <!-- modal ends -->
                                            </div>
                                        </div>
                                        <?php                                     }                                     ?>
                                </div>
                                <div class="selected_rows">
                                    <font id="show_checkbox_selected"></font>
                                    <a id="selectall"><?php getLocalkeyword('select all');?>	</a> </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                       <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35px;">
                                                        <input type="checkbox" id="checkall" data-set="" name="all" /> </label>
                                                    </th>
                                                    <th><?php getLocalkeyword('Email Id');?></th>
                                                    <th><?php getLocalkeyword('Subscription Date');?></th>
                                                    <th><?php getLocalkeyword('Unsubscription Date');?></th>
                                                    <th><?php getLocalkeyword('Status');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                for($s=0;$s < count($result);$s ++) 
                                                { 	                    
                                                    $m=$s + 1;
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $m;?>" value="<?php echo $result[$s]->sb_email;?>">
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$s]->sb_email;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$s]->subscribe_date;?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if ($result[$s]->unsubscribe_date == '00/00/0000,12:00 AM')				 
                                                            {													echo '-'; 
                                                            }
                                                            else
                                                            {												echo $result[$s]->unsubscribe_date;
                                                             }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$s]->status;?>
                                                        </td>
                                                    </tr>
                                                    <?php  } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
</div>
<script>
    $(document).ready(function() 
    {
               // $('#summernote_1').summernote();
                $('.summernote').summernote(
                {
                            height: 200, // sets the height of the editor                
                            focus: true // sets focus to the editor element after initialization                             
                });    
    });    

    function setStatus() 
    {
        var count = "<?php echo count($result);?>";
        var sms_temp_id = [];
        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                sms_temp_id.push($("#chk" + i).val());
            }
        }
        if (sms_temp_id.length === 0) 
        {
            alert("Please select subscriber");
        }
        else
        {
              $(".show_newsletter_modal").attr("data-target","#newsletter");  
        }
    }

function saveNewsLetter() 
{
    var count = "<?php echo count($result);?>";
    var sub_id = [];
    for (var i = 1; i <= count; i++) {
        if ($('#chk' + i).is(':checked')) {
            sub_id.push($("#chk" + i).val());
        }
    }
    var subject = document.getElementById('txtSubject').value;
    var description = document.getElementById('summernote_1').value;
    $.post("<?php echo base_url();?>head/newsletter_management/sendNewsLetter", {
        newsletter_id: sub_id,
        subject_txt: subject,
        description: description
    }, function(data) {
        //alert(data);
        $('#newsletter').modal('toggle');
    });
}
</script>