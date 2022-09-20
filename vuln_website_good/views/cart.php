<h1>Cart Page</h1>
<a href="javascript:history.go(-1)" class="btn btn-outline-secondary mt-4 mb-3">Back</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($count != 0) :  ?>
            <?php foreach ($products as $product) : ?>

                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" style="width:50px;height:55px;"></td>
                    <td><a href="/product?id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>
                    <td>£<?php echo $product['price']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td>£<?php echo $product['price'] * $product['quantity']; ?></td>
                    <!-- Fix the delete from cart -->
                    <td><a href="/deletefromcart?id=<?php echo $product['id']; ?>" class="btn btn-outline-danger">Remove</a></td>
                </tr>

            <?php endforeach; ?>

        <?php endif; ?>
    </tbody>
</table>
<div class="card">
    <div class="card-header">
        <strong>Total Amount</strong>
    </div>
    <div class="card-body">
        <!-- Need to fix the total -->
        <h3 class="card-title">£<?php echo $total; ?></h3>
        <p class="card-text">Please double check your cart and the total amount before checking out.</p>
        <?php if ($count != 0) :  ?>
            <a href="/checkout" class="btn btn-outline-primary">Checkout</a>
        <?php else : ?>
            <h5>Your cart is empty!</h5>
        <?php endif; ?>
    </div>
</div>