<?php
require 'header.php';
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div>
          <div>
            <h3 class="font-weight-bold"><p id="greeting" style="display: inline;
    font-size: 1.6rem;
    margin-bottom: 0.5rem;
    line-height: 1.3rem;"></p> <?php echo $_SESSION['admin'] ?></h3>
            <h6 class="font-weight-normal mb-0">Glad to have you back </h6>
            <?php
            if (isset($_GET['query'])) {
            ?>
              <h1>Cutomer's Query</h1>
              <table style="width:100%;margin:50px 0px;">
                <th>Query ID</th>
                <th>Cutomer Name</th>
                <th>Customer Email</th>
                <th>Cutomer Mobile Number</th>
                <th>Cutomer Query</th>
                <th>Actions</th>
          </div>
          <div>
            <?php
              $queries = mysqli_query($con, "SELECT * FROM `customer_queries`");

              while ($qry = mysqli_fetch_assoc($queries)) {

            ?>
              <tr>
                <td><?php echo $qry['query_id'] ?></td>
                <td><?php echo $qry['customer_name'] ?></td>
                <td><?php echo $qry['cutomer_email'] ?></td>
                <td><?php echo $qry['customer_number'] ?></td>
                <td><?php echo $qry['query'] ?></td>
                <td><a href="index.php?close=<?php echo $qry['query_id'] ?>"> Close Query</a></td>
              </tr>
          <?php
              }
            }
            if (isset($_GET['close'])) {
              $id = $_GET['close'];

              $delete = mysqli_query($con, "DELETE FROM `customer_queries` WHERE query_id=$id");

              if ($delete) {
                echo '<script>swal("Query Closed", "😀", "success");
                      window.location.href=`index.php?query`</script>';
              } else {
                echo mysqli_error($con);
              }
            }
          ?>

          <?php
          if (isset($_GET['users'])) {

            $results_per_page = 5;
            $query = "SELECT * FROM user";
            $result = mysqli_query($con, $query);
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil($number_of_result / $results_per_page);
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }

            $page_first_result = ($page - 1) * $results_per_page;

            $query = "SELECT * FROM user LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($con, $query);
          ?>

            <div style="display: block;">
              <br>
              <h2>Website Users</h1>
              <a href="update_user.php" style="font-size: 25px; float:right;margin:20px;">Add User</a>
                <table style="width:100%;margin:50px 0px;">
                  <th>User id</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Actions</th>
                  <?php
                  while ($user = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $user['u_id'] ?></td>
                      <td><?php echo $user['u_name'] ?></td>
                      <td><?php echo $user['email'] ?></td>
                      <td><?php echo $user['name'] ?></td>
                      <td><a href="update_user.php?update=<?php echo $user['u_id'] ?>">Update</a>&nbsp;
                        <a href="update_user.php?delete=<?php echo $user['u_id'] ?>" onclick="return confirm('You sure?')">Delete</a>
                      </td>
                      <td></td>
                    </tr>

                  <?php
                  }

                  ?>

                </table>
                <div id="pagination">

                <?php
                $tot_page = mysqli_query($con, "SELECT * FROM user");
                $tot_record = mysqli_num_rows($tot_page);
                $record_per_page = ceil($tot_record / $results_per_page);
                if (isset($_GET['page'])) {
                  if ($_GET['page'] > 1) {
                    $page = $_GET['page'];
                    echo '<a href="index.php?users&page=' . ($page - 1) . '">PREV</a>';
                  }
                }
                for ($i = 1; $i <= $record_per_page; $i++) {
                  echo '<a href="index.php?users&page=' . $i . '">' . $i . '</a>';
                }
                if (isset($_GET['page'])) {
                  if ($_GET['page'] < $record_per_page) {
                    $page = $_GET['page'];
                    echo '<a href="index.php?users&page=' . ($page + 1) . '">NEXT</a>';
                  }
                }
              }
                ?>

                </div>
            </div>
          </div>

          <div style="width: 100%;">
            <?php
            if (isset($_GET['static_page'])) {

              $results_per_page = 5;
              $query = "SELECT * FROM user";
              $result = mysqli_query($con, $query);
              $number_of_result = mysqli_num_rows($result);
              $number_of_page = ceil($number_of_result / $results_per_page);
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              } else {
                $page = 1;
              }
  
              $page_first_result = ($page - 1) * $results_per_page;
  
              $query = "SELECT * from page LIMIT " . $page_first_result . ',' . $results_per_page;
              $result = mysqli_query($con, $query);
            ?>
              <h1>Website Pages</h1>
              <a href="static_page.php" style="font-size: 25px; float:right;margin:20px;">Add page</a>
              <div style="display: block;">
                <table style="width:100%;margin:50px 0px;">
                  <th>Page id</th>
                  <th>Page Name</th>
                  <th>Actions</th>
                  <?php
                  $pages = mysqli_query($con, "SELECT * from page");

                  while ($page = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $page['page_id'] ?></td>
                      <td><?php echo $page['page_name'] ?></td>
                      <td><a href="static_page.php?update=<?php echo $page['page_id'] ?>">Update</a>
                        &nbsp;<a href="static_page.php?delete=<?php echo $page['page_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                    </tr>
                <?php
                  }
                
                ?>

                </table>
              </div>
              <div id="pagination">

              <?php
                      $tot_page=mysqli_query($con,"SELECT * FROM page");
                      $tot_record=mysqli_num_rows($tot_page);
                      $record_per_page=ceil($tot_record/$results_per_page);
                      if(isset($_GET['page'])){
                      if($_GET['page']>1){
                        $page=$_GET['page'];
                        echo '<a href="index.php?static_page&page='.($page-1).'">PREV</a>';
                      }
                    }
                      for($i=1;$i<=$record_per_page;$i++){
                        echo '<a href="index.php?static_page&page='.$i.'">'.$i.'</a>';
                      }
                      if(isset($_GET['page'])){
                      if($_GET['page']<$record_per_page){
                        $page=$_GET['page'];
                        echo '<a href="index.php?static_page&page='.($page+1).'">NEXT</a>';
                      }
                    }
                  }
                
