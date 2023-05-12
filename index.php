<?php 
require_once("category.php");
require_once("dao/PostDao.php");
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font_awesome/css/all.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>VietPhapLibrary</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="container justify-content-between">
                <a id="logo" href="">
                    <img src="assets/images/logo1.png" alt="" >
                </a>
                <!-- End Logo -->
                 <form method="POST" id="search">
                    <input type="text" name="query" placeholder="Nhập thông tin cần tìm....">
                    <button name="sub"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="container">
                <nav>
                    <ul id="main-menu" class="d-flex">
                        <li><a href="">Trang chủ</a></li>
                        <?php 
                            $list = listCategory();
                            foreach($list as $l){
                                echo '
                                    <li><a href="list.php?id='.$l['id'].'">'.$l['name'].'</a></li>
                                ';
                            }
                            
                        ?>
                        <li><a href="">Sự kiện</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <?php 
                            if (isset($_SESSION['login'])) {
                                echo'<li><a href="logout.php">Đăng xuất</a></li>';
                                echo'<li><a href="postUser.php">Post bài viết</a></li>';
                            }
                            else{
                                echo'<li><a href="login.php">Đăng nhập</a></li>';
                            }
                        ?>
                        
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ------ End content----- -->
         <div id="wp-featured-post" class="container">
            <div class="box featured-post">
                <div class="box-head">
                    <h3>Sách nổi bật</h3>
                </div>
                <div class="box-body">
                    <ul class="list-featured-post d-flex justify-content-between">
                        <?php 
                            $lists = selectTopThreeNoAcept();
                            if(isset ($_POST['sub'])){
                                $lists = searchInHome($_POST['query']);
                                if(sizeof($list) == 0){
                                    echo '<h3>không có bản ghi nào</h3>';
                                }
                            }
                            foreach($lists as $ls){
                                echo '
                                     <li>
                                    <a href=" " class="post-thumb">
                                        <img style="width:300px;height:200px;" src="'.$ls['image'].'" alt=" ">
                                    </a>
                                    <a href="chitiet.php?id='.$ls['id'].'" class="post-title">'.$ls['title'].'</a>
                                    </li>
                                ';
                            }
                        ?>
                       
    
                    </ul>
                </div>
            </div>
        </div>

    <!-- -- End wp-content -- -->
        <div id="wp-content" class="container">
        <div id="content">
            <div class="box new-post">
                <div class="box-head">
                    <h3>Tin sách mới</h3>
                </div>
                <div class="box-body">
                    <ul class="list-post">
                       <?php 

                    $post = getTopPostHomeNoAcept();
                    foreach($post as $p){
                        echo '
                        <li>
                            <a href="" class="post-thumb">
                                <img style="width:300px;heigt:auto;" src="'.$p['image'].'" alt=" ">
                            </a>
                            <div class="more-info">
                                <a href="chitiet.php?id='.$p['id'].'" class="post-title">'.$p['title'].'</a>
                                <div class="post-published">
                                    <a href="" class="post-author">'.$p['name'].'</a>
                                    <span class="post-date">'.$p['createddate'].'</span>
                                </div>
                                <p class="post-excerpt">
                                    '.$p['description'].'
                                </p>
                            </div>
                        </li>
                        ';
                    }
                ?>
                    </ul>
                </div>
            </div>
        </div>


    <!-- ----****/// -->
    <div id="sidebar">
        
        <div class="box top-topic">
            <div class="box-head">
                <h3>Chủ đề quan tâm</h3>
            </div>
            <div class="box-body">
                <ul class="list-topic">
                    <li>
                        <a href=""> Học bổng <span class="num-post">20</span></a>
                    </li>
                    <li>
                        <a href=""> Lịch thi <span class="num-post">10</span></a>
                    </li>
                    <li>
                        <a href=""> Sự kiện <span class="num-post">15</span></a>
                    </li>
                    <li>
                        <a href=""> Hoạt động <span class="num-post">12</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ----- end sidebar---- -->
</div> 

    <!-- End header -->
    
    <!-- <----- End featured-post -->
     
        <div id="footer">
            <div class="container">
                <div class="box logo-footer">
                    <div class="box-head">
                        <h3>MAEL</h3>
                    </div>
                    <div class="box-body">
                        <a href=" ">
                            <img src="assets/images/logo1.png" alt=" ">
                        </a>
                    </div>
                </div>
                <div class="box about-us">
                    <div class="box-head">
                        <h3>Về chúng tôi</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            Sinh viên Việt-Pháp K65
                        </p>
                        <a href="https://www.facebook.com/n.theanh2911">Thế Anh<br></a>
                        <a href="https://www.facebook.com/Z.Pay.Destroy">Trung Hiếu<br></a>
                        <a href="https://www.facebook.com/inh.tue.1">Tuệ Minh<br></a>
                        <a href="https://www.facebook.com/tung.nguyenthanhtung.967">Thanh Tùng</a>
                    </div>
                </div>
                <div class="box follow-us">
                    <div class="box-head">
                        <h3>Theo dõi</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-social d-flex">
                            <li>
                                <a href="https://www.facebook.com/n.theanh2911/"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/watch?v=Ym9s6xUcwcI&ab_channel=InsertBruh/"><i class="fab fa-youtube"></i></a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- End footer -->
         <div id="wp-copyright">
            <div class="container justify-content-between">
                
                <ul id="footer-menu" class="d-flex">
                    <li><a href="https://www.facebook.com/n.theanh2911/">Liên hệ</a></li>                   
                    <li><a href="https://scontent.fhan5-7.fna.fbcdn.net/v/t1.15752-9/292023417_595540568852125_1380051771131751342_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=ae9488&_nc_ohc=99sKwGcXQH0AX9mUFol&tn=3HC-sYsjDedMhcep&_nc_ht=scontent.fhan5-7.fna&oh=03_AVLhPxs5NzX7tl5OLGxE4O0Svn_NwpQ36i8dt2nVpjrHIw&oe=62FC1ABA">Quảng cáo</a></li>
                </ul>
            </div>

        </div>
        <!-- End copyright -->
    </div>

</body>

</html> 
