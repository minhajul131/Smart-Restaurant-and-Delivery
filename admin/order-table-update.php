<?php include('hd-ft/header.php'); ?>

    <div class="manage">
        <div class = "wrapper">
            <h1>Update Order Status</h1>

            <?php 
                //Get ID of Admin
                $order_id=$_GET['order_id'];

                //SQL Query to Get data
                $sql="SELECT * FROM order_table WHERE order_id=$order_id";

                $res=mysqli_query($conn, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $order_id = $row['order_id'];
                        $order_status = $row['order_status'];
                        
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'admin/order-delivery.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Order ID: </td>
                        <td>
                            <?php echo $order_id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>
                            <select name="order_status">
                                <option <?php if($order_status=="ordered"){echo "selected";} ?> value="ordered">ordered</option>
                                <option <?php if($order_status=="pending"){echo "selected";} ?> value="pending">pending</option>
                                <option <?php if($order_status=="processing"){echo "selected";} ?> value="processing">processing</option>
                                <option <?php if($order_status=="delivered"){echo "selected";} ?> value="delivered">delivered</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <input type="submit" name="submit" value="Update status" class="btn-update">
                        </td>
                    </tr>
                </table>
                
            </form>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];

        //SQL Query to Update Admin
                
        $sql2 = "UPDATE order_table SET `order_id`='$order_id',
        `order_status`='$order_status' WHERE order_id='$order_id' ";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Check whether the query executed successfully or not
        if($res2==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/order-table.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/order-teble.php');
        }
    }

?>