<div class="row">
    <div class="col-md-6 col-sm-8 mx-auto mb-5 mt-4">
        <?php if (isset($_SESSION['customer'])) : ?>
            <p class="text-center mb-3">User <span class="badge bg-success"><?php echo $_SESSION['customer']; ?> </span> currently logged in!</p>

            <a href="/logout" class="w-100 btn btn-lg btn-outline-danger" name="logout_submit" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <?php else : ?>
            <h1>Customer Login</h1>
            <form method="POST" action="/auth">
                <?php if ($message) : ?>
                    <div id="my-alert" class="alert alert-danger d-flex justify-content-between" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword">
                    <label for="floatingPassword">Password</label>
                </div>


                <button class="w-100 btn btn-lg btn-outline-success mb-3" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                <p>Don't have account? Register <a href="/register">here</a>.</p>
            </form>
        <?php endif; ?>
    </div>
</div>