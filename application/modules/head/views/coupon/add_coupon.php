<div class="page-content-wrapper">
          <!-- BEGIN CONTENT BODY -->
          <div class="page-content">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class=" app-ticket-list">
                  <div class="page-bar row">
                    <div class="col-md-6">
                      <h3 class="page-title"><?php getLocalkeyword('Add Coupon');?>
                      </h3>
                      <ul class="page-breadcrumb ">
                        <li> 
                          <a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?>
                          </a> 
                          <i class="fa fa-circle">
                          </i> 
                        </li>
                        <li> 
                          <a href="#"><?php getLocalkeyword('Coupon Management');?>
                          </a> 
                          <i class="fa fa-circle">
                          </i> 
                        </li>
                        <li> 
                          <a href="<?php echo base_url()?>head/coupon"><?php getLocalkeyword('Generate Coupon');?>
                          </a> 
                          <i class="fa fa-circle">
                          </i> 
                        </li>
                        <li> 
                          <span><?php getLocalkeyword('Add Coupon');?>
                          </span> 
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> 
                        <i class="fa fa-calendar">
                        </i> &nbsp; 
                        <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016
                        </span> 
                        <b class="fa fa-angle-down">
                        </b> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <form role="form" class="" name="coupon_form" id="coupon_form" method="POST" action="<?php echo base_url();?>head/coupon/addGenerateCoupon">
                        <div class="form-body" style="padding-top:10px;">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label><?php getLocalkeyword('Package Type');?>
                                </label>
                                <select class="form-control" id="selPackagetypeid" name="selPackagetypeid">
                                <option value="">Select Package Type</option>
                                <?php
                                    for($pt=0;$pt<count($pkg_type);$pt++)
                                    {
                                ?>
                                          <option value="<?php echo $pkg_type[$pt]->pkg_id_pk;?>"><?php echo $pkg_type[$pt]->pkg_name;?></option>                                  
                                <?php
                                    }
                                ?>                                      
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <div class="form-group">
                                  <label> <?php getLocalkeyword('Coupon Code');?>
                                  </label>
                                  <input type="text" class="form-control" placeholder="" id="txtCouponcode" name="txtCouponcode" required>
                                </div>
                              </div>
                            </div>
                            <div class="clearfix">
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label> <?php getLocalkeyword('Description');?>
                                </label>
                                <textarea rows="3" class="form-control" id="txtDescription" name="txtDescription" required></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="profile-content">
                                <div class="row">
                                  <div class="col-md-12">
                                    <ul class="nav nav-tabs">
                                      <li class="active">
                                        <a data-toggle="tab" href="#tab1" aria-expanded="true"><?php getLocalkeyword('Usage Restriction');?>
                                        </a>
                                      </li>
                                      <li class="">
                                        <a data-toggle="tab" href="#tab2" aria-expanded="false"><?php getLocalkeyword('Usage Limit');?>
                                        </a>
                                      </li>
                                    </ul>
                                    <!-- Modal -->
                                    <!-- ends -->
                                    <div class="tab-content">
                                      <div id="tab1" class="tab-pane fade active in">
                                        <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label><?php getLocalkeyword('Restriction by # of customer');?>
                                              </label>
                                              <input type="text" class="form-control" placeholder="" id="txtNoofcustomer" name="txtNoofcustomer" required pattern="[0-9]+">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label><?php getLocalkeyword('Customer Name');?>
                                              </label>
                                              <input type="text" class="form-control" placeholder="" id="txtCustomername" name="txtCustomername" required pattern="[a-zA-z ]+">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label><?php getLocalkeyword('Mobile No.');?>
                                              </label>
                                              <input type="text" class="form-control" placeholder="" id="txtMobileno" name="txtMobileno" required pattern="[0-9]+" maxlength="10" minlength="10">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label><?php getLocalkeyword('Email Id');?>
                                              </label>
                                              <input type="email" class="form-control" placeholder="" id="txtEmailid" name="txtEmailid" required>
                                            </div>
                                          </div>
                                          <!-- <div class="col-md-4">
                                            <div class="form-group">
                                              <label>Start Date
                                              </label>
                                              <div class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" readonly="" id="start_date" name="end_date">
                                                <span class="input-group-btn">
                                                  <button class="btn default" type="button"> 
                                                    <i class="fa fa-calendar">
                                                    </i> 
                                                  </button>
                                                </span> 
                                              </div>
                                            </div>
                                          </div> -->
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label class=""> <?php getLocalkeyword('Validity Date Range');?> </label> <br>
                                              
                                                <div class="input-group  date date-picker input-daterange" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                  <input type="text" class="form-control" name="txtStartdate" id="txtStartdate" placeholder="Start Date" required> <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                    </button>
                                                    
                                                  </span>
                                                  <input type="text" class="form-control" name="txtEnddate" id="txtEnddate" placeholder="End Date" required> <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                </div>
                                              </div>
                                          </div>
                                          <!-- <div class="col-md-4">
                                            <div class="form-group">
                                              <label>End Date
                                              </label>
                                              <div class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" readonly="">
                                                <span class="input-group-btn">
                                                  <button class="btn default" type="button"> 
                                                    <i class="fa fa-calendar">
                                                    </i> 
                                                  </button>
                                                </span> 
                                              </div>
                                            </div>
                                          </div> -->
                                        </div>
                                      </div>
                                      <div id="tab2" class="tab-pane fade">
                                        <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <input type="text" class="form-control" placeholder="" id="txtUsagelimit" name="txtUsagelimit" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6 radio_group">
                                            <label class="radio-inline">
                                              <input type="radio" id="optradio" name="optradio" value="percentage" required onclick="show_validity_input('percentage');"><?php getLocalkeyword('Percent');?>
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" id="optradio" name="optradio" value="Rs" required onclick="show_validity_input('rupees');">Rs
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" id="optradio" name="optradio" value="validity" required onclick="show_validity_input('validity');"><?php getLocalkeyword('Validity');?>
                                            </label>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                          <!-- <div class="col-md-4" id="validity_div" style="display:none;">
                                            <div class="form-group">
                                              <label><?php //getLocalkeyword('Validity in Days/Month');?>
                                              </label>
                                              <input type="text" class="form-control" placeholder="" id="txtValidityindays" name="txtValidityindays">
                                            </div> -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class=" pull-right">
                                          <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Save');?>
                                          </button>
                                          <a type="button" href="<?php echo base_url();?>head/coupon" class="btn btn-danger"><?php getLocalkeyword('Cancel');?>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix">
                </div>
                <!-- END DASHBOARD STATS 1-->
              </div>
              <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"> 
              <i class="icon-login">
              </i> 
            </a>
            <!-- <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
              <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                  <li class="active"> 
                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users 
                      <span class="badge badge-danger">2
                      </span> 
                    </a> 
                  </li>
                  <li> 
                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts 
                      <span class="badge badge-success">7
                      </span> 
                    </a> 
                  </li>
                  <li class="dropdown"> 
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More 
                      <i class="fa fa-angle-down">
                      </i> 
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> 
                          <i class="icon-bell">
                          </i> Alerts 
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> 
                          <i class="icon-info">
                          </i> Notifications 
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> 
                          <i class="icon-speech">
                          </i> Activities 
                        </a>
                      </li>
                      <li class="divider">
                      </li>
                      <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> 
                          <i class="icon-settings">
                          </i> Settings 
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                      <h3 class="list-heading">Staff
                      </h3>
                      <ul class="media-list list-items">
                        <li class="media">
                          <div class="media-status"> 
                            <span class="badge badge-success">8
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Bob Nilson
                            </h4>
                            <div class="media-heading-sub"> Project Manager 
                            </div>
                          </div>
                        </li>
                        <li class="media"> 
                          <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Nick Larson
                            </h4>
                            <div class="media-heading-sub"> Art Director 
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-status"> 
                            <span class="badge badge-danger">3
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Deon Hubert
                            </h4>
                            <div class="media-heading-sub"> CTO 
                            </div>
                          </div>
                        </li>
                        <li class="media"> 
                          <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Ella Wong
                            </h4>
                            <div class="media-heading-sub"> CEO 
                            </div>
                          </div>
                        </li>
                      </ul>
                      <h3 class="list-heading">Customers
                      </h3>
                      <ul class="media-list list-items">
                        <li class="media">
                          <div class="media-status"> 
                            <span class="badge badge-warning">2
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Lara Kunis
                            </h4>
                            <div class="media-heading-sub"> CEO, Loop Inc 
                            </div>
                            <div class="media-heading-small"> Last seen 03:10 AM 
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-status"> 
                            <span class="label label-sm label-success">new
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Ernie Kyllonen
                            </h4>
                            <div class="media-heading-sub"> Project Manager,
                              <br> SmartBizz PTL 
                            </div>
                          </div>
                        </li>
                        <li class="media"> 
                          <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Lisa Stone
                            </h4>
                            <div class="media-heading-sub"> CTO, Keort Inc 
                            </div>
                            <div class="media-heading-small"> Last seen 13:10 PM 
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-status"> 
                            <span class="badge badge-success">7
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Deon Portalatin
                            </h4>
                            <div class="media-heading-sub"> CFO, H&D LTD 
                            </div>
                          </div>
                        </li>
                        <li class="media"> 
                          <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Irina Savikova
                            </h4>
                            <div class="media-heading-sub"> CEO, Tizda Motors Inc 
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-status"> 
                            <span class="badge badge-danger">4
                            </span> 
                          </div>
                          <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                          <div class="media-body">
                            <h4 class="media-heading">Maria Gomez
                            </h4>
                            <div class="media-heading-sub"> Manager, Infomatic Inc 
                            </div>
                            <div class="media-heading-small"> Last seen 03:10 AM 
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="page-quick-sidebar-item">
                      <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                          <a href="javascript:;" class="page-quick-sidebar-back-to-list"> 
                            <i class="icon-arrow-left">
                            </i>Back
                          </a>
                        </div>
                        <div class="page-quick-sidebar-chat-user-messages">
                          <div class="post out"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Bob Nilson
                              </a> 
                              <span class="datetime">20:15
                              </span> 
                              <span class="body"> When could you send me the report ? 
                              </span> 
                            </div>
                          </div>
                          <div class="post in"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Ella Wong
                              </a> 
                              <span class="datetime">20:15
                              </span> 
                              <span class="body"> Its almost done. I will be sending it shortly 
                              </span> 
                            </div>
                          </div>
                          <div class="post out"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Bob Nilson
                              </a> 
                              <span class="datetime">20:15
                              </span> 
                              <span class="body"> Alright. Thanks! :) 
                              </span> 
                            </div>
                          </div>
                          <div class="post in"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Ella Wong
                              </a> 
                              <span class="datetime">20:16
                              </span> 
                              <span class="body"> You are most welcome. Sorry for the delay. 
                              </span> 
                            </div>
                          </div>
                          <div class="post out"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Bob Nilson
                              </a> 
                              <span class="datetime">20:17
                              </span> 
                              <span class="body"> No probs. Just take your time :) 
                              </span> 
                            </div>
                          </div>
                          <div class="post in"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Ella Wong
                              </a> 
                              <span class="datetime">20:40
                              </span> 
                              <span class="body"> Alright. I just emailed it to you. 
                              </span> 
                            </div>
                          </div>
                          <div class="post out"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Bob Nilson
                              </a> 
                              <span class="datetime">20:17
                              </span> 
                              <span class="body"> Great! Thanks. Will check it right away. 
                              </span> 
                            </div>
                          </div>
                          <div class="post in"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Ella Wong
                              </a> 
                              <span class="datetime">20:40
                              </span> 
                              <span class="body"> Please let me know if you have any comment. 
                              </span> 
                            </div>
                          </div>
                          <div class="post out"> 
                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                            <div class="message"> 
                              <span class="arrow">
                              </span> 
                              <a href="javascript:;" class="name">Bob Nilson
                              </a> 
                              <span class="datetime">20:17
                              </span> 
                              <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. 
                              </span> 
                            </div>
                          </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type a message here...">
                            <div class="input-group-btn">
                              <button type="button" class="btn green"> 
                                <i class="icon-paper-clip">
                                </i> 
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                    <div class="page-quick-sidebar-alerts-list">
                      <h3 class="list-heading">General
                      </h3>
                      <ul class="feeds list-items">
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-info"> 
                                  <i class="fa fa-check">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 4 pending tasks. 
                                  <span class="label label-sm label-warning "> Take action 
                                    <i class="fa fa-share">
                                    </i> 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> Just now 
                            </div>
                          </div>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-success"> 
                                    <i class="fa fa-bar-chart-o">
                                    </i> 
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> Finance Report for year 2013 has been released. 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                              <div class="date"> 20 mins 
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-danger"> 
                                  <i class="fa fa-user">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 5 pending membership that requires a quick review. 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 24 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-info"> 
                                  <i class="fa fa-shopping-cart">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> New order received with 
                                  <span class="label label-sm label-success"> Reference Number: DR23923 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 30 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-success"> 
                                  <i class="fa fa-user">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 5 pending membership that requires a quick review. 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 24 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-info"> 
                                  <i class="fa fa-bell-o">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> Web server hardware needs to be upgraded. 
                                  <span class="label label-sm label-warning"> Overdue 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 2 hours 
                            </div>
                          </div>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-default"> 
                                    <i class="fa fa-briefcase">
                                    </i> 
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> IPO Report for year 2013 has been released. 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                              <div class="date"> 20 mins 
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                      <h3 class="list-heading">System
                      </h3>
                      <ul class="feeds list-items">
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-info"> 
                                  <i class="fa fa-check">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 4 pending tasks. 
                                  <span class="label label-sm label-warning "> Take action 
                                    <i class="fa fa-share">
                                    </i> 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> Just now 
                            </div>
                          </div>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-danger"> 
                                    <i class="fa fa-bar-chart-o">
                                    </i> 
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> Finance Report for year 2013 has been released. 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                              <div class="date"> 20 mins 
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-default"> 
                                  <i class="fa fa-user">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 5 pending membership that requires a quick review. 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 24 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-info"> 
                                  <i class="fa fa-shopping-cart">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> New order received with 
                                  <span class="label label-sm label-success"> Reference Number: DR23923 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 30 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-success"> 
                                  <i class="fa fa-user">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> You have 5 pending membership that requires a quick review. 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 24 mins 
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="col1">
                            <div class="cont">
                              <div class="cont-col1">
                                <div class="label label-sm label-warning"> 
                                  <i class="fa fa-bell-o">
                                  </i> 
                                </div>
                              </div>
                              <div class="cont-col2">
                                <div class="desc"> Web server hardware needs to be upgraded. 
                                  <span class="label label-sm label-default "> Overdue 
                                  </span> 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col2">
                            <div class="date"> 2 hours 
                            </div>
                          </div>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-info"> 
                                    <i class="fa fa-briefcase">
                                    </i> 
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> IPO Report for year 2013 has been released. 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                              <div class="date"> 20 mins 
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                    <div class="page-quick-sidebar-settings-list">
                      <h3 class="list-heading">General Settings
                      </h3>
                      <ul class="list-items borderless">
                        <li> Enable Notifications
                          <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li> Allow Tracking
                          <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li> Log Errors
                          <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li> Auto Sumbit Issues
                          <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li> Enable SMS Alerts
                          <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                      </ul>
                      <h3 class="list-heading">System Settings
                      </h3>
                      <ul class="list-items borderless">
                        <li> Security Level
                          <select class="form-control input-inline input-sm input-small">
                            <option value="1">Normal
                            </option>
                            <option value="2" selected>Medium
                            </option>
                            <option value="e">High
                            </option>
                          </select>
                        </li>
                        <li> Failed Email Attempts
                          <input class="form-control input-inline input-sm input-small" value="5" />
                        </li>
                        <li> Secondary SMTP Port
                          <input class="form-control input-inline input-sm input-small" value="3560" />
                        </li>
                        <li> Notify On System Error
                          <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li> Notify On SMTP Error
                          <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                      </ul>
                      <div class="inner-content">
                        <button class="btn btn-success"> 
                          <i class="icon-settings">
                          </i> Save Changes
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- END QUICK SIDEBAR -->
          </div>
          <!-- END CONTAINER -->
          
        </div>

        <script type="text/javascript">

         //var DP=jQuery.noConflict();

        // // DP(function(){     
        // //     // Form Validation 
        // //     // DP("#coupon_form").validate({
        // //     //         rules: {                       
        // //     //            txtCouponcode:{
        // //     //                 required:true,
        // //     //                 remote: {
        // //     //                     url: "<?php //echo base_url(); ?>head/generate_coupon/checkCouponCode",
        // //     //                     type: "POST",
        // //     //                         data:{
        // //     //                             txtCouponcode: function(){
        // //     //                               return DP("#txtCouponcode").val();
        // //     //                           }
        // //     //                         }
        // //     //                     }
        // //     //             }                        
        // //     //         },
        // //     //         messages: 
        // //     //         {                        
        // //     //             txtCouponcode:
        // //     //             {
        // //     //                 required:"Please Enter Coupon Code",
        // //     //                 remote: DP.format("{0} is already in use")
        // //     //             }
        // //     //         }
        // //     //     });                    
        // // });

         function show_validity_input(value)
         {
                 if(value=='validity')
                 {
                       document.getElementById('validity_div').style.display="block";    

                       document.getElementById("txtValidityindays").required = true;                   
                 }
                 else
                 {
                      document.getElementById('validity_div').style.display="none";

                      document.getElementById("txtValidityindays").required = false;
                 }
         }


          $("#coupon_form").validate({
            ignore : "",
          rules:{             
              selPackagetypeid:{
                  required:true
              },              
              txtCouponcode: {
                  required:true,
                  remote:
                  {
                          url:"<?php echo base_url();?>head/coupon/verifyCoupon",
                          type:"POST",
                          data:
                          {
                                txtCouponcode:function()
                                {
                                       return $("#txtCouponcode").val().trim()
                                }       
                          }  
                  }
              },
              txtDescription:{
                  required:true,
                  minlength:8
              },              
              txtNoofcustomer: {
                  required:true
              },
              txtCustomername:{
                  required:true
              },              
              txtMobileno: {
                  required:true
              },
              txtEmailid: {
                  required:true
              },
              txtStartdate:
              {
                  required:true
              },
              txtEnddate:
              {
                  required:true
              },
              txtUsagelimit:
              {
                  required:true
              },
              optradio:
              {
                  required:true
              }
          },
          errorPlacement:
          function(error, element){
              if(element.is(":radio")){ 
                  error.appendTo(element.parent().parent());
          }else{ 
                  error.insertAfter(element); 
               }
          },
          messages:{                      
              selPackagetypeid:{
                  required:"Please select package type"
              },              
              txtCouponcode: {
                  required:"Please enter coupon code",
                  remote:jQuery.validator.format("Coupon code already exists")
              },
              txtDescription:{
                  required:"Please enter description"
              },              
              txtNoofcustomer: {
                  required:"Please enter no of customer"
              },
              txtCustomername:{
                  required:"Please enter customer name"
              },              
              txtMobileno: {
                  required:"Please enter mobile no"
              },
              txtEmailid: {
                  required:"Please enter email id"
              },
              txtStartdate:
              {
                  required:"Please enter start date"
              },
              txtEnddate:
              {
                  required:"Please enter end date"
              },
              txtUsagelimit:
              {
                  required:"Please enter usage limit"
              },
              optradio:
              {
                  required:"Please select usage limit"
              }
          }
        });


          function checkValidation(type)
          {
                   if(type=='restrict_customer')
                   {

                   }
                   else
                   {
                        
                   } 
          }


        </script>