<!-- Hero Image -->
<div class="position-relative overflow-hidden p-5 bg-light">
    <div class="row" style="height: 50vh;">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
            <h1 class="display-4 fw-normal">Good Practice</h1>
            <p class="lead fw-normal mt-3">Welcome to codeEfficiently's vulnerable shop good version. Explore the full website, follow the documentation page, find the vulnerabilities and secure them using the documentation.</p>
            <a class="btn btn-outline-success mt-5" href="/products">Explore</a>
        </div>
        <div class="col-md-6">
            <img src="./images/iphone-xr-white-hero.png" class="animate__animated animate__fadeInUp" alt="" style="overflow: hidden;">
        </div>
    </div>
</div>

<!-- Featured Latest Three Products -->
<div class="d-flex justify-content-between align-items-center mt-5">
    <h2 id="products">Featured Products</h2>
    <a class="btn btn-outline-success" href="/products"><i class="fas fa-eye"></i> View More Products</a>
</div>
<div class="row">
    <?php foreach ($products as $product) : ?>
        <div class="col-xs-1 col-sm-6 col-md-3 mt-4 wow animate__animated animate__fadeInLeft">
            <div class="card">
                <div class="card-body position-relative">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" style="max-height: 400px; min-height: 400px;" alt="...">
                    <span class="position-absolute top-10 start-70 translate-middle badge bg-warning">
                        -99%
                    </span>
                    <h3 class="card-title mt-2"><?php echo $product['title']; ?></h3>
                    <p class="card-text">£<?php echo $product['price']; ?></p>
                    <a class="btn btn-outline-primary" href="product.php?id=<?php echo $product['id']; ?>"><i class="fas fa-eye"></i> View Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<hr class="mt-5">

<!-- Random Phone advertisement for the look -->
<div class="row my-5 g-0">
    <div class="col-xs-1 col-sm-6 wow animate__animated animate__fadeIn "><img src="images/advert.jpeg" class="img-fluid" alt=""></div>
    <div class="col-xs-1 col-sm-6 wow animate__animated animate__fadeIn "><img src="images/advert2.jpeg" class="img-fluid" alt=""></div>
</div>
<div class="row mb-5 wow animate__animated animate__fadeInUp" style="height: 15rem;">
    <div class=" col-sm-12 col-md-4 p-2 bg-light d-flex justify-content-around">
        <i class="fas fa-shopping-cart fa-4x align-self-center"></i>
        <div class="align-self-center">
            <h6>Free next-working-day home delivery</h6>
            <p>When you order before midnight</p>
        </div>
    </div>
    <div class="col-sm-12 col-md-4  p-2 bg-light d-flex justify-content-around">
        <i class="fas fa-pound-sign fa-4x align-self-center"></i>
        <div class="align-self-center">
            <h6>Returns are free!</h6>
            <p>Get a refund or return within 14 days.</p>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 p-2 bg-light d-flex justify-content-around">
        <i class="fas fa-file-alt fa-4x align-self-center"></i>
        <div class="align-self-center">
            <h6>Security Information</h6>
            <p>Get bills straight to your phone.</p>
        </div>
    </div>
</div>