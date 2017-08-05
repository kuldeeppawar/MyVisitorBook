<?php

//function to get a particular vendor type

function breadcrumbs($separator = ' &raquo; ', $home = 'Dashboard') 
{    
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $base_url = ('http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = array("<a href=\"$base_url\">$home</a>");
 
    $last = end(array_keys($path));
 
    foreach ($path AS $x => $crumb) {
        $title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
        if ($x != $last){
            $breadcrumbs[] = '<a href="$base_url$crumb">$title</a>';
        }else{
            $breadcrumbs[] = $title;
        }
    }
 
    return implode($separator, $breadcrumbs);
}

function getAllUserMobileno($id='')
{	
    $CI =& get_instance();
    $CI->load->model('siteadmin/users_model');

    $r = $CI->users_model->getallmobileno();


   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
            if($r[$i]->email!='')
            {
                $email=' -&nbsp;'.$r[$i]->email;
            }
            else if($r[$i]->firstname!='')
            {
                $email=' -&nbsp;'.$r[$i]->firstname.' '.$r[$i]->lastname;   
            }
            else
            {
                $email='';   
            }
           ?>
            <option value='<?php echo $r[$i]->id;?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->mobile.$email;?></option>
            <?php
        }        
    }
    else 
    {  ?>
        <option value='' disabled >No Mobile Nos.</option>
    <?php  
    }    
}

function getAll_Menu($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/menu_model');

    $r = $CI->menu_model->getAllMenu();
    echo "<option value='0'>-Select Menu-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}
function getAllCategory($id='')
{
    $CI =& get_instance();
    $CI->load->model('category/category_model');

    $r = $CI->category_model->getAllCategory();
    echo "<option value='0'>-Select Category-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}

function getAllSubCategory($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/category_model');

    $r = $CI->category_model->getAllSubCategory();
    echo "<option value='0'>-Select Sub Category-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}
//Used in Warehouse Model
function getAllState($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/state_model');

    $r = $CI->state_model->getall();

    if($CI->session->userdata('admin_city'))
    {
         if(preg_match('/,/',$CI->session->userdata('admin_city')))
        {
                 $explode_city=explode(',',$CI->session->userdata('admin_city'));

                //  if(count($explode_city)>1)
                // {
                //     $temp=array();
                //     for($j=0;$j<count($explode_city);$j++)
                //     {
                //         $array_push = $CI->state_model->getallStateById($explode_city[$j]);
                //         $temp=array_merge($temp,$array_push);
                //     }
                //     $r=$temp; 
                // }
                 $r=$CI->state_model->getallStateById($CI->session->userdata('admin_city'));
         }
        else
        {
                    $array_push=$CI->state_model->getallStateById($CI->session->userdata('admin_city'));
                    $r=$array_push;
        }        
    }


    echo "<option value=''>-Select State-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo ucwords(strtolower($r[$i]->name));?></option>
            <?php
        }
    }
    
}
//Used in Warehouse Model
function getAllCity($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/city_model');

    $r = $CI->city_model->getall();
   
    if($CI->session->userdata('admin_city'))
    {
        if(preg_match('/,/',$CI->session->userdata('admin_city')))
        {
                $explode_city=explode(',',$CI->session->userdata('admin_city'));
            
                if(count($explode_city)>=1)
                {
                    $temp=array();
                    for($j=0;$j<count($explode_city);$j++)
                    {
                        $array_push=$CI->city_model->getAllCityById($explode_city[$j]);
                        $temp=array_merge($temp,$array_push);
                    }
                    $r=$temp;
                }
        }
        else
        {
            $array_push=$CI->city_model->getAllCityById($CI->session->userdata('admin_city'));
            $r=$array_push;
        }        
    }

    echo "<option value=''>---Select City---</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }   
}

function getallemployeecity()
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/city_model');

    $r = $CI->city_model->getallemployeecity();

    echo "<option value=''>---Select City---</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>'><?php echo $r[$i]->name;?></option>
            <?php
        }
    }   
}    

