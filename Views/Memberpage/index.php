<!DOCTYPE html>
<html>
  <head>
    <!-- setting page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Member page">
    <meta name="author" content="Phạm Minh Hiếu">

    <title>Thông tin khách hàng</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="./Views/images/Logo BK_vien trang.png"
    />

    <!-- link icon -->
    <script src="https://kit.fontawesome.com/320d0ac08e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./Views/Memberpage/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!---------------------->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/721412f694.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <link href="../Views/Navbar/navbar.css" rel="stylesheet">
  </head>
  <body>
    
    <!--Nav-->
    <div class="navbar-holder sticky-top"></div>
    <script src="./Views/Navbar/navbarScript.js" index='5' type="text/javascript"></script>
    <!--Nav-->

    <!--Body-->
    <div class="container-fuild">
        <div class="row margin-none justify-content-center align-content-stretch">
            <div class="col-sm-12 col-lg-4 max-width-400 padding-none">
                <div class="row justify-content-center margin-none">
                    <div class="col-12 mb-4 mt-4 border_bot">
                        <div class="row align-item-center align-content-center margin-none">
                            <div class="col-4 d-flex justify-content-center"><img src="<?php foreach($data["user"] as $row) echo $row["img"];?>" alt="profile"></div>
                            <div class="col-8 d-flex mt-2"><h4><?php foreach($data["user"] as $row) echo $row["name"];?></h4></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 myactive border_bot">
                        <div class="row margin-none point">
                            <div class="col-2"><i class="fas fa-info-circle"></i></div>
                            <div class="col-10 paddingr-none click"><h5>Thông tin cá nhân</h5></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 border_bot">
                        <div class="row margin-none point">
                            <div class="col-2"><i class="fas fa-shopping-cart"></i></div>
                            <div class="col-10 paddingr-none click"><h5>Lịch sử giao dịch</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 pb-5">
                <div class="row click"><span hidden><?php foreach($data["user"] as $row) echo $row["pwd"];?></span>
                    <div class="col-12 mt-4 border_bot"><h1>Hồ sơ của tôi</h1></div>
                    <div class="col-12 border_bot mt-5 mb-3 ">
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-3">Họ tên:</div>
                            <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["name"];?></div>
                            <div class="col-5 col-md-3">Tên đăng nhập:</div>
                            <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["username"];?></div>
                            <div class="col-5 col-md-3">CMND/CCCD:</div>
                            <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["cmnd"];?></div>
                            <div class="col-5 col-md-3">Số điện thoại:</div>
                            <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["phone"];?></div>
                            <div class="col-5 col-md-3">Địa chỉ:</div>
                            <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["add"];?></div>
                        </div>
                    </div>
                    <div class="col-6 mt-3"><button type="button" class="btn btn-primary">Thiết lập tài khoản</button></div>
                </div>
                <div class="row justify-content-center click">
                    <div class="col-12 mt-4 border_bot"><h1>Đơn hàng đã đặt</h1></div>
                    <div class="col-12 mt-3 d-flex flex-wrap">
                        <?php 
                        if(!empty($data["idcart"])){
                            foreach($data["idcart"] as $row_cart){
                                $total = 0;
                                $h4 = "";
                                if((int)$row_cart["state"] == 0) $h4 = "Chưa thanh toán";
                                else $h4 = $row_cart["time"];
                                echo "<div class=\"row justify-content-between node\">
                                <div class=\"col-12 border_bot\"><div class=\"d-flex justify-content-between\"><h4>Mã hóa đơn: #" . $row_cart["id"] . "</h4><h4>" . $h4 . "</h4></div></div>";
                                
                                foreach($data["product_in_cart"] as $row_pro){
                                    $row = mysqli_fetch_array($row_pro);
                                    $total += (int)$row["price"]*(int)$row["num"];

                                    echo "<div class=\"col-12 col-md-6\">
                                        <div class=\"row\">
                                            <div class=\"col-5 d-flex justify-content-center\"><img src=\"" . $row["img"] . "\" alt=\"item\"></div>
                                            <div class=\"col-7\">
                                                <div class=\"row\">
                                                    <div class=\"col-12\"><h5>" . $row["name"] . "</h5></div>
                                                    <div class=\"col-12\">Số lượng: " . $row["num"] . "</div>
                                                    <div class=\"col-12 price\">Tổng tiền: " . $row["num"] * $row["price"] . "</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                }
                                echo "<div class=\"col-12 price\">Tổng cộng: " . $total ."</div>
                                </div>";
                            }
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Body-->

    <!--Footer-->
      <div class="footer-holder"></div>
      <script src="./Views/footer/footerScript.js"></script>
      <script src="./Views/Memberpage/myscript.js"></script>
    <!--Footer-->
  </body>
</html>
