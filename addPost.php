<?php 
require_once("category.php");
require_once("dao/PostDao.php");
session_start();
ob_start();
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
else if($_SESSION['login']['role'] != 'admin'){
header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
       
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

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trang chủ
                            </a>
                            <div class="sb-sidenav-menu-heading">chức năng</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                bài viết
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addPost.php">thêm bài viết</a>
                                    <a class="nav-link" href="allPost.php">quản lý bài viết</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                người dùng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        người dùng
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">đang đăng nhập</a>
                                            <a class="nav-link" href="register.html">bị khóa</a>
                                        </nav>
                                    </div>

                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">đăng nhập với:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <!-- nội dung -->
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="admin/assets/demo/chart-area-demo.js"></script>
        <script src="admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="admin/js/datatables-simple-demo.js"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
    
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    		insetPost($title, $content, $category_id, $image, $description,$createdBy);
    	}
    ?>
</html>