//Used in Warehouse Model
function getAllLocation($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/location_model');

    $r = $CI->location_model->getall();
    echo "<option value=''>-Select Location-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}
//Used in Warehouse Model (Edit Warehouse)
function getAllCityStateWise($id, $state_id='')
{
    
     $CI =& get_instance();
    $CI->load->model('siteadmin/city_model');

    $r = $CI->city_model->getallstatewisecity($state_id);

   
    if($CI->session->userdata('admin_city'))
    {
        if(preg_match('/,/',$CI->session->userdata('admin_city'))) 
        {
                $explode_city=explode(',',$CI->session->userdata('admin_city'));
            
                if(count($explode_city)>=1)
                {
                    $temp=array();
                    for($j=0;$j<count($explode_city);$j++)
                    {
                        $array_push=$CI->city_model->getAllCityWiseById($explode_city[$j],$state_id);
                        $temp=array_merge($temp,$array_push);
                    }
                    $r=$temp;
                }
        }
        else
        {
            $array_push=$CI->city_model->getAllCityWiseById($CI->session->userdata('admin_city'),$state_id);
            $r=$array_push;
        }        
    }

    echo "<option value=''>-Select City-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    } 



    
}
//Used in Warehouse Model (Edit Warehouse)
function getAllLocationCityWise($id, $city_id)
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/city_model');

    $r = $CI->city_model->getLocationByCity($city_id);
    echo "<option value=''>-Select Location-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}
//Used in Vehicle Model
function getAllVehicleType($id='')
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/vehicle_type_model');

    $r = $CI->vehicle_type_model->getall();
    echo "<option value=''>----Select Vehicle Type----</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
}
function getAllBrands($id='')
{
    $CI =& get_instance();
    $CI->load->model('category/category_model');

    $r = $CI->brand_model->getAllBrands();
    echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id;?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->brand_name;?></option>
            <?php
        }
    }
    
}
function getAllBrandsStrict($id='')
{
    $CI =& get_instance();
    $CI->load->model('category/category_model');

    $r = $CI->brand_model->getAllBrands();
	$idArr=array();
	if($id!='')
	{
		$idArr=explode(',',$id);
	}
   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option <?php  if(in_array($r[$i]->id,$idArr)){echo 'selected';} ?> value='<?php echo $r[$i]->id;?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->brand_name;?></option>
            <?php
        }
    }
    
}


function getAllCities($id='')
{
    $CI =& get_instance();
    $CI->load->model('city/city_model');

    $r = $CI->city_model->getallcityfilter();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
			$val=str_pad($r[$i]->id,3,"0",STR_PAD_LEFT);
           ?>
            <option value='<?php echo 'CITY'.$val.'-'.$r[$i]->id;?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name	;?></option>
            <?php
        }
		
    }
	else 
	{  ?>
		<option value='' disabled > ----All Cities are mapped----</option>
	<?php  
	}
    
}

function getAllCategoryStrict($id='')
{
    $CI =& get_instance();
    $CI->load->model('brand/brand_model');

    $r = $CI->brand_model->getAllCategory();
    echo "<option value=''>---Select Category---</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->name;?></option>
            <?php
        }
    }
    
    
}

function getAllCitiesCheck($id='')
{ 
    $CI =& get_instance();
    $CI->load->model('city/city_model');
	
	$adminCities=array();
	if($id!='')
	{
		$adminString = $CI->employee_model->getCityAdmin($id);
     	$adminCities=explode(',',$adminString[0]->city);
	}
    $r = $CI->employee_model->getdeliverableCities();

	//echo '<pre>';print_r($r);die();
  
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {			
           ?>            
			<input <?php if(in_array($r[$i]->id,$adminCities)) { echo 'checked';} ?>			
			type="checkbox"  class="city" name="city[]" id="city[]" value="<?php echo $r[$i]->id; ?>" >&nbsp;&nbsp;<?php echo $r[$i]->name; ?>&nbsp;&nbsp;
            <?php
        }
		
    }    
}
function getAllWarehouseAdminCheck($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$adminWarehouses=array();
	if($id!='')
	{		
		$adminString = $CI->employee_model->getWarehouseAdmin($id);
     	$adminWarehouses=explode(',',$adminString[0]->warehouse);	
	}
	
    //$r = $CI->employee_model->getWarehouses();
	 $cities = $CI->employee_model->getWarehousesCities();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($cities))
    {   
        for($i=0;$i<count($cities);$i++)
        {

           ?>     			
			<div class="col-lg-10">
			 <h4><?php echo $cities[$i]->city; ?></h4>
			
			<?php 
			$r = $CI->employee_model->getWarehouses($cities[$i]->city);
			for($j=0;$j<count($r);$j++)
			{	
			?>
			<div class="col-lg-8">			  
			   <label class="form-control">
			  
			  <input <?php if(in_array($r[$j]->id,$adminWarehouses)) { echo 'checked';} ?>
				type="checkbox"  class="warehouseadmin" name="warehouseadmin[]" id="warehouseadmin[]" value="<?php echo $r[$j]->id; ?>" >&nbsp;&nbsp;<?php echo $r[$j]->warehouse_name; ?>&nbsp;&nbsp;	
				</label>
			</div>	
		<?php echo '<br>';}  ?>
			</div>
            <?php   
        }
		
    }    
}

