<?php
	session_start();
	$connect = mysqli_connect("localhost", "root", "", "cart");
	$connect_1 = mysqli_connect("localhost", "root", "", "comment");

	if (isset($_POST["add-to-cart"])){
		if (isset($_SESSION["shopping-cart"])){
			$item_array_id = array_column($_SESSION["shopping-cart"], "item-id");
			if(!in_array($_GET["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping-cart"]);
				$item_array_id = array(
					"item-id" => $_GET["id"],
					"item-name" => $_POST["hidden-name"],
					"item-price" => $_POST["hidden-price"]
				);
				$_SESSION["shopping-cart"][$count] = $item_array;
			}
			else
			{
				echo '<script>alert("Элемент уже добавлен в корзину")</script>';
				echo '<script>window.location="index.php"</script>';

			}
		}
		else
		{
			$item_array = array(
					'item-id' => $_GET["id"],
					'item-name' => $_POST["hidden-name"],
					'item-price' => $_POST["hidden-price"],
			);
			$_SESSION["shopping-cart"][0] = $item_array;
		}
	}
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "deleted")
		{
			foreach($_SESSION["shopping-cart"] as $key => $value){
				if($value["item-id"] == $_GET["id"])
				{
					unset($_SESSION["shopping-cart"][$keys]);
					echo '<script>alert("Элемент удален")</script>';
					echo '<script>window.location="index.php"</script>';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Milk Project - лучшая молочная продукция в Казахстане!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Milk Project</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Меню
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Главная страница</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">О Нас</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Блог компании</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Контакты</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.png);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.png);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	          </div>
	        </div>
		  </div>
		  <div class="slider-item" style="background-image: url(images/bg_3.png);">
			<div class="overlay"></div>
		  <div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

			</div>
		  </div>
		</div>
		<div class="slider-item" style="background-image: url(images/bg_4.png);">
			<div class="overlay"></div>
		  <div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

			</div>
		  </div>
		</div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services" style="display: flex; justify-content: space-between;">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Быстрая доставка</h3>
                <span>Экспресс доставка при заказе свыше 50.000 тенге</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Высшее качество</h3>
                <span>Качественная молочная продукция</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Круглосуточная техническая поддержка</h3>
                <span>Техподдержка 24/7 </span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Наша молочная продукция</h2>
            <p>При изготовлении молочной продукции наша компания использует только свежие ингредиенты</p>
          </div>
        </div>   		
		</div>
		
    	<div class="container">
    		<div class="row">
				<?php
				 $query = "SELECT * FROM tbl_product ORDER BY id ASC";
				 $result = mysqli_query($connect, $query);
				 if (mysqli_num_rows($result) > 0)
				 {
					 while($row = mysqli_fetch_array($result))
				 {

				 
				?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $row['image']; ?>" alt="Сметана 15%">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $row['name']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
									<p class="price"><span class="mr-2 price-dc"><?php echo $row['price']; ?></span>
									<span class="price-sale"><?php echo $row['price'] - ($row['price'] * 0.3)?> тг.</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>	
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart" onclick="addItemCart()"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
				</div>
				<?php
				 }
				}
				?>	
    		</div>
		</div>	
    </section>
		
    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Отзывы</span>
            <h2 class="mb-4">Наши довольные клиенты говорят</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
			<?php
				 $query = "SELECT * FROM tbl_comment ORDER BY id ASC";
				 $result = mysqli_query($connect_1, $query);
				 if (mysqli_num_rows($result) > 0)
				 {
					 while($row = mysqli_fetch_array($result))
				 {
				?>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5 review">
                  <div class="user-img mb-5" style="background-image: url(images/<?php echo $row['image']; ?>)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line"><?php echo $row['comment']?></p>
                    <p class="name"><?php echo $row['name']?></p>
                  </div>
				</div>
				<?php
				 }
				}
				?>
              </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Подпишитесь на наши обновления</h2>
          	<span>Введите ваш e-mail, чтобы получать новости о нашей компании и специальные предложения</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Введите ваш e-mail">
                <input type="submit" value="Подписаться" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
	</section>
	
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Milk Project</h2>
              <p>Завод производитель натуральной молочной продукции</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Меню</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Магазин</a></li>
                <li><a href="#" class="py-2 d-block">О нас</a></li>
                <li><a href="#" class="py-2 d-block">Блог компании</a></li>
                <li><a href="#" class="py-2 d-block">Контакты</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Помощь</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Информация о доставке</a></li>
	                <li><a href="#" class="py-2 d-block">Возврат &amp; Обмен</a></li>
	                <li><a href="#" class="py-2 d-block">Правила &amp; Пользование</a></li>
	                <li><a href="#" class="py-2 d-block">Политика конфиденциальности</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Есть вопросы ?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Республика Казахстан, 021200, Акмолинская область, Зерендинский район, с. Садовое, ул. Тэуесельздик, д.7</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 (71632) 3-46-03</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">milkproject@mail.ru</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script src="js/store.js" async></script>
    
  </body>
</html>