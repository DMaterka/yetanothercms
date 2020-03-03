<?php include_once 'layout/navbar.php'; ?>
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
            <div class="row">
            <?php if (!empty($params)): ?>
            <?php foreach ($params as $article): ?>
                    <div class="col-md-4">
                        <h1> <?php echo $article['title']; ?> </h1>
                        <div> <?php echo $article['intro']; ?> </div>
                        <p>
                            <a class="btn btn-sm btn-secondary" href="?page=article&action=show&params[id]=<?php echo $article['id']; ?>" role="button">View details &raquo;</a>
                        <?php if (\App\Auth::checkIfLoggedIn()): ?>
                            <a class="btn btn-sm btn-warning" role="button" href="?page=article&action=showUpdateForm&params[id]=<?php echo $article['id']; ?>" >Edit</a>
                            <a  class="btn btn-sm btn-danger" role="button" href="?page=article&action=delete&params[id]=<?php echo $article['id']; ?>">Delete</a>
                        <? endif; ?>
                        </p>
                    </div>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </main>
    <?php include_once 'layout/footer.php'; ?>
</body>