function getAllWarehouseDelAdminCheck($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$adminDelWarehouses=array();
	if($id!='')
	{		
		$adminString = $CI->employee_model->getDelWarehouseAdmin($id);
     	$adminDelWarehouses=explode(',',$adminString[0]->warehouse);	
	}
	
    //$r = $CI->employee_model->getWarehouses();
	$cities = $CI->employee_model->getWarehousesCities();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($cities))
    {
        for($i=0;$i<count($cities);$i++)
        {			
           ?>     			
			<div class="col-lg-10">
			 <h4><?php echo $cities[$i]->city; ?></h4>
	
			 <?php 
			$r = $CI->employee_model->getWarehouses($cities[$i]->city);
			
			for($j=0;$j<count($r);$j++)
			{	
			?>
			<div class="col-lg-8">			  
			   <label class="form-control">
				<input <?php if(in_array($r[$j]->id,$adminDelWarehouses)) { echo 'checked';} ?>
				type="checkbox" class="waredeladmin" name="warehousedeladmin[]" id="warehousedeladmin[]" value="<?php echo $r[$j]->id; ?>" >&nbsp;&nbsp;<?php echo $r[$j]->warehouse_name; ?>&nbsp;&nbsp;	
				</label>
			</div>			
			<?php echo '<br>';}  ?>
			</div>
            <?php
        }
		
    }    
}
function getAllWarehousepackagerCheck($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$packagers=array();
	if($id!='')
	{
	
		$adminString = $CI->employee_model->getpackagers($id);
     	$packagers=explode(',',$adminString[0]->warehouse);	
	}
	
    $r = $CI->employee_model->getWarehouses1();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {			
           ?>     			
			 <option <?php if(in_array($r[$i]->id,$packagers)) { echo 'selected';} ?>
			 value='<?php echo $r[$i]->id;?>' ><?php echo $r[$i]->warehouse_name;?></option>			
			
            <?php
        }
		
    }    
}
function getAllWarehousedellist($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$bulletDelivery=array();
	if($id!='')
	{			
		$adminString = $CI->employee_model->getBulletDelivery($id);
     	$bulletDelivery=explode(',',$adminString[0]->warehouse);	
	}
	
    $r = $CI->employee_model->getWarehouses1();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {			
           ?>     			
			 <option <?php if(in_array($r[$i]->id,$bulletDelivery)) { echo 'selected';} ?>
			 value='<?php echo $r[$i]->id;?>' ><?php echo $r[$i]->warehouse_name;?></option>	
			
            <?php
        }
		
    }    
}
function getAllBranchlist($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$branches=array();
	if($id!='')
	{		
		$adminString = $CI->employee_model->getBranches($id);
     	$branches=explode(',',$adminString[0]->customer);
	}
	
    $r = $CI->employee_model->getAllBranchStates();
   // echo "<option value=''>-Select Brand-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {			
           ?> 		
			<optgroup label="<?php echo ucfirst($r[$i]->name); ?>">		
		<?php  
			$branch = $CI->employee_model->getBranchByState($r[$i]->state_id);
			for($j=0;$j<count($branch);$j++)
			{
		?>
			<option <?php if(in_array($branch[$j]->id,$branches)) { echo 'selected';} ?> 
			 value='<?php echo $branch[$j]->id;?>' ><?php echo ucfirst($branch[$j]->name);?></option>	
		
	<?php	}   ?>
			</optgroup>
			
            <?php
        }
		
    }    
}
//Used in Slot Edit Model
function getAllWarehouseCityWise($id, $city_id)
{
    $CI =& get_instance();
    $CI->load->model('siteadmin/warehouse_model');

    $r = $CI->warehouse_model->getWarehouseByCity($city_id);
    echo "<option value=''>-Select Warehouse-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {
           ?>
            <option value='<?php echo $r[$i]->id?>' <?php if(isset($id) && $id!='' && $id==$r[$i]->id){ echo "selected"; } ?>><?php echo $r[$i]->warehouse_name;?></option>
            <?php
        }
    }
    
}

