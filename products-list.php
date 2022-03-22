<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Gabriel Dy', 'dygabriel31@gmail.com');
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<head>
    <title>Project Pamilihan - Homepage</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm sticky-top bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="products-list.php">
      <img src="logo.png" alt="" width="120" height="40">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="products-list.php">Homepage</a>
        </li>
      </ul>
      <span class="nav-item">
            <a class="nav-link" href="shopping-cart.php">Check Cart</a>
        </span>
        <span>
        </span>
        <span class="item">
          <span class="item-left">
            <style>
            span {
              padding-left: 5px;
              padding-right: 10px;
            }
            </style>
            <a href="shopping-cart.php">
              <img src="shopping-cart.png" alt="" width="30" height="30">
            </a>
          </span>
      </div>
  </div>
  </nav>

<div id="cover">
  <img id="product-cover" src="cover.png" class="img-fluid" alt="" width=100%>
  <div class="centered">
    <h4>Welcome, <?php echo $customer->getName() ?>!</h4>
    <h1>PRODUCTS</h1>
  </div>
</div>

<form action="add-to-cart.php" method="POST">
  <div class="row row-cols-1 row-cols-md-2 g-6" id="product">
<?php foreach ($products as $product): ?>
  <div class="card">
    <img src="<?php echo $product->getImage(); ?>" height=auto class="card-img-top">
    <div class="card-body">
      <h3 class="card-title" id="product-name"><?php echo $product->getName(); ?></h3>
      <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
      <p class="card-text">
        <?php echo $product->getDescription(); ?><br/>
        <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
        Qty <input type="number" name="quantity" class="quantity" value="0" />
      </p>
      <button type=submit href="add-to-cart.php" class="btn btn-primary" id="add-to-cart">Add to cart</button>
    </div>
  </div>
</form>

<?php endforeach; ?>

<style>
  #cover {
  position: relative;
  overflow: hidden;
  }

  .centered {
  position: absolute;
  top: 60%;
  left: 10%;
  }

  .centered h1 {
  font-size: 120px;
  color: white;
  text-shadow: 10px 5px 40px #000000;
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  }

  .centered h4 {
  font-size: 30px;
  color: white;
  text-shadow: 10px 5px 40px #000000;
  font-family: 'Montserrat', sans-serif;
  font-weight: 400;
  padding-left: 6px;
  }

  #product {
    text-align: center;
  }
  #product-name {
    font-family: 'Lato', sans-serif;
  }

  #product-description {
    font-family: 'Lato', sans-serif;
    padding-bottom: 4px;
  }

</style>

</body>
</html>
