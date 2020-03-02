<?php include_once 'layout/navbar.php'; ?>
<body>
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"><?php echo $params['article']['title'] ?></h1>
            <p><?php echo $params['article']['intro'] ?></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div> <?php echo $params['article']['content'] ?> </div>
            </div>
        </div>
    </div>
</main>
<?php include_once 'layout/footer.php'; ?>
</body>
