<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <span class="navbar-brand" href="/">Hello <i><?= $_SESSION['name'] ?? 'guest' ?></i></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?= urlIs('/') ? 'active' : '' ?>" href="/">Home</a></li>
                <?php if(!isset($_SESSION['id'])): ?>
                <li class="nav-item"><a class="nav-link <?= urlIs('/login') ? 'active' : '' ?>" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link <?= urlIs('/register') ? 'active' : '' ?>" href="/register">Register</a></li>
                <?php else: ?>
                <li class="nav-item"><a class="nav-link <?= urlIs('/logout') ? 'active' : '' ?>" href="/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>