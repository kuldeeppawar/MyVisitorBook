<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('FAQ Management');?></h3>
                            <ul class="page-breadcrumb ">
                                <li>
                                    <a href="<?php echo base_url(); ?>head/dashboard">
                                        <?php getLocalkeyword( 'Home');?>
                                    </a> <i class="fa fa-circle"></i>
                                </li>
                                <li><span><?php getLocalkeyword('FAQ Management');?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
                                <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span>  <b class="fa fa-angle-down"></b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if ($this->session->flashdata('success')) { ?>
                        <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php } else if ($this->session->flashdata('error')) { ?>

                        <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php } ?>
                        <!--modal-->
                        <!--end modal-->
                        <div class="col-md-12">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <ul class="nav navbar-nav pl0">
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
											</a>
                                                <ul class="dropdown-menu dropdown-menu-default">
                                                    <li><a href="#">All Contacts</a>
                                                    </li>
                                                    <li><a href="#">My Contacts </a>
                                                    </li>
                                                    <li><a href="#">Recently viewed</a>
                                                    </li>
                                                    <li><a href="#">Not updated in 30 Days</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5  pull-right">
                                        <div class="pull-right">
                                            <div style="float: left; margin-top: 8px; margin-right: 5px;">
                                                <?php if (getAccessRights( 'mvbFaqmEdit')) { ?>
                                                <a href="#" onclick=" get_record('0')" class="margin_rgt hide_element" id="edit1"> <i class="fa fa-pencil-square-o fa-2x" title="edit" style="color: #828282;">
                                                    <?php
																																																												}
																																																												?>

                                                    </i>
                                                </a>
                                            </div>
                                            <?php if (getAccessRights( 'mvbFaqmAdd')) { ?>
                                            <div class="btn-group">
                                                <a id="add_faq" class="btn btn-primary">
                                                    <?php getLocalkeyword( 'Add New FAQ');?>
                                                </a>
                                            </div>
                                            <?php } if (getAccessRights( 'mvbFaqmActive') || getAccessRights( 'mvbFaqmDeactive')) { ?>
                                            <ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
                                                <li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i
														class="fa fa-bars fa-2x" aria-hidden="true"
													></i> </a>
                                                    <?php if (getAccessRights( 'mvbFaqmActive') || getAccessRights( 'mvbFaqmDeactive')) { ?>
                                                    <ul class="dropdown-menu dropdown-menu-default">
                                                        <?php if (getAccessRights( 'mvbFaqmActive')) { ?>
                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;">
                                                            <a href="#" onclick="chechCheckbox(1)" title="Custom Fields" style="padding: 5px; margin-top: 5px;">
                                                                <?php getLocalkeyword( 'Active');?>
                                                            </a>
                                                        </li>
                                                        <?php } if (getAccessRights( 'mvbFaqmDeactive')) { ?>
                                                        <li class="options">
                                                            <a onclick="chechCheckbox(0)" title="Custom Fields" style="padding: 5px; margin-top: 5px;">

                                                                <?php getLocalkeyword( 'Deactive');?>
                                                            </a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                            <?php } ?>

                                            <!-- modal ends -->
                                        </div>
                                    </div>
                                </div>
                                <div class="selected_rows">
                                    <font id="show_checkbox_selected"></font>
                                    <a id="selectall">
                                        <?php getLocalkeyword( 'select all');?>
                                    </a>
                                </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                      <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35px;">
                                                        <input type="checkbox" id="checkall" data-set="" name="all" />
                                                        </label>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Sr. No.');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Question');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Created Date');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Created By');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Last Modified Date');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword( 'Status');?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0;$i < count($result);$i ++) { $j=$i + 1; ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <input name="chk<?php echo $j; ?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j; ?>" value="<?php echo $result[$i]->faq_id_pk; ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo $j; ?>
                                                    </td>
                                                    <td>
                                                        <?php $summary=$result[$i]->faq_question; if (strlen($result[$i]->faq_question) > 40) $summary=substr($result[$i]->faq_question,0,strrpos(substr($result[$i]->faq_question,0,40),' ')) . '...'; if (getAccessRights('mvbFaqmEdit'))
                                                        { ?>
                                                        <a id="que<?php echo $j; ?>" onclick=" get_recordlink(<?php echo $j; ?>)">
                                                            <?php echo $summary; ?>
                                                        </a>
                                                        <?php } else { ?>
                                                        <a onclick=" #">
                                                            <?php echo $summary; ?>
                                                        </a>
                                                        <?php } ?>

                                                    </td>
                                                    <td>
                                                        <?php echo date( "d-m-Y", strtotime($result[$i]->faq_createdDate)); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result[$i]->created_by; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date( "d-m-Y", strtotime($result[$i]->faq_modifiedDate)); ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($result[$i]->faq_status == 1) { ?>

                                                        <span class="label label-sm label-success"> Active </span>
                                                        <?php } else { ?>

                                                        <span class="label label-sm label-danger"> Deactive</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
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
<div class="page-content-wrapper1">
    <form action="<?php echo base_url()."head/faq/addFaq" ?>" id="frmFaq" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
        <div class="user_list_box">
            <div class="row">
                <div class="col-md-4">
                    <div class="portlet light bordered">
                        <div class="portlet-title1">
                            <a style="font-size: 18px; padding: 2px 0px;"> <?php getLocalkeyword( 'Available Question Templates');?> :</a>
                        </div>
                        <div class="portlet-body" style="overflow: auto;">
                            <div id="test-list">
                                <ul class="list list-group All_list">
                                    <?php for($i=0;$i < count($result);$i ++) { $j=$i + 1; ?>
                                    <li class="list-group-item">
                                        <input type="checkbox" class="editclass" onclick="getCheckedrecord('<?php echo $result[$i]->faq_id_pk; ?>', this.id)" id="newChk<?php echo $j ?>" height="20" width="20" value="<?php echo $result[$i]->faq_id_pk; ?>"
                                        />
                                        <?php $summary=$result[$i]->faq_question; if (strlen($result[$i]->faq_question) > 40) $summary=substr($result[$i]->faq_question,0,strrpos(substr($result[$i]->faq_question,0,40),' ')) . '...'; echo $summary?>

                                    </li>
                                    <?php } ?>

                                </ul>
                                <ul class="pagination pull-right"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="" style="margin-bottom: 10px; padding: 10px 0px; margin-left: 12px; margin-right: 12px;">
                            <a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close"><i style="color: #616161; padding-top: 10px;" class="fa fa-times fa-3x"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class=""> <?php getLocalkeyword('Faq Question');?></label>
                                <input type="hidden" name="txtFaqid" id="txtFaqid" value="">
                                <textarea rows="2" cols="" name="txtFaq" id="txtFaq" required="required" class=" input-sm form-control" placeholder=""></textarea>
                            </div>
                            <div class="form-group last">
                                <textarea name="summernote" class="summernote" id="summernote_1" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btnSubmit" class="btn btn-primary"> <?php getLocalkeyword( 'Save');?></button>
                                <a href="" onclick="javascript:location.reload();" class="btn btn-danger"> <?php getLocalkeyword('Cancel');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script>
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('#summernote_1').code());
    }
    var monkeyList = new List('test-list', {

        valueNames: ['name'],

        page: 10,

        plugins: [ListPagination({})]

    });
    $(document).ready(function() {
        $('#summernote_1').summernote();
        $('.summernote').summernote({
            height: 300, // sets the height of the editor 
            focus: true // sets focus to the editor element after initialization
        });

    });

    $(document).ready(function() {

        $(".page-content-wrapper1").hide();

        $("#add_faq,#edit1").click(function() {

            $(".page-content-wrapper").hide();

            $(".page-content-wrapper1").show();

        });

        $("#close").click(function() {

            $(" .page-content-wrapper").show();

            $(".page-content-wrapper1").hide();
            $('#frmFaq').attr('action','<?php echo base_url(); ?>head/faq/addFaq');
            location.reload(true);

        });

    });

    function get_record(id) {

        var count = <?php echo count($result) ?> ;
        var faq;

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                faq = $("#chk" + i).val();

                $.post("<?php echo base_url(); ?>head/faq/getFaq", {
                    faq: faq
                }, function(data) {

                    var arr = JSON.parse(data);

                    $('#txtFaq').val(arr.question);
                    $('#txtFaqid').val(faq);
                    $('.summernote').summernote();
                    $('.summernote').summernote('code', arr.description);
                });

            }
        }

        $('#frmFaq').attr('action','<?php echo base_url(); ?>head/faq/editFaq');

    }

    function get_recordlink(id) {

        $('#chk' + id).prop("checked", true);
        $(".page-content-wrapper").hide();
        $(".page-content-wrapper1").show();
        get_record(id);
    }

    function getCheckedrecord(faq, id) {

        $(".editclass").prop("checked", false);
        $("#" + id).prop("checked", true);
        $.post("<?php echo base_url(); ?>head/faq/getFaq", {
            faq: faq
        }, function(data) {
            var arr = JSON.parse(data);

            $('#txtFaq').val(arr.question);
            $('#txtFaqid').val(faq);
            $('.summernote').summernote();
            $('.summernote').summernote('code', arr.description);
        });

        $('#frmFaq').attr('action','<?php echo base_url(); ?>head/faq/editFaq');

    }

    function chechCheckbox(id) {
        var count = <?php echo count($result) ?> ;
        var faqId = [];

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                faqId.push($("#chk" + i).val());

            }
        }

        if (faqId.length === 0) {
            alert("Please select the question name");

        } else {

            $.post("<?php echo base_url();?>head/faq/changefaqStatus", {
                id: id,
                faqId: faqId
            }, function(data) {
                location.reload(true);
            });

        }

    }

    $("#frmFaq").validate({
        rules: {
            txtFaq: {
                required: true
            },
            summernote: {
                required: true
            }
        },
        messages: {
            txtFaq: {
                required: "Please enter faq questions"
            },
            summernote: {
                required: "Please enter faq details"
            }
        }
    });
</script>