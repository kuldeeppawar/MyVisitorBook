 <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" app-ticket-list">
                                <div class="page-bar row">
                                    <div class="col-md-6">
                                        <h3 class="page-title"> <?php getLocalkeyword('Sender Id Management');?></h3>
                                        <ul class="page-breadcrumb">
                                            <li>
                                                <a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i>
                                            </li>
                                            <li><span><?php getLocalkeyword('Sender Id Management');?></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn pull-right" id="reportrange" style="padding-top: 12px;">
                                            <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--modal-->
                                    <div class="modal fade in" id="addSender" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" data-dismiss="modal" type="button">×</button>
                                                    <h2 class="modal-title text-left"><i class="fa fa-plus"></i><?php getLocalkeyword('Add Sender Id');?> </h2>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="portlet-body form">
                                                        <form role="form" id="sender_id_form" name="sender_id_form" method="POST" action="<?php echo base_url();?>head/sender_id_management/addSenderId">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="selClientId" name="selClientId" required>
                                                                        <option value="">--select --</option>
                                                                        <?php 
                                                                            for($n=0;$n<count($client);$n++)
                                                                            {
                                                                        ?>    
                                                                                    <option value="<?php echo $client[$n]->clnt_id_pk;?>">
                                                                                        <?php echo $client[$n]->clnt_name;?>
                                                                                    </option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=""><?php getLocalkeyword('Sender Id');?></label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text" id="txtSenderCode" name="txtSenderCode[]">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="0" id="chkDefaultSenderCode_1" name="chkDefaultSenderCode[]" onclick="uncheck_checkbox('1');">Set as Default</label>
                                                                        <label style="margin-top:3px;"><input type="checkbox" value="0" id="chkActive" name="chkActive[]" class="checkbox-inline">Active</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=""><?php getLocalkeyword('Sender Id');?></label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text" id="txtSenderCode" name="txtSenderCode[]">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="1" id="chkDefaultSenderCode_2" name="chkDefaultSenderCode[]" onclick="uncheck_checkbox('2');">Set as Default</label>
                                                                        <label style="margin-top:3px;"><input type="checkbox" value="1" id="chkActive" name="chkActive[]" class="checkbox-inline">Active</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class=""><?php getLocalkeyword('Sender Id');?></label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text" id="txtSenderCode" name="txtSenderCode[]">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="2" id="chkDefaultSenderCode_3" name="chkDefaultSenderCode[]" onclick="uncheck_checkbox('3');"><?php getLocalkeyword('Set as Default');?></label>
                                                                        <label style="margin-top:3px;"><input type="checkbox" value="2" id="chkActive" name="chkActive[]" class="checkbox-inline"><?php getLocalkeyword('Active');?></label>
                                                                </div>
                                                                <input type="hidden" value="3" name="imgcounterclose" id="imgcounterclose" />
                                                                    <div id="first" class="form-group"></div>

                                                                <a onclick="add_sender_code('first');"><i class="fa fa-plus"></i><?php getLocalkeyword('Add more');?></a>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit" name="btnSubmit"><?php getLocalkeyword('Save');?></button>
                                                                    <button class="btn btn-danger" data-dismiss="modal" type="button" onclick="resetSenderidform();"><?php getLocalkeyword('Cancel');?></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade in" id="addSender1" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" data-dismiss="modal" type="button">×</button>
                                                    <h2 class="modal-title text-left"><i class="fa fa-plus"></i><?php getLocalkeyword('Edit Sender Id');?></h2>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="portlet-body form">
                                                        <form role="form" id="edit_sender_id_form" name="edit_sender_id_form" method="POST" action="<?php echo base_url();?>head/Sender_id_management/editSenderId">
                                                            <div class="form-body"  id="edit_sender_div"><!-- 
                                                                <div class="form-group">
                                                                    <p>Sumit Sharma</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">Sender Id 1</label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="">Set as Default</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">Sender Id 2</label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="">Set as Default</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">Sender Id 3</label>
                                                                    <br>
                                                                    <input class=" input-sm col-md-7" placeholder="" type="text">
                                                                    <label style="margin-top:3px;">
                                                                        <input type="checkbox" value="">Set as Default</label>
                                                                </div><a><i class="fa fa-plus"></i> Add more</a>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="button">Save</button>
                                                                    <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                                                                </div> -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal-->
                                    <div class="col-md-12">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="nav navbar-nav pl0">
                                                        <li class="dropdown dropdown-user">
                                                            <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="javascript:;" style="font-size:18px;padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-default">
                                                                <li>
                                                                    <a href="#">All Contacts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">My Contacts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Recently viewed</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Not updated in 30 Days</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-5 pull-right">
                                                    <div class="pull-right">
                                                    <?php
                                                        if(getAccessRights('mvbSmEdit'))
                                                        {     
                                                    ?>    
                                                                <div style="float: left; margin-top: 8px; margin-right: 5px;">
                                                                    <a class="margin_rgt hide_element" data-target="#addSender1" data-toggle="modal" href="#" onclick="getRecord();"><i class="fa fa-pencil-square-o fa-2x" style="color:#828282;" title="edit"></i></a>
                                                                </div>
                                                    <?php
                                                        }

                                                        if(getAccessRights('mvbSmAdd'))
                                                        {    
                                                    ?>  
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary" data-target="#addSender" data-toggle="modal" id="sample_editable_1_new hvr-float-shadow">
                                                                    <?php getLocalkeyword('Add Sender Id');?></a>
                                                                </div>
                                                    <?php
                                                        }
                                                    ?>    

                                                        <!-- modal ends -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="selected_rows">
                                                <font id="show_checkbox_selected"></font>
                                                <a id="selectall"><?php getLocalkeyword('select all');?></a>
                                            </div>
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                   <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 35px;">
                                                                    <input data-set="" id="checkall" name="all" type="checkbox"> <span id="growl-primary1"></span> </th>
                                                                <th><?php getLocalkeyword('Sr. No.');?></th>    
                                                                <th><?php getLocalkeyword('User type');?></th>
                                                                <th><?php getLocalkeyword('User Name');?></th>
                                                                <th><?php getLocalkeyword('Mobile No.');?></th>
                                                                <th><?php getLocalkeyword('Email Id');?></th>
                                                                <th><?php getLocalkeyword('Sender Id');?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            for($m=0;$m<count($result);$m++)
                                                            {
                                                                    $j=$m+1;
                                                                    $sender_codes="";
                                                                    $sender_codes_default="";
                                                                    $sender_codes_status="";
                                                         ?> 
                                                                    <tr class="odd gradeX">
                                                                        
                                                                        <td>
                                                                            <input class="check_box" data-ptag="sb1" id="chk<?php echo $j;?>" name="chk<?php echo $j;?>" type="checkbox" value="<?php echo $result[$m]->clnt_id_pk;?>">
                                                                        </td>
                                                                        <td><?php echo $j;?></td>
                                                                        <td><?php echo $result[$m]->utyp_userType;?></td>
                                                                        <td><?php echo $result[$m]->sysu_name.' '.$result[$m]->sysu_lname;?></td>
                                                                        <td><?php echo $this->encryption->decrypt($result[$m]->sysu_mobile);?></td>
                                                                        <td><?php echo $this->encryption->decrypt($result[$m]->sysu_email);?></td>
                                                                        <td><?php
                                                                             $sender_codes=explode(",",$result[$m]->sender_codes);
                                                                             $sender_codes_default=explode(",",$result[$m]->sender_codes_default);
                                                                             $sender_codes_status=explode(",",$result[$m]->sender_codes_status); 

                                                                            for($z=0;$z<count($sender_codes);$z++)
                                                                            {
                                                                                   if($sender_codes_default[$z]=='1')
                                                                                   {
                                                                                        $label_color='blue';
                                                                                   }    
                                                                                   else
                                                                                   {
                                                                                        if($sender_codes_status[$z]=='1')
                                                                                        {
                                                                                            $label_color='green';
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $label_color='red';
                                                                                        }
                                                                                   } 

                                                                                   if($z!=count($sender_codes)-1)
                                                                                   {
                                                                                          $comma_separated=",";  
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                          $comma_separated="";
                                                                                   }

                                                                            ?>    
                                                                                    <label style="color:<?php echo $label_color;?>"><?php echo $sender_codes[$z].$comma_separated;?></label> 
                                                                            <?php 
                                                                            }    

                                                                            ?></td>
                                                                        
                                                                    </tr>
                                                         <?php
                                                            }
                                                         ?>   
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


            <script type="text/javascript">

                var counter_close = '4';
                var checkbox_counter = '3';
    

                function add_sender_code(divName)
                {    
                       document.getElementById("imgcounterclose").value=counter_close; 

                       var newdiv = document.createElement('Div');
                       newdiv.innerHTML='<div id="myDiv'+counter_close+'">&nbsp;&nbsp;<div class="form-group"><label class="">Sender Id</label><br><input class=" input-sm col-md-7" placeholder="" type="text"><label style="margin-top:3px;"><input type="checkbox" value="'+checkbox_counter+'" id="chkDefaultSenderCode_'+counter_close+'" name="chkDefaultSenderCode[]" onclick="uncheck_checkbox('+counter_close+');">Set as Default</label><label style="margin-top:3px;"><input type="checkbox" value="'+checkbox_counter+'" id="chkActive" name="chkActive[]" class="checkbox-inline">Active</label>&nbsp;&nbsp;<a class=\"content_body btn btn-info\" onclick="removeElementClose(\''+ counter_close +'\');"> X </a></div></div>';
                       document.getElementById(divName).appendChild(newdiv);                               
                         
                       counter_close++; 

                       checkbox_counter++;
                       
                }

                function removeElementClose(val)
                {
                   var d = document.getElementById('myDiv' + val);                   

                   document.getElementById("imgcounterclose").value-=1;

                   d.remove();
                } 

                var count_to_close=0;
                var counter_close_edit=0;
                var checkbox_counter_edit=0;

                
                function add_sender_code_edit(count1,count2)
                {
                        var divName='second';

                        if(count_to_close==0)
                        {
                            counter_close_edit=count1;
                            checkbox_counter_edit=count2;

                            count_to_close++;
                        }

                        document.getElementById("imgcountercloseedit").value=counter_close_edit; 

                       var newdiv = document.createElement('Div');
                       newdiv.innerHTML='<div id="myDiv'+counter_close_edit+'">&nbsp;&nbsp;<div class="form-group"><label class=""><?php getLocalkeyword('Sender Id');?></label><br><input class=" input-sm col-md-7" placeholder="" type="text" id="txtSenderCodeEdit" name="txtSenderCodeEdit[]"><label style="margin-top:3px;"><input type="checkbox" value="'+checkbox_counter_edit+'" id="chkDefaultSenderCodeEdit_'+counter_close_edit+'" name="chkDefaultSenderCodeEdit[]" onclick="uncheck_checkbox_edit('+counter_close_edit+');"><?php getLocalkeyword('Set as Default');?></label><label style="margin-top:3px;"><input type="checkbox" value="'+checkbox_counter_edit+'" id="chkActiveEdit" name="chkActiveEdit[]" class="checkbox-inline"><?php getLocalkeyword('Active');?></label><input type="hidden" value="" name="hidden_sender_id[]" id="hidden_sender_id" />&nbsp;&nbsp;<a class=\"content_body btn btn-info\" onclick="removeElementCloseEdit(\''+ counter_close_edit +'\');"> X </a></div></div>';
                       document.getElementById(divName).appendChild(newdiv);                               
                         
                       counter_close_edit++; 

                       checkbox_counter_edit++;
                }

                function removeElementCloseEdit(val)
                {
                   var d = document.getElementById('myDiv' + val);                   

                   document.getElementById("imgcountercloseedit").value-=1;

                   d.remove();
                } 


                function uncheck_checkbox(value)
                {
                       var count=document.getElementById('imgcounterclose').value;
                       
                       for(var i=1;i<=count;i++)
                       {                                                            
                                if(value!=i)
                                {
                                    document.getElementById("chkDefaultSenderCode_"+i).checked = false;
                                }
                       }
                }

                function uncheck_checkbox_edit(value)
                {
                       var count=document.getElementById('imgcountercloseedit').value;
                       
                       for(var i=1;i<=count;i++)
                       {                                                            
                                if(value!=i)
                                {
                                    document.getElementById("chkDefaultSenderCodeEdit_"+i).checked = false;
                                }
                       }
                }


                function getRecord()
                {
                        var count='<?php echo count($result)?>'; 

                        alert(count);
                      
                        var sender_id;                      
                    
                        for (var i=1;i<=count;i++)
                        {
                              if($('#chk'+i).is(':checked'))
                              {
                                  sender_id=$("#chk"+i).val();
                              }
                        } 

                       
                        $.post("<?php echo base_url().'head/sender_id_management/getSenderIdRecord';?>",{chk_sender_id:sender_id},function(data)
                        {            
                                    $("#edit_sender_id_form").validate({
                                    rules:{
                                        'chkDefaultSenderCodeEdit[]':{
                                            required:true
                                        }
                                    },
                                    messages:{
                                        'chkDefaultSenderCodeEdit[]':
                                        {
                                            required:"Please select default"
                                        }
                                    }
                                });

                                    $("#edit_sender_div").html(data);
                        });
                }


                function chechCheckbox(id)
                {
                     var count=<?php echo count($result)?>;
                     var senderid=[];
                     
                     
                     for (var i=1;i<=count;i++)
                     {
                          if($('#chk'+i).is(':checked'))
                          {
                              senderid.push($("#chk"+i).val());                              
                          }
                     } 

                     
                     if (senderid.length === 0) 
                     {
                            alert ("Please Select Sender Id");                          
                     }
                     else
                     {
                          $.post("<?php echo base_url();?>head/Sender_id_management/changesenderidStatus",{id:id,sender_id:senderid},function(data){
                              location.reload(true);
                               });
                          
                      }     
                }


                $("#sender_id_form").validate({
                  rules:{             
                      selClientId:{
                          required:true
                      }
                  },
                  messages:{                      
                      selClientId:{
                          required:"Please select client"
                      }
                  }
                });


                function resetSenderidform()
                {
                        $("#first").html('');
                }

                function resetSenderideditform()
                {
                        $("#second").html('');
                }


            </script>