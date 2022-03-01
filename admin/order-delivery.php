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
                    <th>Delivery_address</th>
                    <th>food_id</th>
                    <th>food_quantity</th>
                    <th>total_price</th>
                    <th>Order Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM order_delivery";

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
                            $food_quantity = $row['food_quantity'];
                            $total_price = $row['total_price'];
                            $order_time = $row['order_time'];
                            $order_status = $row['order_status'];
                            ?>

                            <tr>
                                <td><?php echo $order_id; ?>. </td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $address; ?>. </td>
                                <td><?php echo $food_id; ?>. </td>
                                <td><?php echo $food_quantity; ?>. </td>
                                <td><?php echo $total_price; ?>. </td>
                                <td><?php echo $order_time; ?>. </td>
                                <td><?php echo $order_status; ?>. </td>
                                <td>
                                    
                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
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
