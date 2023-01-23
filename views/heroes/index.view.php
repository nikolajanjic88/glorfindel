<?php 
include_once base_path("views/partials/head.php"); 
include_once base_path("views/partials/nav.php"); 
include_once base_path("views/partials/header.php"); 

?>

<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <?php foreach($heroes as $hero): ?>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="<?= $hero['image'] ?? 'logos/no-image.jpg' ?>" alt="" width="250" height="350">
                    <h2 class="h4 fw-bolder"><?= htmlspecialchars($hero['name']) ?></h2>
                    <?php $arr = explode(" ", htmlspecialchars($hero['description']));
                        $str = "";
                        $arr= array_slice($arr, 0, 30);
                        $str = implode(" ", $arr);
                    ?>
                    <p><?= $str ?>...<a href='/hero?id=<?= $hero['id']?>'> Read more</a></p>
                </div>
            <?php endforeach; ?>
        </div>
        <p>
            <a href="/heroes/create" class="btn btn-primary text-blue-500">Post a Hero</a>
        </p>
    </div>
</section>

<?php include_once base_path("views/partials/footer.php"); ?>