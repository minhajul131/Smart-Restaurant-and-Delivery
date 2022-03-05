<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <div align="right">
                <a href="<?php echo SITEURL;?>admin/restaurant_info.php" class="btn-add">Restaurant Info</a>
                <a href="<?php echo SITEURL;?>admin/restaurant_image.php" class="btn-add">Restaurant Image</a>
                <a href="<?php echo SITEURL;?>admin/why_us.php" class="btn-add">Why Us</a>
            </div>
            <h1>Chef Control</h1>
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

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-category-found']))
                {
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }

                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            
            ?>
            <br>

            <!-- Button to Add category -->
            <a href="<?php echo SITEURL;?>admin/new-chef.php" class="btn-add">Add Chef</a>
            <br>
            <br>
            <br>

            <table class="table-full">
                    <tr>
                        <th>ID</th>
                        <th>Full name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>

                    <?php 

                        //Query to Get all Categories from Database
                        $sql = "SELECT * FROM table_chef";

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
                                $id = $row['id'];
                                $full_name = $row['full_name'];
                                $image_name = $row['image_name'];
                                $email = $row['email'];
                                $contact_number = $row['contact_number'];
                                $position = $row['position'];

                                ?>

                                    <tr>
                                        <td><?php echo $id; ?>. </td>
                                        <td><?php echo $full_name; ?></td>

                                        <td>

                                            <?php  
                                                //Chcek whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/chef/<?php echo $image_name; ?>" width="100px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>

                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $contact_number; ?></td>
                                        <td><?php echo $position; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-chef.php?id=<?php echo $id; ?>" class="btn-update">Update Chef</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-chef.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Chef</a>
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
                                <td colspan="6"><div class="error">No Chef Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>