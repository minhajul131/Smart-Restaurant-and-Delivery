<?php include('hd-ft/header.php'); ?>

<?php
    if(isset($_POST['submit'])){
        //data from form
        $full_name = $_POST['full_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $errors = array();

        $u = "SELECT username FROM table_admin WHERE username = '$user_name' ";
        $uu = mysqli_query($conn, $u);

        $e = "SELECT email FROM table_admin WHERE email = '$email' ";
        $ee = mysqli_query($conn, $e);
        
        if(empty($user_name)){
            $errors['u']= "username required";
        }else if(mysqli_num_rows($uu)>0){
            $errors['u']= "username exits";
        }

        if(empty($email)){
            $errors['e']= "email required";
        }else if(mysqli_num_rows($ee)>0){
            $errors['e']= "email exits";
        }
        if(empty($password)){
            $errors['p']= "password required";
        }
        
        //sql quary
        if(count($errors)==0){
            $sql = "INSERT INTO table_admin ( `full_name`, `contact_number`, `email`, `username`, `password`, `role`) 
            VALUES ('$full_name','$contact_number','$email','$user_name','$password','$role')";

            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //Check whether data is inserted or not
            if($res==TRUE){
                    //Data Inserted
                    //echo "Data Inserted";
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
                    //Redirect Page to Manage Admin
                    header("location:".SITEURL.'admin/control-admin.php');
            }
            else
            {
                //FAiled to Insert DAta
                //echo "Faile to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
                //Redirect Page to Add Admin
                header("location:".SITEURL.'admin/new-admin.php');
            }
        }
    }

?>

<div class="manage">
    <div class = "wrapper">
        <h1>Admin Detail</h1>
        <br>
        <br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
            {
                echo $_SESSION['add']; //Display the Session Message if Set
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
        
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input type="text" name="contact_number" placeholder="Enter Your Number">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Your Email">
                        <p><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="user_name" placeholder="Enter Your username">
                        <p><?php if(isset($errors['u'])) echo $errors['u']; ?></p>
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                        <p><?php if(isset($errors['p'])) echo $errors['p']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <input type="text" name="role" placeholder="Enter Role">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('hd-ft/footer.php'); ?>