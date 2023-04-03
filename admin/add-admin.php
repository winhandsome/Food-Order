<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="full_name">

                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <!-- <input type="text" name="username" placeholder="Your Username"> -->
                        <input type="text" name="username">

                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <!-- <input type="password" name="password" placeholder="Your Password"> -->
                        <input type="password" name="password" >

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //check whether the username and password are filled in and username does not exists yet
    if (empty($full_name) || empty($username) || empty($password)) {
        $_SESSION['add'] = "<div class='error'>Please fill in the information.</div>";
        //Redirect Page to Add Admin
        redirect_to('add-admin.php');
    } 
    else {
        // $query_check = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username'");
        $query_check = $db->query("SELECT * FROM tbl_admin WHERE username = '$username'");
        $count = $db->querySingle("SELECT COUNT(*) FROM tbl_admin WHERE username = '$username'");
        if ($count > 0) {
            $_SESSION['add'] = "<div class='error'>username already exist!</div>";
            //Redirect Page to add Admin
            redirect_to('add-admin.php');
        } 
        else {
            //2. SQL Query to Save the data into database
            // $sql = "INSERT INTO tbl_admin SET 
            //     full_name='$full_name',
            //     username='$username',
            //     password='$password'";

            //3. Executing Query and Saving Data into Database
            // $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $sql = $db->query("INSERT INTO tbl_admin('full_name', 'username', 'password') 
            values('$full_name', '$username', '$password')");

            //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
            if ($sql == TRUE) {
                //Data Inserted
                //echo "Data Inserted";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
                //Redirect Page to Manage Admin
                redirect_to('manage-admin.php');
            } else {
                //FAiled to Insert DAta
                //echo "Failed to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
                //Redirect Page to Add Admin
                redirect_to('add-admin.php');
            }
        }
    }
}

?>