function getAllSubCategoryForProduct($id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->getAllSubcategoryByAjax($id);
    return $r;
}

function getAllBrandsForProduct($id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->getAllBrandsByAjax($id);
    return $r;
}

function getNutritionDetails($id,$product_id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->getNutritionDetails($id,$product_id);
    return $r;
}

function checkRelatedProductCategory($category_id,$product_id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->checkRelatedProductCategory($category_id,$product_id);
    return $r;
}

function checkRelatedProductSubCategory($subcategory_id,$product_id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->checkRelatedProductSubCategory($subcategory_id,$product_id);
    return $r;
}

function checkSimilarProductCategory($category_id,$product_id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->checkSimilarProductCategory($category_id,$product_id);
    return $r;
}

function checkSimilarProductSubCategory($subcategory_id,$product_id)
{
    $CI =& get_instance();
    $CI->load->model('product/product_model');

    $r = $CI->product_model->checkSimilarProductSubCategory($subcategory_id,$product_id);
    return $r;
}
//Used in slot promotion
    function getExtraItems($promo_id)
    {
        $CI = & get_instance();
        $CI->load->model("slot/slot_model");
        $result = $CI->slot_model->getExtraItems($promo_id);
        return $result;
                
    }
	
// Employee Module
function getAllWarehouseNormaldellist($id='')
{
    $CI =& get_instance();
    $CI->load->model('employee/employee_model');
	
	$normalDelivery=array();
	if($id!='')
	{			
		$adminString = $CI->employee_model->getNormalDelivery($id);
     	$normalDelivery=explode(',',$adminString[0]->warehouse);	
	}
	
    $r = $CI->employee_model->getWarehouses1();
   // echo "<option value=''>-Select Warehouse-</option>";
    if(count($r))
    {
        for($i=0;$i<count($r);$i++)
        {			
           ?>     			
			 <option <?php if(in_array($r[$i]->id,$normalDelivery)) { echo 'selected';} ?>
			 value='<?php echo $r[$i]->id;?>' ><?php echo $r[$i]->warehouse_name;?></option>	
			
            <?php
        }
		
    }    
}	

function getAllCityWiseLocation($city_id,$admin_id,$admin_group)
{
        $CI =& get_instance();
        $CI->load->model('employee/employee_model');
        
        $adminCities=array();

        if($admin_id!='')
        {
            if($admin_group=='7')
            {    
                    $adminString = $CI->employee_model->getnormaldeliverywiselocations($admin_id);
                    $adminCities=explode(',',$adminString[0]->locations);
            }
            else
            {
                    $adminString = $CI->employee_model->getbulletdeliverywiselocations($admin_id);
                    $adminCities=explode(',',$adminString[0]->locations);   
            }
        }


        $r = $CI->employee_model->getalllocationsbycity($city_id);


        //echo '<pre>';print_r($r);die();
      
        if(count($r))
        {
            for($i=0;$i<count($r);$i++)
            {           
               ?>            
                <option <?php if(in_array($r[$i]->id,$adminCities)) { echo 'selected';} ?>            
                class="city" name="city_wise_locations[]" id="city_wise_locations" value="<?php echo $r[$i]->id; ?>" ><?php echo $r[$i]->name; ?></option>
                <?php
            }
            
        }   
}

?>
