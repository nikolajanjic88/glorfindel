<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2"><?= $heading ?></h1>
                    <p class="lead text-white-50 mb-4">Fantasy World</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['message'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif ?>
