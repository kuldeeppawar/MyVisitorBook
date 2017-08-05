<style>

.box-shadow 
{

    border-radius: 10px;

    padding: 15px;

    width: 30.33333% !important;

    color:black;

    background: #fff;

    box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.5), 0 1px 5px 0 rgba(0,0,0,0.08);

    margin-left: 5px;

    margin-right: 5px;
}

.mb5
{
    margin-bottom:10px;
}

</style>


<div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row">

                        <div class="col-md-12">

                                <?php
                                for($vt=0;$vt<count($resultVisitors);$vt++)
                                {    
                                ?>    
                                    <div class="col-md-4" <?php if($css_setting!=''){?> style="float:left; border-radius: 10px; padding: 15px;width: 30.33333% !important;color:black;background: #fff; border-style: solid ; margin-left: 5px;    margin-right: 5px;margin-bottom:10px;" <?php } ?>>
                                        <!-- <div class="preview"> -->
                                            <p style="text-align:<?php echo $_POST['rdbAlignment'];?>; font-size:<?php echo $_POST['selFontsize'];?>px; font-family:<?php echo $_POST['selFont'];?>;" >
                                                <font color="<?php echo $_POST['txtColor'];?>">
                                                <?php 
                                                if(isset($_POST['chkStyle_b'])){
                                                ?>    
                                                <b><?php } ?>
                                                <?php
                                                if(isset($_POST['chkStyle_i'])){
                                                ?><i><?php } ?>
                                                <?php 
                                                if(isset($_POST['chkStyle_u']))
                                                {
                                                ?><u><?php } ?>    
                                                    To, <?php echo $resultVisitors[$vt]->vis_firstName.' '.$resultVisitors[$vt]->vis_middleName.' '.$resultVisitors[$vt]->vis_lastName;?><br> <?php echo $resultVisitors[$vt]->vis_address;?>,<br> <?php echo $resultVisitors[$vt]->country_name;?> - <?php echo $resultVisitors[$vt]->vis_zipCode;?><br> Contact: +91 - <?php echo $resultVisitors[$vt]->vis_mobile;?>
                                                <?php 
                                                if(isset($_POST['chkStyle_u'])){
                                                ?>    
                                                </u><?php } ?>
                                                <?php
                                                if(isset($_POST['chkStyle_i'])){
                                                ?></i><?php } ?>
                                                <?php 
                                                if(isset($_POST['chkStyle_b']))
                                                {
                                                ?></b><?php } ?>
                                                </font>    
                                            </p>
                                        
                                    </div>
                                <?php
                                }
                                ?>  
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

                <!-- END DASHBOARD STATS 1-->

            </div>