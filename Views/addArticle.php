<?php include_once 'layout/navbar.php'; ?>
<body>
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Add an article</h1>
        </div>
    </div>

    <div class="container">
        <form action="/?page=article&action=store" method="post">
            <div class="form-group">
                <label for="InputTitle">Article title</label>
                <input type="text" class="form-control" id="InputTitle" aria-describedby="titleHelp" placeholder="Title" name="params[title]">
            </div>
            <div class="form-group">
                <label for="InputIntro">Article intro</label>
                <input type="text" class="form-control" id="InputIntro" placeholder="Intro" name="params[intro]">
            </div>
            <div class="form-group">
                <label for="InputContent">Article content</label>
                <input type="text" class="form-control" id="InputContent" placeholder="Content" name="params[content]">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php include_once 'layout/footer.php'; ?>
</body>