<?php
require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\controller\StudentController.php';
session_start();

$data = new StudenController();
$userId = $_SESSION['userId'];

if (!empty($userId)) {
  $courses = $data->getCourseById($userId);
  $detailUser = $data->getDetails(($userId));
}
if (isset($_GET['logout'])) {
  // Xóa toàn bộ session
  session_unset();

  // Xóa tất cả các cookie liên quan đến session (nếu có)
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  // Hủy session
  session_destroy();

  // Chuyển hướng đến trang login
  header("Location: login.php");
  exit();
}
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Document</title>
  <style>
    .bg-custom-1 {
      background-color: #85144b;
    }

    .bg-custom-2 {
      background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    }
  </style>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand ml-1 font-weight-bold text-success" href="#">LEARN CODE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav mr-auto mx-auto ">
          <li class="nav-item active ">
            <a class="nav-link mr-5 font-weight-bold" href="#">Home</a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link mr-5 font-weight-bold" href="#">About</a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link mr-5 font-weight-bold" href="#">Contact</a>
          </li>
        </ul>
        <?php
        if ($detailUser) {
          // Nếu $detailUser có giá trị, ẩn nút đăng nhập
          ?>
          <!-- <span class="font-weight-bold">Welcome,
            <?php echo $detailUser['name']; ?>
          </span> -->

          <div class="btn-group ml-10" style="    padding-right: 80px;">
            <button type="button" class="btn btn-danger">Action</button>
            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
              aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php">Log out</a></li>
            </ul>
          </div>

          <?php
        } else {
          // Nếu $detailUser không có giá trị, hiển thị nút đăng nhập
          ?>
          <button class="btn btn-outline-primary my-2 my-sm-0 " type="submit"><a href="login.php"
              class="font-weight-bold">Login</a></button>
          <?php
        }
        ?>
      </div>
    </nav>
  </header>

  <main>
    <section class="product-area">
      <div class="container">
        <h2>Class</h2>
        <div class="row">
          <?php
          // Lặp qua dữ liệu và tạo các thẻ div
          foreach ($courses as $course) {

            echo '<div class="col-md-4 mt-3">';
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src="https://vietcodedi.com/pluginfile.php/1162/course/overviewfiles/cafedev_front_end_back_end_blog.png" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $course['name'] . '</h5>';
            echo '<p class="card-text">' . $course['description'] . '</p>';
            echo '<a href="/d" class="btn btn-primary">Go to Class</a>';
            echo '</div></div></div>';
          }
          ?>

        </div>
      </div>
      </div>
    </section>
  </main>

  <footer>
    <!-- footer của trang web -->
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>