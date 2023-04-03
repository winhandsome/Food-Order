
<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 

                        // MySQL //
                        //Sql Query 
                        // $sql = "SELECT * FROM tbl_category";
                        // //Execute Query
                        // $res = mysqli_query($conn, $sql);
                        // //Count Rows
                        // $count = mysqli_num_rows($res);

                        // SQLite //
                        $sql = $db->query("SELECT * FROM tbl_category");
                        $count = $db->querySingle("SELECT COUNT(*) FROM tbl_category");
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        // MySQL //
                        //Sql Query 
                        // $sql2 = "SELECT * FROM tbl_food";
                        // //Execute Query
                        // $res2 = mysqli_query($conn, $sql2);
                        // //Count Rows
                        // $count2 = mysqli_num_rows($res2);
                    
                        // SQLite //
                        $sql2 = $db->query("SELECT * FROM tbl_food");
                        $count2 = $db->querySingle("SELECT COUNT(*) FROM tbl_food");
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        // MySQL //
                        //Sql Query 
                        // $sql3 = "SELECT * FROM tbl_order";
                        // //Execute Query
                        // $res3 = mysqli_query($conn, $sql2);
                        // //Count Rows
                        // $count3 = mysqli_num_rows($res2);
                    
                        // SQLite //
                        $sql3 = $db->query("SELECT * FROM tbl_order");
                        $count3 = $db->querySingle("SELECT COUNT(*) FROM tbl_order");
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        // MySQL //
                        //Create SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        // $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        // //Execute the Query
                        // $res4 = mysqli_query($conn, $sql4);

                        // //Get the VAlue
                        // $row4 = mysqli_fetch_assoc($res4);
                        
                        // SQLite //
                        $sql4 = $db->query("SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'");
                        $row4 = $sql4->fetchArray(SQLITE3_ASSOC);

                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>