
<?php include('partials-front/menu.php'); ?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
                // MySQL //
                //Display all the categories that are active
                //Sql Query
                // $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                // //Execute the Query
                // $res = mysqli_query($conn, $sql);

                // //Count Rows
                // $count = mysqli_num_rows($res);

                // SQLite //
                $sql = $db->query("SELECT * FROM tbl_category WHERE active='Yes'");
                $count = $db->querySingle("SELECT COUNT(*) FROM tbl_category WHERE active='Yes'");
                //CHeck whether categories available or not
                if($count>0)
                {
                    //Categories Available
                    while($row=$sql->fetchArray(SQLITE3_ASSOC))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    //Categories Not Available
                    echo "<div class='error'>Category not found.</div>";
                }
            
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>