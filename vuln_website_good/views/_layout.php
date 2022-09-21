<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>codeEfficiently Shop | Good Practice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body style="padding-bottom: 3rem;">
    <div class="tour"></div>
    <div class="container">
        <nav class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <h3 class="d-inline mt-2"> codeEfficiently Shop </h3>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/products" class="nav-link">Products</a></li>
                <?php if (isset($_SESSION['customer'])) : ?>

                    <li class="nav-item"><a href="/myaccount" class="nav-link">myaccount</a></li>
                    <li class="nav-item"><a href="/login" class="nav-link">Logout</a></li>

                <?php else : ?>

                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-primary" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <i class="fas fa-shopping-cart"></i> <span class="badge rounded-pill bg-danger"><?php echo $count; ?></span>
                    </button>
                    <div class="dropdown-menu p-3" aria-labelledby="navbarDropdown" style="min-width: 20rem;">
                        <?php if ($count != 0) : ?>
                            <?php foreach ($cartProducts as $cartProduct) : ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img class="mx-auto" src="<?php echo $cartProduct['image']; ?>" alt="" style="width:50px;height:55px;">
                                    </div>
                                    <div class="col-9">
                                        <span><a href="product.php?id=<?php echo $cartProduct['id']; ?>"><?php echo $cartProduct['title']; ?></a></span><br>
                                        <small class="text-info">£<?php echo $cartProduct['price']; ?> </small><span> <small>Quantity:<?php echo $cartProduct['quantity']; ?></small></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h5>The cart is empty!</h5>
                        <?php endif; ?>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-shopping-cart"></i> <span class="badge rounded-pill bg-danger"></span></div>
                            <strong>Total: £<?php echo $total; ?></strong>
                        </div>
                        <hr>
                        <a href="/cart" class="btn btn-outline-primary w-100">Cart</a>
                    </div>
                </li>
            </ul>
        </nav>

        <?php echo $content; ?>

        <footer class="text-center footer mt-auto">
            <hr>
            <p class="text-sm mt-3"><small>*Each year your Airtime Plan will be increased by the Retail Price Index (RPI) rate of inflation announced in February plus 3.9%. If RPI is negative, we’ll only apply the 3.9%. You’ll see this increase on your April <?php echo date('Y', strtotime('+1 year')); ?> bill onwards. See codenation-advanced.com/prices.</small></p>
            <p class="my-3 text-muted ">&copy; codeEfficiently Shop <?php echo date("Y"); ?></p>
            <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        function filterCategory() {
            document.getElementById("filterCategory").submit();
        }
    </script>

</body>

</html>