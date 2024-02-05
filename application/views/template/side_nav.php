  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assests/theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><strong><?php echo $username; ?></strong></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="<?php echo site_url("welcome"); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>         
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url("createInvoive"); ?>"><i class="fa fa-circle-o"></i> Create Invoice</a></li>
            <li><a href="<?php echo site_url("invoice"); ?>"><i class="fa fa-circle-o"></i>View Invoice Report</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="<?php// echo site_url("invoice"); ?>"> <i class="fa fa-book"></i> <span>Invoice</span></a></li>         -->
        <?php
    
    // print_r($user_role);
    //  if($this->session->userdata('role') == 1)
    //  if(($user_role) == 1)
    //    {
      
      ?>
      <li><a href="<?php echo site_url("product"); ?>"> <i class="fa fa-shopping-cart"></i> <span>Product</span></a></li>        
        <li><a href="<?php echo site_url("customer"); ?>"> <i class="fa fa-user"></i> <span>Customer</span></a></li>        
        <li><a href="<?php echo site_url("invoice"); ?>"><i class="fa fa-file"></i><span>Invoice</span></a></li>
        <li><a href="<?php echo site_url("employee"); ?>"> <i class="fa fa-users"></i> <span>User</span></a></li>        
        <li><a href="<?php echo site_url("settings"); ?>"> <i class="fa fa-cog"></i> <span>Settings</span></a></li>        
        <?php 
            //} ?>
      </ul> 
      <!-- the above ul tag contain the entire content of sidebar  -->
    </section>
    <!-- /.sidebar -->
  </aside>