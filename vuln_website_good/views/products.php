<!-- Search Box -->
<div class="position-relative overflow-hidden p-5 bg-light my-4">
    <h1>Search Products</h1>
    <p>Search for all of the mobile phones we have in stock now.</p>
    <form>
        <div class="input-group">
            <input name="search" class="form-control" type="text" placeholder="Search here" value="<?php echo $search; ?>">

            <button class="input-group-text" type="submit"><a href="#products"><i class="fas fa-search"></i></a></button>
        </div>

    </form>
    <div class="row mt-4">
        <div class="col-md-6 col-sm-4 ">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">SQL Query</h4>
                </div>
                <div class="card-body">
                    <p class="card-title pricing-card-title"><code><?php echo $query; ?></code></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-4">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">SQL Results</h4>
                </div>
                <div class="card-body">
                    <p class="card-title pricing-card-title"><code><?php $search || $categories ? var_dump($products) : ''; ?></code></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="products">
    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1>All Products</h1>
        <form id="filterCategory">
            <select onchange="filterCategory()" name="cat_id" class="form-select" form="filterCategory">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($category['cat_id'] == $_GET['cat_id']) : ?>
                        <option value="<?php echo $category['cat_id']; ?>" selected><?php echo $category['cat_name']; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <?php foreach ($products as $product) : ?>
        <div class="col-md-4 col-sm-1 mb-4 mt-4 wow animate__animated animate__fadeIn">
            <div class="card">
                <div class="card-body position-relative">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top " style="max-height: 400px; min-height: 400px;" alt="...">
                    <span class="position-absolute top-10 start-70 translate-middle badge bg-warning">
                        -99%
                    </span>
                    <h3 class="card-title mt-2"><?php echo $product['title']; ?></h3>
                    <p class="card-text">£<?php echo $product['price']; ?></p>
                    <a class="btn btn-outline-primary" href="/product?id=<?php echo $product['id']; ?>"><i class="fas fa-eye"></i> Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>