?>
          </div>


          <div style="width: 100%;">
            <?php
            if (isset($_GET['servies'])) {
            ?>
              <h1>Website Services</h1>
              <a href="service.php" style="font-size: 25px; float:right;margin:20px;">Add Service</a>
              <div style="display: block;">
                <table style="width:100%;margin:50px 0px;">
                  <th>Service id</th>
                  <th>Service Name</th>
                  <th>Service Content</th>
                  <th>Actions</th>
                  <?php
                  $pages = mysqli_query($con, "SELECT * from services");

                  while ($page = mysqli_fetch_assoc($pages)) {
                  ?>
                    <tr>
                      <td><?php echo $page['service_id'] ?></td>
                      <td><?php echo $page['service_name'] ?></td>
                      <td><?php echo $page['service_content'] ?></td>
                      <td><a href="service.php?update=<?php echo $page['service_id'] ?>">Update</a>
                        &nbsp;<a href="service.php?delete=<?php echo $page['service_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                    </tr>
                <?php
                  }
                }
                ?>

                </table>
              </div>


              <div style="width: 100%;">
                <?php
                if (isset($_GET['testimonials'])) {
                ?>


                  <h1>Website Testimonials</h1>
                  <a href="testimonial.php" style="font-size: 25px; float:right;margin:20px;">Add TesitiMonial</a>
                  <div style="display: block;">
                    <table style="width:100%;margin:50px 0px;">
                      <th>TesitiMonial id</th>
                      <th>TesitiMonial Name</th>
                      <th>TesitiMonial Content</th>
                      <th>TesitiMonial Author</th>
                      <th>Actions</th>
                      <?php
                      $pages = mysqli_query($con, "SELECT * FROM `testimonial`");

                      while ($page = mysqli_fetch_assoc($pages)) {
                      ?>
                        <tr>
                          <td><?php echo $page['testimonial_id'] ?></td>
                          <td><?php echo $page['testimonial_title'] ?></td>
                          <td><?php echo $page['testimonial_content'] ?></td>
                          <td><?php echo $page['testimonial_auth'] ?></td>
                          <td><a href="testimonial.php?update=<?php echo $page['testimonial_id'] ?>">Update</a>
                            &nbsp;<a href="testimonial.php?delete=<?php echo $page['testimonial_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>

                    </table>

                  </div>


                  <div style="width: 100%;">
                    <?php
                    if (isset($_GET['menus'])) {

                      $results_per_page = 5;
                      $query = "SELECT * FROM user";
                      $result = mysqli_query($con, $query);
                      $number_of_result = mysqli_num_rows($result);
                      $number_of_page = ceil($number_of_result / $results_per_page);
                      if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                      } else {
                        $page = 1;
                      }

                      $page_first_result = ($page - 1) * $results_per_page;

                      $query = "SELECT * FROM menu LIMIT " . $page_first_result . ',' . $results_per_page;
                      $result = mysqli_query($con, $query);
                    ?>


                      <h1>Website Menu's</h1>
                      <a href="menu.php" style="font-size: 25px; float:right;margin:20px;">Add Menu</a>
                      <div style="display: block;">
                        <table style="width:100%;margin:50px 0px;">
                          <th>Menu id</th>
                          <th>Menu Name</th>
                          <th>Menu Position</th>
                          <th>Actions</th>
                          <?php
                          while ($page = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td><?php echo $page['menu_id'] ?></td>
                              <td><?php echo $page['menu_name'] ?></td>
                              <td><?php echo $page['menu_position'] ?></td>
                              <td><a href="menu.php?update=<?php echo $page['menu_id'] ?>">Update</a>
                                &nbsp;<a href="menu.php?delete=<?php echo $page['menu_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                            </tr>
                          <?php
                          }
                          ?>
                        </table>
                        <div id="pagination">
                        <?php
                        $tot_page = mysqli_query($con, "SELECT * FROM menu");
                        $tot_record = mysqli_num_rows($tot_page);
                        $record_per_page = ceil($tot_record / $results_per_page);
                        if (isset($_GET['page'])) {
                          if ($_GET['page'] > 1) {
                            $page = $_GET['page'];
                            echo '<a href="index.php?menus&page=' . ($page - 1) . '">PREV</a>';
                          }
                        }
                        for ($i = 1; $i <= $record_per_page; $i++) {
                          echo '<a href="index.php?menus&page=' . $i . '">' . $i . '</a>';
                        }
                        if (isset($_GET['page'])) {
                          if ($_GET['page'] < $record_per_page) {
                            $page = $_GET['page'];
                            echo '<a href="index.php?menus&page=' . ($page + 1) . '">NEXT</a>';
                          }
                        }
                      }
                        ?>

                        </div>

                        <div style="width: 100%;">
                          <?php
                          if (isset($_GET['Products'])) {

                            $results_per_page = 5;
                            $query = "SELECT * FROM user";
                            $result = mysqli_query($con, $query);
                            $number_of_result = mysqli_num_rows($result);
                            $number_of_page = ceil($number_of_result / $results_per_page);
                            if (isset($_GET['page'])) {
                              $page = $_GET['page'];
                            } else {
                              $page = 1;
                            }

                            $page_first_result = ($page - 1) * $results_per_page;

                            $query = "SELECT * FROM `product` LIMIT " . $page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($con, $query);
                          ?>


                            <h1>Products</h1>
                            <div style="display: block;">
                              <a href="product.php" style="font-size: 25px; float:right;margin:20px;">Add Product</a>
                              <table style="width:100%;margin:50px 0px;">
                                <th>Product id</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product desc</th>
                                <th>Product price</th>
                                <th>Product category</th>
                                <th>Actions</th>
                                <?php
                                while ($page = mysqli_fetch_assoc($result)) {
                                ?>
                                  <tr>
                                    <td><?php echo $page['product_id'] ?></td>
                                    <td><?php echo $page['product_image'] ?></td>
                                    <td><?php echo $page['product_name'] ?></td>
                                    <td><?php echo $page['product_desc'] ?></td>
                                    <td><?php echo $page['product_price'] ?></td>
                                    <td><?php echo $page['product_category'] ?></td>
                                    <td><a href="product.php?update=<?php echo $page['product_id'] ?>">Update</a>
                                      &nbsp;<a href="product.php?delete=<?php echo $page['product_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                                  </tr>
                                <?php
                                }
                                ?>
                              </table>
                              <div id="pagination">
                              <?php
                              $tot_page = mysqli_query($con, "SELECT * FROM product");
                              $tot_record = mysqli_num_rows($tot_page);
                              $record_per_page = ceil($tot_record / $results_per_page);
                              if (isset($_GET['page'])) {
                                if ($_GET['page'] > 1) {
                                  $page = $_GET['page'];
                                  echo '<a href="index.php?Products&page=' . ($page - 1) . '">PREV</a>';
                                }
                              }
                              for ($i = 1; $i <= $record_per_page; $i++) {
                                echo '<a href="index.php?Products&page=' . $i . '">' . $i . '</a>';
                              }
                              if (isset($_GET['page'])) {
                                if ($_GET['page'] < $record_per_page) {
                                  $page = $_GET['page'];
                                  echo '<a href="index.php?Products&page=' . ($page + 1) . '">NEXT</a>';
                                }
                              }
                            }
                              ?>
                              </div>

                              <?php
                              if (isset($_GET['orders'])) {
                              ?>
                                <h1>Orders</h1>
                                <div style="display: block;">
                                  <table style="width:100%;margin:50px 0px;text-align:center;">
                                    <th>Order id</th>
                                    <th>User Name</th>
                                    <th>Mobile number</th>
                                    <th>Billing Address</th>
                                    <th>Shipping Address</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Total Ammount</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <?php
                                    $pages = mysqli_query($con, "SELECT * FROM `orders`");

                                    while ($page = mysqli_fetch_assoc($pages)) {
                                      $name = explode(",", $page['product_name']);
                                      $qty = explode(",", $page['product_quantity']);
                                    ?>
                                      <tr>
                                        <td><?php echo $page['order_id'] ?></td>
                                        <td><?php echo $page['username'] ?></td>
                                        <td><?php echo $page['number'] ?></td>
                                        <td><?php echo $page['billing_address'] ?></td>
                                        <td><?php echo $page['shipping_address'] ?></td>
                                        <td><?php echo implode('<p style="border-bottom:0px solid black;border-top:1px solid black;width: 125%;margin: -1px -13px;">', $name); ?></p></td>
                                        <td><?php echo implode('<p style="border-bottom:0px solid black;border-top:1px solid black;width: 120%;margin: -1px -13px;">', $qty); ?></p></td>
                                        <td><?php echo $page['tot_ammount'] ?></td>
                                        <td><?php echo $page['payment_mode'] ?></td>
                                        <td><a href="order.php?id=<?php echo $page['order_id'] ?>">Update Status</a></td>
                                      </tr>
                                  <?php
                                    }
                                  }
                                  ?>
                                  </table>
                                  <div style="width: 100%;">
                                    <?php
                                    if (isset($_GET['Categories'])) {
                                      $results_per_page = 5;
                                      $query = "SELECT * FROM user";
                                      $result = mysqli_query($con, $query);
                                      $number_of_result = mysqli_num_rows($result);
                                      $number_of_page = ceil($number_of_result / $results_per_page);
                                      if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                      } else {
                                        $page = 1;
                                      }
                          
                                      $page_first_result = ($page - 1) * $results_per_page;
                          
                                      $query = "SELECT * FROM `category` LIMIT " . $page_first_result . ',' . $results_per_page;
                                      $result = mysqli_query($con, $query);
                                    ?>
                                      <h1>Products Categories</h1>
                                      <a href="category.php" style="font-size: 25px; float:right;margin:20px;">Add Category</a>
                                      <div style="display: block;">
                                        <table style="width:100%;margin:50px 0px;">
                                          <th>Category id</th>
                                          <th>Category Title</th>
                                          <th>Category Name</th>
                                          <th>Category parent</th>
                                          <th>Actions</th>
                                          <?php
                                          while ($page = mysqli_fetch_assoc($result)) {
                                          ?>
                                            <tr>
                                              <td><?php echo $page['category_id'] ?></td>
                                              <td><?php echo $page['category_title'] ?></td>
                                              <td><?php echo $page['category_name'] ?></td>
                                              <td><?php echo $page['category_parent'] ?></td>
                                              <td><a href="category.php?update=<?php echo $page['category_id'] ?>">Update</a>
                                                &nbsp;<a href="category.php?delete=<?php echo $page['category_id'] ?>" onclick="return confirm('You sure?')">Delete</a></td>
                                            </tr>
                                        <?php
                                          }
                                        
                                        ?>

                                        </table>

                                        <div id="pagination">

                                        <?php
                                        $tot_page=mysqli_query($con,"SELECT * FROM category");
                                        $tot_record=mysqli_num_rows($tot_page);
                                        $record_per_page=ceil($tot_record/$results_per_page);
                                        if(isset($_GET['page'])){
                                        if($_GET['page']>1){
                                          $page=$_GET['page'];
                                          echo '<a href="index.php?Categories&page='.($page-1).'">PREV</a>';
                                        }
                                      }
                                        for($i=1;$i<=$record_per_page;$i++){
                                          echo '<a href="index.php?Categories&page='.$i.'">'.$i.'</a>';
                                        }
                                        if(isset($_GET['page'])){
                                        if($_GET['page']<$record_per_page){
                                          $page=$_GET['page'];
                                          echo '<a href="index.php?Categories&page='.($page+1).'">NEXT</a>';
                                        }
                                      }
                                    }
                                    
                                        ?>
                                      </div>
                                      <div style="width: 100%;">
                                        <?php
                                        if (isset($_GET['setting'])) {
                                            $setting=mysqli_query($con,"SELECT * FROM `settings`");
                                            $data=mysqli_fetch_assoc($setting);
                                        ?>


                                          <h1>Website Setting</h1>
                                          <a href="login.php?password" style="float: right;font-size:25px;">Change my Password</a>

                                          <form method="post" action="settings.php" enctype="multipart/form-data">

                                            <div class="mb-3">
                                           <strong>Select Logo--</strong><label for="profile" title="Select Logo">
                                              <img src="./upload/<?php echo $data['content'] ?>" alt="nooo" id="preview" >
                                              <input type="file" name="main-logo" id="profile" placeholder="Choose Profile" style="display:none;" onchange="Validate_image(this)" 
                                              value="Select Logo"></label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;  <button type="submit" onclick="return update_logo()" class="btn btn-success" name="logo-update">Update</button>
                                            </div>
                                            <div class="mb-3">
                                              <strong><label for="formFile">Update Copyrights</label></strong>
                                              <input class="form-control" type="text" id="copy-right" name="copyright" style="margin: 0px auto;" placeholder="Copy-Right"><br><button type="submit" class="btn btn-success" onclick="return update_copyright()" name="copyright-update">Update</button>
                                            </div>
                                            <div class="mb-3">
                                              <strong><label for="formFile">Update Title</label></strong>
                                              <input class="form-control" type="text" id="title" name="title" style="margin: 0px auto;" placeholder="Site Title">
                                            </div>

                                            <button type="submit" class="btn btn-success" name="title-update" onclick="return update_title()">Update</button>
                                          </form>

                                        <?php
                                        }
                                        ?>
                                        <div style="display: block;">

                                        </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            </body>
                            </html>