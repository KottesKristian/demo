<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand" href="<?php echo PATH;?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo PATH;?>">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/recording/add">Додати запис</a>
                </li>
            </ul>
            <?php if (Helper::isAdmin()): ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pl-5">
                    <a class="nav-link" href="/user/logout">Вихід</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/user/login">Вхід в адмін панель</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
