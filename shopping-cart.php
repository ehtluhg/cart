<?php
require('app/Customer.php');
require('app/Product.php');
require('app/ShoppingCart.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Gabriel Dy', 'dygabriel31@gmail.com');

$shoppingCart = new ShoppingCart($customer);
$shoppingCartItems = $shoppingCart->getAllItems();
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
    <title>My Cart</title>
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
          <a class="nav-link" aria-current="page" href="products-list.php">Homepage</a>
        </li>
      </ul>
      <span class="nav-item">
            <a class="nav-link active" href="shopping-cart.php">Check Cart</a>
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
  <img id="cart-cover" src="cart-cover.png" class="img-fluid" alt="" width=100%>
  <div class="centered">
    <h4>Hello, <?php echo $customer->getName() ?>! Take a look at</h4>
    <h1>YOUR CART</h1>
    <a href="products-list.php" class="btn btn-primary">Shop more</a>
  </div>
</div>

<?php if (count($shoppingCartItems) > 0): ?>

    <table>
    <thead>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
    </thead>
    <tbody>

    <?php foreach ($shoppingCartItems as $item): ?>

        <tr>
            <td><?php echo $item['product']->getName(); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['subtotal']; ?></td>
        </tr>

    <?php endforeach; ?>

        <tr>
            <td colspan="4">
                <?php echo $shoppingCart->getItemsTotal(); ?>
            </td>
        </tr>

    </tbody>
    </table>

<?php endif; ?>

<style>
  #cover {
  position: relative;
  overflow: hidden;
  text-align: center;
  }

  .centered {
  position: absolute;
  top: 20%;
  left: 35%;
  }

  .centered h1 {
  font-size: 70px;
  color: white;
  text-shadow: 10px 5px 40px #000000;
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  }

  .centered h4 {
  font-size: 20px;
  color: white;
  text-shadow: 10px 5px 40px #000000;
  font-family: 'Montserrat', sans-serif;
  font-weight: 400;
  }
</style>

</body>
</html>
