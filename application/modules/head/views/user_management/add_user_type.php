<div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row" style="margin-top: 10px;">

                        <div class="col-md-12">

                            <div class=" app-ticket-list">

                                <div class="page-bar row">

                                    <div class="col-md-6">

                                        <h3 class="page-title"><?php getLocalkeyword('Add New User Type');?></h3>

                                        <ul class="page-breadcrumb ">

                                            <li> <a href="<?php echo base_url();?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>

                                            <li> <a href="#"><?php getLocalkeyword('System User Management');?></a> <i class="fa fa-circle"></i> </li>

                                            <li> <a href="<?php echo base_url();?>head/user_management/manage_user_type"><?php getLocalkeyword('User Type Management');?></a><i class="fa fa-circle"></i> </li>

                                            <li><span><?php getLocalkeyword('Add New User Type');?></span></li>

                                        </ul>

                                    </div>

                                    <div class="col-md-6"> </div>

                                </div>

                                <div id="delete" class="modal fade" role="dialog">

                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">×</button>

                                                <h2 class="modal-title text-left"> <i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?>? </h2>

                                            </div>

                                            <div class="modal-body">

                                                <div class="portlet-body form">

                                                    <form role="form">

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-12">

                                                                    <div class="modal-footer"> <a href class="btn btn-primary" onclick="deleteUserType();"><?php getLocalkeyword('Yes');?></a>

                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4 ">

                                    <?php    
                                    if(getAccessRights('mvbUmUtDelete'))
                                    {
                                    ?>
                                        <div class="col-md-6 col-sm-12  pull-right">

                                            <div class="" style=" float:right; margin-bottom: 4px; margin-top:12px;">

                                                <a href="#" data-toggle="modal" data-target="#delete" class="margin_rgt hide_element" id="sb3" style="display: inline;"> <i class="fa fa-trash fa-2x " title="Delete" style="color:#828282; "></i></a>

                                            </div>

                                        </div>
                                    <?php
                                    }
                                    ?>    
                                        <div class="portlet light bordered">

                                            <div class="portlet-body" style="height:470px; overflow: auto;padding:0px;">

                                                <div id="test-list">

                                                    <ul class="list list-group All_list">

                                                    <?php
                                                        for($ut=0;$ut<count($resultUsertype);$ut++)
                                                        {
                                                    ?>                                                        
                                                                <li class="list-group-item">

                                                                    <input type="checkbox" height="20" width="20" class="check_box1" id="chkUserTypeId_<?php echo $ut;?>" name="chkUserTypeId" value="<?php echo $resultUsertype[$ut]->mutyp_id_pk;?>" onclick="uncheck_checkbox_edit('<?php echo $resultUsertype[$ut]->mutyp_id_pk;?>','<?php echo $ut;?>');"> <?php echo $resultUsertype[$ut]->mutyp_userType;?> 

                                                                </li>
                                                    <?php
                                                        }    
                                                    ?>
                                                    </ul>

                                                    <ul class="pagination pagination-sm pull-right">

                                                        <!-- <li> <a href="javascript:;"> <i class="fa fa-angle-left"></i> </a> </li>

                    <li> <a href="javascript:;"> 1 </a> </li>

                    <li class="active"> <a href="javascript:;"> 2 </a> </li>

                    <li> <a href="javascript:;"> 3 </a> </li>

                    <li> <a href="javascript:;"> 4 </a> </li>

                    <li> <a href="javascript:;"> 5 </a> </li>

                    <li> <a href="javascript:;"> 6 </a> </li>

                    <li> <a href="javascript:;"> <i class="fa fa-angle-right"></i> </a> </li> -->

                                                    </ul>

                                                </div>

                                            </div>

                                            <!-- <div></div> -->

                                        </div>

                                    </div>

                                    <div id="user_type_privileges_div">

                                           <form id="frmUserType" name="frmUserType" method="POST" action="<?php echo base_url();?>head/user_management/addUserType" >

                                                <div class="col-md-8">

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label><?php getLocalkeyword('User Type Name');?> </label>

                                                                <input type="text" class="form-control" placeholder="Enter User Type Name" id="txtUserTypeName" name="txtUserTypeName" required>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <h3 class="text-left" style="font-size: 18px; margin-top: 0px;"><?php getLocalkeyword('Assign Privileges');?>:</h3>

                                                        </div>

                                                    </div>

                                                    <?php
                                                     
                                                        for($i=0;$i<count($module);$i++)
                                                        {                                                        $count_sub=1;
                                                    ?>
                                                            <div class="col-lg-6" style="margin-left:-72px;">
                                                                    <div class="checkbox" class="form-control">
                                                                        <label for="cname" class="control-label col-lg-3"></label>
                                                                        <input type="checkbox" class="main_module" onclick="checked_all(this,'<?php echo $module[$i]->mm_module_name?>_module',<?php echo $module[$i]->mm_id_pk;?>);" id="<?php echo $module[$i]->mm_module_name?>" name="modules[]" value="<?php echo $module[$i]->mm_id_pk?>">&nbsp; <font style="font-weight:bold;"><?php echo $module[$i]->mm_module_name?></font>
                                                                    </div>
                                                                    <div class="submodule_checkbox" class="form-control"  id="<?php echo $module[$i]->mm_module_name?>_module" style="margin-left:160px;display:none;">
                                                                        <?php
                                                                        $sub_modulename=$this->user_management_model->getallsubmodule($module[$i]->mm_id_pk);
                                                                         for($j=0;$j<count($sub_modulename);$j++)
                                                                         {                  
                                                                        ?>
                                                                                <input type="checkbox" id="all_modules_<?php echo $module[$i]->mm_id_pk;?>_<?php echo $count_sub;?>" class="module_<?php echo $sub_modulename[$j]->mm_menu_id?>" value="<?php echo $sub_modulename[$j]->mm_id_pk;?>" name="modules[]"  onclick="checked_all_sub(this,<?php echo $module[$i]->mm_id_pk;?>,<?php echo $j+1;?>),checkSubmoduleCheck(<?php echo $sub_modulename[$j]->mm_menu_id?>,'<?php echo $module[$i]->mm_module_name?>');">&nbsp; <font style="font-weight:bold;"><?php echo $sub_modulename[$j]->mm_module_name;?></font><br>

                                                                                <div class="sub_submodule_checkbox" class="form-control"  id="<?php echo $sub_modulename[$j]->mm_module_name?>_module" style="margin-left:90px;">

                                                                                <?php
                                                                                    $sub_sub_modulename=$this->user_management_model->getallsubsubmodule($module[$i]->mm_id_pk,$sub_modulename[$j]->mm_id_pk);

                                                                                    for($k=0;$k<count($sub_sub_modulename);$k++)
                                                                                    {
                                                                                ?>
                                                                                            <input type="checkbox" id="all_sub_modules_<?php echo $module[$i]->mm_id_pk;?>_<?php echo $count_sub;?>" class="sub_module_<?php echo $module[$i]->mm_id_pk;?>_<?php echo $j+1?>" value="<?php echo $sub_sub_modulename[$k]->mm_id_pk;?>" name="modules[]" onclick="checkSubSubmoduleCheck(<?php echo $j+1?>,<?php echo $count_sub;?>,'<?php echo $module[$i]->mm_module_name?>',<?php echo $sub_modulename[$j]->mm_menu_id?>);">&nbsp; <?php echo $sub_sub_modulename[$k]->mm_module_name;?>
                                                                                            <br>
                                                                                <?php
                                                                                    }
                                                                                 ?>
                                                                                </div>  
                                                                                <br>   
                                                                         <?php
                                                                            $count_sub++;   
                                                                         }   
                                                                        ?>
                                                                    </div>  
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>    

                                                    <input type="hidden" id="hidden_sub_module" name="hidden_sub_module" value="<?php echo $count_sub?>">

                                                    <!-- <table class="table table-bordered">

                                                        <tbody>

                                                            <tr>

                                                                <td width="220">

                                                                    <label class="">

                                                                        <input type="checkbox"> System User Management <span></span> </label>

                                                                </td>

                                                                <td width="670">
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> User Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> User Type Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Festival Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive
                                                                            <label class="">

                                                                                <input type="checkbox" value=""> Import

                                                                            </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Discount Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Generate Coupon <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add Coupon</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Download unused Coupon</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Package Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Sender Id Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> FAQ's Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Push/Revoke

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Email Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Push/Revoke

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Communication Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Send SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Send Email</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View Email</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Backup Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Download Backup</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Order Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View Emails/SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Refill Manually</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Order Details</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table> -->

                                                    <div class="col-md-12">

                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Save');?></button>

                                                            <a href="<?php echo base_url();?>head/user_management/manage_user_type" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a> </div>

                                                    </div>

                                                </div>

                                           </form> 

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

        function uncheck_checkbox_edit(value,value1)
        {
               var count=$('input:checkbox.check_box1').length;     

               $("#chkUserTypeId_"+value1).attr("disabled", true);          
               
               for(var i=0;i<count;i++)
               {                                                            
                        if(value1!=i)
                        {
                            document.getElementById("chkUserTypeId_"+i).checked = false;
                            $("#chkUserTypeId_"+i).attr("disabled", false);
                        }
               }

               set_user_type_privileges(value);
        }


        function set_user_type_privileges(value)
        {
                 $.post("<?php echo base_url();?>head/user_management/getUserTypePrivileges",{user_type_id:value},function(data)
                    {    
                            //alert(data);                                      
                            $("#user_type_privileges_div").html(data);
                   });
        }


        function checked_all(cb, value, cb_value) 
        {
            if (value != "all") {
                if (cb.checked) {
                    var cbs = document.getElementsByClassName("module_" + cb_value);

                    var count_sub_module = 1;
                    for (var i = 0; i < cbs.length; i++) {
                        cbs[i].checked = true;

                        var sub_sub_module = document.getElementsByClassName("sub_module_"+ cb_value +'_' + count_sub_module);

                        for (var n = 0; n < sub_sub_module.length; n++) {
                            sub_sub_module[n].checked = true;
                        }

                        count_sub_module++;
                    }

                    //$(".module_7").attr("checked",true);
                    document.getElementById(value).style.display = "block";
                } else {

                    var cbs = document.getElementsByClassName("module_" + cb_value);

                    var count_sub_module = 1;

                    for (var i = 0; i < cbs.length; i++) {
                        cbs[i].checked = false;

                        var sub_sub_module = document.getElementsByClassName("sub_module_"+ cb_value +'_' + count_sub_module);

                        for (var n = 0; n < sub_sub_module.length; n++) {
                            sub_sub_module[n].checked = false;
                        }

                        count_sub_module++;
                    }

                    document.getElementById(value).style.display = "none";
                }
            } else {
                if (cb.checked) {
                    var cbs = document.getElementsByClassName("main_module");
                    for (var i = 0; i < cbs.length; i++) {
                        cbs[i].checked = true;
                    }

                    var count_sub = document.getElementById('hidden_sub_module').value;

                    for (j = 1; j < count_sub; j++) {
                        document.getElementById('all_modules_'+ cb_value +'_' + j).checked = true;

                        document.getElementById('all_sub_modules_'+ cb_value + '_' +j).checked = true;
                    }
                } else {
                    var cbs = document.getElementsByClassName("main_module");
                    for (var i = 0; i < cbs.length; i++) {
                        cbs[i].checked = false;
                    }

                    var count_sub = document.getElementById('hidden_sub_module').value;

                    for (j = 1; j < count_sub; j++) {
                        document.getElementById('all_modules_'+ cb_value +'_' + j).checked = false;

                        document.getElementById('all_sub_modules_'+ cb_value +'_' +j).checked = false;
                    }
                }
            }
        }


        function checked_all_sub(cb, value, cb_value) 
        {
            if (cb.checked) 
            {
                var cbs = document.getElementsByClassName("sub_module_"+value+ '_' + cb_value);

                var count_sub_module = 1;
                for (var i = 0; i < cbs.length; i++) 
                {
                    cbs[i].checked = true;

                    // var sub_sub_module=document.getElementsByClassName("sub_module_"+count_sub_module);

                    // for (var n = 0; n < sub_sub_module.length; n++) 
                    // {
                    //             sub_sub_module[n].checked=true;
                    // }

                    // count_sub_module++;
                }

                //$(".module_7").attr("checked",true);
                //document.getElementById(value).style.display="block";
            } 
            else 
            {
                //document.getElementById("module_7").checked= false;
                //$(".module_7").attr("checked",false);
                var cbs = document.getElementsByClassName("sub_module_"+ value +'_' + cb_value);

                var count_sub_module = 1;
                for (var i = 0; i < cbs.length; i++) {
                    cbs[i].checked = false;
                }
            }
        }


        function checkSubmoduleCheck(current_value,current_module_name)
        {                           
                            if($(".module_"+current_value+":checkbox:checked").length>0)
                            {                                   
                            }
                            else
                            {
                                        document.getElementById(current_module_name).checked=false;
                                        document.getElementById(current_module_name+"_module").style.display='none';
                            }
        }

        function checkSubSubmoduleCheck(current_value,current_value1,current_module_name,menu_id)
        {                   
                    if($(".sub_module_"+menu_id+'_'+current_value+":checkbox:checked").length>0)
                    { 
                                document.getElementById("all_modules_"+menu_id+'_'+current_value1).checked=true;
                    }
                    else
                    {
                                document.getElementById("all_modules_"+menu_id+'_'+current_value1).checked=false;

                                if($(".module_"+menu_id+":checkbox:checked").length>0)
                                {
                                }
                                else
                                {
                                        document.getElementById(current_module_name).checked=false;
                                        document.getElementById(current_module_name+"_module").style.display='none';
                                }
                    }     
        }


        $("#frmUserType").validate({
        rules:{             
            txtUserTypeName:{
                required:true
            }
            // fullname: {
            //     required:true
            // },
        },
        messages:{                      
            txtUserTypeName:{
                required:"Please enter user type name"
            }
            // fullname: {
            //     required:"Please enter full name"
            // },
        }
        });


        function deleteUserType()
        {
                var count='<?php echo count($resultUsertype)?>';
                     var usertypeid;                     
                     
                     for (var i=0;i<=count;i++)
                     {
                          if($('#chkUserTypeId_'+i).is(':checked'))
                          {
                              usertypeid=$("#chkUserTypeId_"+i).val();                              
                          }
                     } 

                     
                    $.post("<?php echo base_url();?>head/user_management/deleteUserType",{user_type_id:usertypeid},function(data)
                    {
                        window.location="<?php echo base_url();?>head/user_management/manage_user_type";
                                        
                    });
        }

        $('.check_box1').change(function()
        {
            if ($('.check_box1:checked').length == 0)
            {
                $('.hide_element').css('visibility', 'hidden');   
            }

            else if ($('.check_box1:checked').length == 1)
            {
                $('.hide_element').css('visibility', 'visible');
            }

            else if ($('.check_box1:checked').length >= 1)
            {
                $('.hide_element').css('visibility', 'hidden');    
            }

            else
            {
                //  $('.p_element').show();
                // $('.check_box:checked').each(function()
                // {
                    
                //     $('#' + $(this).attr('data-ptag')).show();
                //     $('#sb2').hide();
                //     $('#sb2').hide();
                    
                // });
            }
            
        });


</script>