<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<?php
    if (\App\Auth::checkIfLoggedIn()) {
        echo '<a href="?page=auth&action=logout" type="button" class="btn btn-primary" >Logout </a>';
    } else {
        echo '<a href="?page=auth&action=showLoginForm" type="button" class="btn btn-primary" >Login </a>';
        echo '<a href="?page=auth&action=showRegistrationForm" type="button" class="btn btn-secondary" >Register</a>';
    }
?>
</nav>
<body>
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is a template for a simple blog or website</p>
                <p><a class="btn btn-primary btn-lg" href="https://github.com/DMaterka/yetanothercms/blob/develop/readme.md" role="button">Learn more &raquo;</a></p>
            </div>
        </div>

        <div class="container">
            <?php if (!empty($params['articles'])): ?>
            <?php foreach ($params['articles'] as $article): ?>
                <div class="row">
                    <div class="col-md-4">
                        <h1> <?php echo $article['title'] ?> </h1>
                        <div> <?php echo $article['content'] ?> </div>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>
