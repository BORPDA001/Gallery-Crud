<?php
$roots = $_SERVER["DOCUMENT_ROOT"]."/blog";
require_once "$roots/server/lib/functions.php";

?>
<header style="">
    <div class="container">
        <div class="header_content">
            <div class="logo_parent">
                <a href="http://localhost/blog/view/dashboard/home.php">Gallery</a>
            </div>
            <nav>
                <ul class="menu">

                    <li>
                        <?php
                            if (get_full_url()=="http://localhost/blog/view/dashboard/posts/index.php"){
                                ?>
                                <a href="http://localhost/blog/view/dashboard/posts/createPost.php">Create Post</a>
                                <?php
                            }else if (get_full_url()=="http://localhost/blog/view/dashboard/posts/createPost.php" ){
                                ?>
                                <a href="http://localhost/blog/view/dashboard/posts/index.php">MyPhoto</a>
                                <?php
                            }else{
                                ?>
                                <a href="http://localhost/blog/view/dashboard/posts/index.php">MyPhoto</a>
                                <?php
                            }
                        ?>


                    </li>
                    <li><a href="http://localhost/blog/view/dashboard/posts/visitList.php">wishList<p class="notification"></p></a></li>
                    <li><a href="http://localhost/blog/server/routes/web.php?action=logout&user_id=<?=$_SESSION['user']['id']; ?>" class="exit" data-user-id="<?=$_SESSION['user']['id']; ?>">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>