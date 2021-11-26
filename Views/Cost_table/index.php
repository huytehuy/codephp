<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Dan">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Assignment</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="../images/Logo BK_vien trang.png"
    />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<link type="text/css" rel="stylesheet" href="./Views/Cost_table/style.css">
    <link href="../Views/Navbar/navbar.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
	  <script src="https://use.fontawesome.com/721412f694.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
</head>

<body>
    
<div>
    <div class="navbar-holder sticky-top"></div>
    <script src="./Views/Navbar/navbarScript.js" index='3'></script>
	<section class="pb-4 mb-5">
		<div class="hero">
			<div class="row1">
				<div class="swiper-container slider-1">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="./Views/images/h1.jpg" alt="" />
							<div class="content">
							<h1>Tủ đồ định kì
								<br/>
								chỉ từ
								<span>199.000/tháng</span>
							</h1>
							<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>
				
							<a href="../Products/product.html">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<!-- Carousel Navigation -->
			<div class="arrows d-flex">
				<div class="swiper-prev d-flex">
				  <i class="bx bx-chevrons-left swiper-icon"></i>
				</div>
				<div class="swiper-next d-flex">
				  <i class="bx bx-chevrons-right swiper-icon"></i>
				</div>
			</div>
		</div>
	</section>
	<div class="row container-fluid px-3 px-sm-5 my-5 text-center">
		<h3 class="mb-5">Chọn gói</h3>
        <?php
                if(empty($data["combo"])) echo "empty combo";
                else{//wwhile
                    foreach($data["combo"] as $row){
                        echo "<div class=\"col-md-4 mb-4\">
                        <section>
                            <div class=\"card\"><span hidden>" .  $row["id"] . "</span>
                                <div class=\"card-header text-center py-1\">
                                    <h5 class=\"mb-0 fw-bold\">" . $row["name"] . "</h5>
                                    </div>		
                                    <div class=\"card-body\">
                                        <h3 class=\"text-warning mb-2\">" . $row["price"] . "/tháng</h3>
                                        <h6>Mỗi hộp bao gồm: </h6>
                                        <ol class=\"list-group list-group-numbered\">";
                                        foreach($row["product"] as $product){
                                            echo "<li class=\"list-group-item\">" . $product["name"] . "</li>";
                                        }
                        echo        "</ol>
                                        <p>Chọn kích cỡ</p>
                                        <div class=\"btn-group\" role=\"group\" aria-label=\"Basic radio toggle button group\">
                                            <input type=\"radio\" class=\"btn-check\" name=\"btnGroupRadio\" id=\"btnRadio1\" autocomplete=\"off\" checked=\"\">
                                            <label class=\"btn btn-outline-secondary\" for=\"btnRadio1\">S</label>
                                          
                                            <input type=\"radio\" class=\"btn-check\" name=\"btnGroupRadio\" id=\"btnRadio2\" autocomplete=\"off\">
                                            <label class=\"btn btn-outline-secondary\" for=\"btnRadio2\">M</label>
                                          
                                            <input type=\"radio\" class=\"btn-check\" name=\"btnGroupRadio\" id=\"btnRadio3\" autocomplete=\"off\">
                                            <label class=\"btn btn-outline-secondary\" for=\"btnRadio3\">L</label>
                
                                            <input type=\"radio\" class=\"btn-check\" name=\"btnGroupRadio\" id=\"btnRadio4\" autocomplete=\"off\">
                                            <label class=\"btn btn-outline-secondary\" for=\"btnRadio4\">XL</label>
                
                                            <input type=\"radio\" class=\"btn-check\" name=\"btnGroupRadio\" id=\"btnRadio5\" autocomplete=\"off\">
                                            <label class=\"btn btn-outline-secondary\" for=\"btnRadio5\">XXL</label>
                                          </div>
                                    </div>
                                    <div class=\"card-footer d-flex justify-content-between py-3\">
                                    <select class=\"form-select-sm\" aria-label=\"Small select\">
                                        <option selected=\"0\">Chọn chu kì gửi</option>";
                        $i = 1;
                        foreach($data["cycle"] as $row1){
                            echo "<option value=\"". $i . "\">Gửi mỗi ". $row1["cycle"] . "</option>";
                            $i += 1;
                        }

                    echo "</select><button type=\"button\" class=\"btn btn-success btn-block\" onclick=\"add_combo(this);\">Thanh toán</button></div></div></section></div>";
                    }
                }
        ?>
        <div class="demo" hidden><?php if(!empty($data["user"])) echo $data["user"]; ?></div>
</div>

<div class="footer-holder"></div>
        <script src="../Views/footer/footerScript.js"></script>
        <script src="../Views/Cost_table/myscript.js"></script>
</body>
</html>
