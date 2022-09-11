<!-- Back Button -->
<a href="javascript:history.go(-1)" class="btn btn-outline-secondary mb-3"><i class="fas fa-chevron-left"></i> Back</a>

<!-- Product Image and Information -->
<div class="row">
    <div class="col-6 px-auto">
        <img src="<?php echo $product['image']; ?>" alt="" style="max-height: 500px;" class="mx-auto d-block">
    </div>
    <div class="col-6 py-5">
        <h1 id="title"><?php echo $product['title']; ?></h1>
        <p class="my-2"><?php echo $product['description']; ?></p>
        <div>
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
        </div>
        <h3 class="mt-2 mb-5">£<?php echo $product['price']; ?></h3>
        <form action="addtocart.php" method="GET">
            <div class="form-floating mb-3">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="number" name="quantity" class="form-control w-25" value="1" id="quantity">
                <label for="quantity">Quantity</label>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg"><i class="fas fa-cart-plus"></i> Add To Cart</button>
        </form>
    </div>
</div>