<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Customer Review</h1>
        <br>
        <br>
        <table class="table-full">
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            <?php 

                //Query to Get all Categories from Database
                $sql = "SELECT * FROM testimonials";

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
                        $c_id = $row['c_id'];
                        $c_name = $row['c_name'];
                        $c_subject = $row['c_subject'];
                        $c_message = $row['c_message'];
                        

                        ?>
                        <tr>
                            <td><?php echo $c_name; ?>. </td>
                            <td><?php echo $c_subject; ?></td>
                            <td><?php echo $c_message; ?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>admin/user_review_delete.php?id=<?php echo $c_id; ?>" class="btn-delete">Delete Review</a>
                            </td>
                        </tr>
                        <?php

                    }
                }
                else
                    {
                      echo "No review";
                    }
                    
            ?>
        </table>
    </div>
</div>
<?php include('hd-ft/footer.php'); ?>