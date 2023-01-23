<?php 
include_once base_path("views/partials/head.php"); 
include_once base_path("views/partials/nav.php"); 
include_once base_path("views/partials/header.php"); 

?>

<section class="bg-light py-5">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Edit Hero</h2>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form method="POST">
                    <label for="name">Hero name: </label>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" value="<?= $hero['name'] ?>"/>
                        <?php if(isset($errors['name'])): ?>
                        <p class="text-danger"><?= $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <label for="description">Description: </label>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="description" id="description" type="text" style="height: 10rem"> <?= $hero['description'] ?></textarea>
                        <?php if(isset($errors['description'])): ?>
                        <p class="text-danger"><?= $errors['description'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once base_path("views/partials/footer.php");  ?>