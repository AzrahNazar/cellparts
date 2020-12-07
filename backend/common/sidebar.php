<?php
  $sql5 = "SELECT val FROM user WHERE user='$log'";

  $result5 = mysqli_query($conn,$sql5);
  
  $row5 = mysqli_fetch_array($result5);
    $val = $row5['val'];
?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <img src="images/logo.jpg" width="230" alt="">
      <!-- search form -->
      <!-- /.search form -->
    </div>      
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <?php
        if($val == 'admin'){
      ?>
      
      <li class="active">
        <a href="index.php">
          <i class="fa fa-edit"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="arrivals.php">
          <i class="fa fa-edit"></i> <span>New Arrivals</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="accessories.php">
          <i class="fa fa-edit"></i> <span>Cellphone Accessories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
    <?php } ?>

      <li>
        <a href="gallery_upload.php">
          <i class="fa fa-edit"></i> <span>Gallery</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="banner-txt.php">
          <i class="fa fa-edit"></i> <span>Add Main Banner</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="stock.php?subc=">
          <i class="fa fa-edit"></i> <span>Stock Details</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="stock_subcat.php">
          <i class="fa fa-edit"></i> <span>Stock Sub-Categories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>


      <li>
        <a href="pass-change.php">
          <i class="fa fa-edit"></i> <span>Change Password</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <?php
        if($val == 'admin'){
      ?>

      <li>
        <a href="users.php">
          <i class="fa fa-edit"></i> <span>User Accounts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="activate_account.php">
          <i class="fa fa-edit"></i> <span>Activate Accounts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="add_users.php">
          <i class="fa fa-edit"></i> <span>Add Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>

        <a href="dollar-rate.php">
          <i class="fa fa-edit"></i> <span>Add Dollar Rate</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
    <?php } ?>

      <li>
        <a href="add-bank.php">
          <i class="fa fa-edit"></i> <span>Add Bank</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="orders.php">
          <i class="fa fa-edit"></i> <span>Online Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <?php
        if($val == 'admin'){
      ?>

      <li>
        <a href="cus_feedback.php">
          <i class="fa fa-edit"></i> <span>Customer Feedback</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="change-email.php?id=<?php echo $eid; ?>">
          <i class="fa fa-edit"></i> <span>Change e-mail</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="add-number.php">
          <i class="fa fa-edit"></i> <span>Add Contact Number</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <?php } ?>

       <li>
         <a href="banner-bottom.php">
          <i class="fa fa-edit"></i> <span>Banner bottom</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="image-middle.php">
          <i class="fa fa-edit"></i> <span>Middle image</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="end-page-images.php">
          <i class="fa fa-edit"></i> <span>Page end image</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="category.php">
          <i class="fa fa-edit"></i> <span>Select Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="banner-top.php">
          <i class="fa fa-edit"></i> <span>Banner top right</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="bottom-right-img.php">
          <i class="fa fa-edit"></i> <span>Banner bottom right</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

    
    </ul>

    </section>

    <!-- /.sidebar -->

  </aside>