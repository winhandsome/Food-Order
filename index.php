    <?php include('partials-front/menu.php'); ?>

    <!-- Food Search Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food Search Section Ends Here -->

    <?php 
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                // MySQL //
                //Create SQL Query to Display Categories from Database
                // $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 6";
                //Execute the Query
                // $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                // $count = mysqli_num_rows($res);

                // SQLite //
                $sql = $db->query("SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 6");
                $count = $db->querySingle("SELECT COUNT(*) FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 6");
                // $res = $sql->fetchArray(SQLITE3_ASSOC);
                if($count>0){
                    //Categories Available
                    while($row=$sql->fetchArray(SQLITE3_ASSOC)){
                        //Get the values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether image is available or not
                                    if($image_name==""){
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else{
                                        //Image available
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
                else{
                    //Categories not available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // MySQL //
            //Getting Foods from database that are active and featured
            //SQL Query
            // $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 5";

    //         //Execute the Query
    //         $res2 = mysqli_query($conn, $sql2);

    //         //Count Rows
    //         $count2 = mysqli_num_rows($res2);

            // SQLite //
            $sql2 = $db->query("SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 5");
            $count2 = $db->querySingle("SELECT COUNT(*) FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 5");
            //Check whether food available or not
            if($count2>0){
                //Food available
                while($row=$sql2->fetchArray(SQLITE3_ASSOC)){
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                //Food Not available 
                echo "<div class='error'>Food not available.</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- Food Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>