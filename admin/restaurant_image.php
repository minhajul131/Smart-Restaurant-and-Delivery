<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
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
            <a href="<?php echo SITEURL;?>admin/reataurant_image_add.php" class="btn-add">Add Image</a>
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