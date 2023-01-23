<?php 
include_once base_path("views/partials/head.php"); 
include_once base_path("views/partials/nav.php"); 
include_once base_path("views/partials/header.php"); 
?>
<?php if(isset($_SESSION['update'])): ?>
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['update'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <?php unset($_SESSION['update']); ?>
<?php endif ?>
<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
    <a href="/" class="btn btn-info mb-3">Go Back</a>
        <div class="row gx-5">
            <div class="p-3 border bg-light col-md-4">
                <img src="<?= $hero['image'] ?? 'logos/no-image.jpg' ?>" alt="" width="350" height="500">
            </div>
            <div class="p-3 border bg-light col-md-8">
                <h2 class="h4 fw-bolder"><?= htmlspecialchars($hero['hero_name']) ?></h2>
                <p class="mt-10"><?= htmlspecialchars($hero['description']) ?></p>
                <?php if(isset($_SESSION['id']) && $_SESSION['id'] === $hero['user_id']): ?>
                <a class="btn btn-primary w-25" href="/heroes/edit?id=<?= $hero['id'] ?>">Edit Post</a>
                <form action="" method="POST" class="mt-3">
                    <input type="hidden" name="id" value="<?= $hero['id'] ?>">
                    <button class="btn btn-danger w-25" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <?php endif; ?>
            </div>
            <p>Posted by: <i><?= htmlspecialchars($hero['name']) ?></i></p>
        </div>
    </div>
</section>

<?php include_once base_path("views/partials/footer.php"); ?>