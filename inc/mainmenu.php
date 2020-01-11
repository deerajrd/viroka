<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>



				<a class="navbar-brand" href="home.php"> Viroka </a>

            </div>

            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">


                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>

                    <ul class="dropdown-menu">

                        <li>

                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>

                        </li>

                        <li>

                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>

                        </li>

                        <li>

                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>

                        </li>

                        <li class="divider"></li>

                        <li>

                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

                        </li>

                    </ul>

                </li>

            </ul>

           





		   <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">

					<li class="active">

                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>

                    </li>



                    <?php 
                        $user_role = $_SESSION['user_role'];
                        if($_SESSION['user_role'] == '1'){ //Admin

                    ?>

	  

                    <li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#customer"><i class="fa fa-fw fa-user"></i> Manage Customers <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="customer" class="collapse">

                            <!--<li>

                                <a href="add_customers.php"> Add Customer </a>

                            </li>-->

                            <li>

                                <a href="manage_customers.php"> Manage Customer </a>

                            </li>

                        </ul>

                    </li>

					

					<li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#inventory"><i class="fa fa-fw fa-database"></i> Manage Inventory <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="inventory" class="collapse">

                            <li>

                                <a href="add_inventory.php"> Add Inventory </a>

                            </li>

                            <li>

                                <a href="manage_inventory.php"> Manage Inventory </a>

                            </li>

                        </ul>

                    </li>



                    <li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#team"><i class="fa fa-fw fa-users"></i> Manage Team <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="team" class="collapse">

                            <li>

                                <a href="add_employee.php"> Add New Team </a>

                            </li>

                            <li>

                                <a href="manage_employee.php"> Manage Team </a>

                            </li>

                        </ul>

                    </li>



                    <li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#supplier"><i class="fa fa-fw fa-cog"></i> Manage Supplier <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="supplier" class="collapse">

                            <li>

                                <a href="add_supplier.php"> Add Supplier </a>

                            </li>

                            <li>

                                <a href="manage_supplier.php"> Manage Supplier </a>

                            </li>

                        </ul>

                    </li>






                    

			<?php

				}

                else if($_SESSION['user_role'] == '2'){  //Sales Executive

			?>   


					<li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#customer"><i class="fa fa-fw fa-user"></i> Manage Customers <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="customer" class="collapse">

                            <li>

                                <a href="add_customers.php"> Add Customer </a>

                            </li>

                            <li>

                                <a href="manage_customers.php"> Manage Customer </a>

                            </li>

                        </ul>

                    </li>

                    <li>
                        <a href="add_order.php"><i class="fa fa-fw fa-shopping-cart"></i> New Order </a>
                    </li>

					
                     <li>
                        <a href="manage_orders.php"><i class="fa fa-fw fa-anchor"></i> My Orders(<?php
                            include("inc/connection.php");
                            $count_my_order = mysqli_query($con, "SELECT * FROM ordertable WHERE username = '$username'") or die(mysqli_error($con));
                            $count_my_order_row = mysqli_num_rows($count_my_order);

                            echo $count_my_order_row;
                            ?>) </a>
                    </li>



                      <li>

                        <a href="approved_items.php"><i class="fa fa-fw fa-check-circle"></i>Items Approved (<?php
                            include("inc/connection.php");
                            
                            //$count_app_order = mysqli_query($con, "SELECT * FROM payment_reason WHERE user_role='6' AND partbilling = 'Approve'") or die(mysqli_error($con));
							$count_app_order = mysqli_query($con, "SELECT * FROM `ordertable` INNER JOIN `payment_reason` ON `ordertable`.order_id = `payment_reason`.order_id WHERE `payment_reason`.partbilling = 'Approve' AND `ordertable`.username = '".$_SESSION['username']."' AND payment_reason.user_role = '6'") or die(mysqli_error($con));
                            $count_app_order_row = mysqli_num_rows($count_app_order);
							

                            echo $count_app_order_row;
                            ?>)</a>

                    </li>   

                      <li>

                        <a href="rejected_items.php"><i class="fa fa-fw fa-times-circle"></i>Items Rejected (<?php
                            include("inc/connection.php");
                            //$count_app_order = mysqli_query($con, "SELECT * FROM payment_reason WHERE partbilling = 'Dis-Approve'") or die(mysqli_error($con));
							$count_app_order = mysqli_query($con, "SELECT * FROM `ordertable` INNER JOIN `payment_reason` ON `ordertable`.order_id = `payment_reason`.order_id WHERE `payment_reason`.partbilling = 'Dis-Approve' AND `ordertable`.username = '".$_SESSION['username']."' ") or die(mysqli_error($con));
                            $count_app_order_row = mysqli_num_rows($count_app_order);

                            echo $count_app_order_row;
                            ?>)</a>

                    </li>   




        <?php
			}
		
			else if($_SESSION['user_role'] == '3'){  //Sales Manager view order, approve reject, report generate, partshipping allowed/not
        ?>

					 <li>

                        <a href="sm_manage_orders.php"><i class="fa fa-fw fa-shopping-cart"></i> View Orders</a>

                    </li>
                           
					

                  	
			
			
		<?php
			}
			
			else if($_SESSION['user_role'] == '4'){  //Banding Specialist view order, approve reject, report generate, partshipping allowed/not	
		?>	

					<li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class="fa fa-fw fa-shopping-cart"></i> Order Item <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="order" class="collapse">

                            <!-- <li>

                                <a href="add_order.php"> New Order </a>

                            </li> -->

                            <li>

                                <a href="brand_manage_orders.php"> View Orders </a>

                            </li>

                        </ul>

                    </li>
					
				
			
		<?php
			}
			else if($_SESSION['user_role'] == '5'){  //Tecnical  view order Item, approve reject
		?>
					
					<li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class="fa fa-fw fa-shopping-cart"></i> Order Item <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="order" class="collapse">

                            <!-- <li>

                                <a href="add_order.php"> New Order </a>

                            </li> -->

                            <li>

                                <a href="tech_manage_orders.php"> View Orders </a>

                            </li>

                        </ul>

                    </li>	
		
		<?php
			}
			
			else if($_SESSION['user_role'] == '6'){  //Accounts  view order Item, approve reject, Invoice generate.
		?>
		
					<li>

                        <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class="fa fa-fw fa-shopping-cart"></i> Order Item <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="order" class="collapse">

                            <!-- <li>

                                <a href="add_order.php"> New Order </a>

                            </li> -->

                            <li>

                                <a href="account_manage_orders.php"> View Orders </a>

                            </li>

                        </ul>

                    </li>
		
		<?php
			}
		?>
					
					<li>

                        <a href="ch_password.php"><i class="fa fa-fw fa-key"></i>Change Password</a>

                    </li>

					 <li>

                        <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>

                    </li>

                    







                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </nav>