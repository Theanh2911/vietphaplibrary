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
    <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
                <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>TinyMCE WYSIWYG Bootstrap</title>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script>
             tinymce.init({
               selector: 'textarea#editor', });
        </script>

    <title>Thêm bài viết</title>
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
                                echo'<li><a href="login.php">Đăng xuất</a></li>';
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
                    <h3>Thêm bài viết</h3>
                </div>
                
            </div>
        </div>
        <div id="layoutSidenav_content">
                <main style="margin: 20px 20px 0px 20px;">
                    <form id="mainform" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">tiêu đề bài viết</label>
                          <input type="text" class="form-control" id="inputEmail4" placeholder="tiêu đề" name="title">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="des">mô tả bài viết</label>
                          <textarea form="mainform" name="description" class="form-control" id="des"></textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputState">chọn danh mục</label>
                          <select id="inputState" class="form-control" name="category">
                            <?php 
                                $category = listCategory();
                                foreach($category as $c){
                                    echo '
                                        <option value='.$c['id'].'>'.$c['name'].'</option>
                                    ';
                                }
                            ?>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="img">chọn ảnh mô tả</label>
                          <input type="file" name="anh" id="img">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <label class="form-check-label" for="gridCheck">
                            nội dung bài viết
                          </label>
                        </div>
                      </div>
                     
                    </form>
                    <textarea id="editor" form="mainform" name="content"></textarea>
                     <button type="submit" class="btn btn-primary" form="mainform" name="submit">post bài</button>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
   
  
    
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
<?php 
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category'];
        $description = $_POST['description'];
        $thumuc = "images/";
        $image = $thumuc . basename($_FILES['anh']['name']);
        move_uploaded_file($_FILES["anh"]["tmp_name"], $image);
        $createdBy = $_SESSION['login']['username'];
        insetPostForUser($title, $content, $category_id, $image, $description,$createdBy);
        
    }
?>

</html> 
