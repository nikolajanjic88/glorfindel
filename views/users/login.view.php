<?php 
include_once base_path("views/partials/head.php"); 
include_once base_path("views/partials/nav.php"); 
include_once base_path("views/partials/header.php"); 

?>
<?php if(isset($_SESSION['register_success'])): ?>
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['register_success'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <?php unset($_SESSION['register_success']); ?>
<?php endif ?>
<section class="bg-light py-5">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Login</h2>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form method="POST">
                    <label for="name">Your email: </label>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" value="<?= $_POST['email'] ?? '' ?>"/>
                        <?php if(isset($errors['email'])): ?>
                        <p class="text-danger"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <label for="name">Your password: </label>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" value="<?= $_POST['password'] ?? '' ?>"/>
                        <?php if(isset($errors['password'])): ?>
                        <p class="text-danger"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once base_path("views/partials/footer.php"); ?>