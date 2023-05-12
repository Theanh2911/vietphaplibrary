<?php
require_once("dao/detail.php");
require_once("category.php");
require_once("dao/CommentDao.php");
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
    <link rel="stylesheet" type="text/css" href="css/comment.css">
    <title>WEB Tin Sách</title>




</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="container justify-content-between">
                <a id="logo" href="">
                    <img src="assets/images/logo1.png" alt="">
                </a>
                <!-- End Logo -->
                <form action=" " id="search">
                    <input type="text" name="q" placeholder="Nhập thông tin cần tìm....">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="container">
                <nav>
                    <ul id="main-menu" class="d-flex">
                        <li><a href="index.php">Trang chủ</a></li>
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
                        <li><a href="login.php">Đăng nhập</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ------ End content----- -->
        <div id="wp-featured-post" class="container ">
            <div class="box featured-post ">
                <div class="box-head ">
                    <?php 
                        $post = detailByPostId($_GET['id'])[0];
                        echo'
                            <a href="xuatban.html" title="Xuất bản" >Xuất bản </a>
                            <a href="sachhay.html" title="Xuất bản">Sách hay </a>
                            <h1>'.$post['title'].'</h1>
                            <div>
                                <a href="">'.$post['name'].'</a>
                                <span >'.$post['createddate'].'</span><br><br>
                                '.$post['content'].'
                            </div>
                        ';
                    ?>
                </div>


                </ul>
                <h3 style="margin-top:30px;">Tất cả bình luận</h3>
                 <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">

                         <?php 
                            $comment = getCommentByPostId($_GET['id']);
                            if(sizeof($comment)==0){
                                echo "không có bình luận";
                            }
                            foreach($comment as $cmt){
                                ?>
                            
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i><?=$cmt['createdBy']?></a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i><?=$cmt['createddate']?></a></li>
                                </ul>
                                <p><?=$cmt['content']?></p>
                                <?php 
                                    if($cmt['createdBy'] == $_SESSION['login']['username']){
                                        echo '<a href="deletecomment.php?id='.$cmt['id'].'">xóa bình luận</a>';
                                    }

                                ?>
                                
                        <?php } ?>

                        <p style="margin-top: 30px;"><b>viết bình luận của bạn</b></p>
                        
                        <form method="POST" id="cmts">
                            <textarea name="comment" form="cmts"></textarea>
                            <input type="submit" name="subs">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -- End wp-content -- -->


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
                        Tạp chí điện tử Tri thức trực tuyến
                        Tổng biên tập: Lưu Phước Nhân
                        Giấy phép bái chí: 54/GP do Bộ Thông tin và Truyền thông cấp ngày 25/05/2022
                        Địa chỉ tòa soạn: 741 Tạ Quang Bữu P4 Q8
                        Điện thoại: 0768-935-5xx.
                        Email: phuocnhanx29@gmail.com
                    </p>
                    <a href="Facebook.com/Ren.info29">Facebook.com/Ren.info29</a>
                </div>
            </div>
            <div class="box follow-us">
                <div class="box-head">
                    <h3>Theo dõi</h3>
                </div>
                <div class="box-body">
                    <ul class="list-social d-flex">
                        <li>
                            <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Ren.Info29/"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End footer -->
    <div id="wp-copyright">
        <div class="container justify-content-between">
            <p class="copyright">@Lưu Phước Nhân</p>
            <ul id="footer-menu" class="d-flex">
                <li><a href="https://www.facebook.com/Ren.Info29/">Liên hệ</a></li>
                <li><a href="">Bảo mật</a></li>
                <li><a href="">Quảng cáo</a></li>
            </ul>
        </div>

    </div>
    <!-- End copyright -->
    </div>
<?php 
    if(isset($_POST['subs'])){
        if(!isset($_SESSION['login'])){
            echo '<script language="javascript">';
            echo 'alert("hãy đăng nhập")';
            echo '</script>';
        }
        else{
            insertComment($_POST['comment'], $_SESSION['login']['username'], $_GET['id']);
        }
    }
?>
</body>

</html>