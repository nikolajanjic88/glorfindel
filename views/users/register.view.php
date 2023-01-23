<?php 
include_once base_path("views/partials/head.php"); 
include_once base_path("views/partials/nav.php"); 
include_once base_path("views/partials/header.php"); 

?>

<section class="bg-light py-5">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Register</h2>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form method="POST">
                    <label for="name">Your name: </label>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" value="<?= $_POST['name'] ?? '' ?>"/>
                        <?php if(isset($errors['name'])): ?>
                        <p class="text-danger"><?= $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
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
                    <label for="name">Confirm password: </label>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="cpassword" name="cpassword" type="password" value="<?= $_POST['cpassword'] ?? '' ?>"/>
                        <?php if(isset($errors['cpassword'])): ?>
                        <p class="text-danger"><?= $errors['cpassword'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once base_path("views/partials/footer.php"); ?>