<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <div align="right">
                <a href="<?php echo SITEURL;?>admin/control-chef.php" class="btn-add">Chef</a>
                <a href="<?php echo SITEURL;?>admin/restaurant_info.php" class="btn-add">Restaurant Info</a>
                <a href="<?php echo SITEURL;?>admin/why_us.php" class="btn-add">Why Us</a>
            </div>
            <br>
            <br>
            <h1>Images</h1>
            <br>
            <br>

            <?php 
        
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                
            
            ?>
            <br>

            <!-- Button to Add category -->
            <a href="<?php echo SITEURL;?>admin/restaurant-image-add.php" class="btn-add">Add Image</a>
            <br>
            <br>
            <br>

            <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Active</th>
                    
                </tr>

                <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM rt_image";

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
                            $im_id = $row['im_id'];
                            $image_name = $row['image_name'];
                            $active = $row['active'];

                            ?>

                            <tr>
                                
                                <td><?php echo $im_id; ?>. </td>
                                <td>
                                    
                                    <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
                                                    
                                            <img src="<?php echo SITEURL; ?>images/rt_img/<?php echo $image_name; ?>" width="100px" >
                                                    
                                            <?php
                                        }
                                        else
                                        {
                                            //DIsplay the MEssage
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                        ?>

                                </td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/restaurant-image-delete.php?id=<?php echo $im_id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Image</a>
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
                            <td colspan="6"><div class="error">No Image Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>

            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>