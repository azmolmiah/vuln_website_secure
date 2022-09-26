<div class="col-md-6 col-sm-8 mx-auto mb-5 mt-4">
    <h1>Register</h1>
    <form method="POST">
        <div class="form-floating mb-3">
            <input type="text" name="first_name" class="form-control" id="floatingInput" required>
            <label for="floatingInput">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="last_name" class="form-control" id="floatingInput" required>
            <label for="floatingInput">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-outline-success mb-3" name="submit" type="submit"><i class="fas fa-paper-plane"></i> Register</button>
        <p>Already have account? Login <a href="/login">here</a>.</p>
        <small>By creating an account you agree to our <a href="#">Terms and Conditions</a>. Please read our <a href="#">Privacy Policy</a> and <a href="#">Cookie Policy</a>.</small>
    </form>
</div>