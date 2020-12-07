 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

      

	  <img src="images/logo.jpg" width="250" alt="">

	  

		  <!-- search form -->

    

      <!-- /.search form -->

      </div>

      

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        

        <li>

          <a href="index.php">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

        </li>

		  <?php

				

				//$sql="SELECT * FROM cat WHERE flag='1' ORDER BY cat ASC";
        $sql="SELECT * FROM cat ORDER BY cat ASC";

                $resultm=mysqli_query($conn,$sql);

				

				while ($row = mysqli_fetch_array($resultm)){ ?>

		

        <li class="treeview">

          <a href="#">

            <i class="fa fa-files-o"></i>

            <span><?php echo $row['cat']; ?></span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

		

          <ul class="treeview-menu">

		    			<?php

	$cosql3="SELECT * FROM scat WHERE ccode='".$row['ccode']."'";

	$coresult3=mysqli_query($conn,$cosql3);

	

	while ($row3 = mysqli_fetch_array($coresult3)){ ?>

            <li><a href="stock.php?subc=<?php echo $row3['sccode']; ?>"><?php echo $row3['subcat']; ?></a>

			</li>

           <?php } ?>

          </ul>

		  

        </li>

      <?php } ?>

      </ul>

	  

    </section>

    <!-- /.sidebar -->

 

  </aside>