<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<div style= "text-align:left" >
  <div class="">
    <img src="./images/tooth.jpg" alt="tooth">
    <h1 style="background-color:#182C39; color:white; text-align:center">WELCOME TO THE TOOTH FIXER!!!</h1>
 <p style="color:#182C39; font-size:18px; text-align:center ">Please book which date you will be coming for consultation, else you wont get any assistance
    Thank you:)</p>
  </div>
</div>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                    $bus_per_page = 3;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'] ;
                    }
                    else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    }
                    else {
                        $page_1 = ($page * $bus_per_page) - $bus_per_page;
                    }

                    $query = "SELECT *  FROM  posts";
                    $bus_count = mysqli_query($connection,$query);
                    $count = mysqli_num_rows($bus_count);

                    $count = ceil($count / $bus_per_page) ;

                    $query = "SELECT * FROM posts LIMIT $page_1,$bus_per_page";
                    $select_all_posts_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_id = $row['post_id'];

                        if ($post_date > date('Y-m-d')) {
                            # code...

                        ?>

                        <!-- <h1 class="page-header">
                        Company's Name
                        <small>Company's Name</small>
                        </h1> -->

                        <!-- First Blog Post -->

                        <!-- <?php echo $count; ?> -->
                      
                        <hr>
                        <br><br>
                    <?php } } ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


        <ul class="pager">
            <?php
                for ($i=1; $i <= $count; $i++) {
                    if($i !== $page) {
                        echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                    }
                    else {
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";
                    }
                    //echo $page;
                }

            ?>
        </ul>


<?php include "includes/footer.php"; ?>
