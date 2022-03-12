<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <h1>Orders Control</h1>
            <br>
            <br>
        
            <table class="table-full">
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Delivery Address</th>
                    <th>Food Id</th>
                    <th>Food Title</th>
                    <th>Food Quantity</th>
                    <th>Total Price</th>
                    <th>Order Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM order_delivery ORDER BY order_id DESC";

                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether we have data in database or not
                    if($count>0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $order_id = $row['order_id'];
                            $user_id = $row['user_id'];
                            $address = $row['address'];
                            $food_id = $row['food_id'];
                            $food_title = $row['food_title'];
                            $food_quantity = $row['food_quantity'];
                            $total_price = $row['total_price'];
                            $order_time = $row['order_time'];
                            $order_status = $row['order_status'];
                            ?>

                            <tr>
                                <td><?php echo $order_id; ?></td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $food_id; ?></td>
                                <td><?php echo $food_title; ?></td>
                                <td><?php echo $food_quantity; ?></td>
                                <td><?php echo $total_price; ?></td>
                                <td><?php echo $order_time; ?></td>
                                <td>
                                    <?php 
                                        if($order_status=="ordered"){
                                            echo "<label>$order_status</label>";
                                        }
                                        elseif($order_status=="accepted"){
                                            echo "<label style='color: orange'>$order_status</label>";
                                        }
                                        elseif($order_status=="packed"){
                                            echo "<label style='color: blue'>$order_status</label>";
                                        }
                                        elseif($order_status=="shipped"){
                                            echo "<label style='color: yellow'>$order_status</label>";
                                        }
                                        elseif($order_status=="delivered"){
                                            echo "<label style='color: green'>$order_status</label>";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    
                                    <a href="<?php echo SITEURL; ?>admin/order-delivery-update.php?order_id=<?php echo $order_id; ?>" class="btn-delete">Update Status</a>
                                </td>
                            </tr>
                                <?php

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No order Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>





            </table>
        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>
