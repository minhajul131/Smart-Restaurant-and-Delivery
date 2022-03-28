<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <div align="right">
                <a href="<?php echo SITEURL;?>admin/control-chef.php" class="btn-add">Chef</a>
                <a href="<?php echo SITEURL;?>admin/restaurant-image.php" class="btn-add">Restaurant Image</a>
                <a href="<?php echo SITEURL;?>admin/restaurant_info.php" class="btn-add">Restaurant Info</a>
            </div>
            <br>
            <br>
            <h1>Why US</h1>
            <br>
            <br>

            <?php 
        
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br>

            <!-- Button to Add category -->
            <a href="<?php echo SITEURL;?>admin/why_us_add.php" class="btn-add">Add Info</a>
            <br>
            <br>

            <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Why title</th>
                    <th>Description</th>
                    
                </tr>
                <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM why_us";

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
                            
                            $why_title = $row['why_title'];
                            $why_description = $row['why_description'];
                            

                            ?>

                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $why_title; ?></td>
                                <td><?php echo $why_description; ?></td>
                                
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-whyUs.php?id=<?php echo $id; ?>" class="btn-update">Update Info</a>
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
                            <td colspan="6"><div class="error">No content Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>