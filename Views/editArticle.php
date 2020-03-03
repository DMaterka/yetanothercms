<?php include_once 'layout/navbar.php'; ?>
<body>
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Edit article</h1>
        </div>
    </div>

    <div class="container">
        <form action="/?page=article&action=update" method="post">
            <div class="form-group">
                <label for="InputTitle">Article title</label>
                <input
                        type="text"
                        class="form-control"
                        id="InputTitle"
                        aria-describedby="titleHelp"
                        placeholder="Title"
                        name="params[title]"
                        value="<?php echo $params['article']['title']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="InputIntro">Article intro</label>
                <input
                        type="text"
                        class="form-control"
                        id="InputIntro"
                        placeholder="Intro"
                        name="params[intro]"
                        value="<?php echo $params['article']['intro']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="InputContent">Article content</label>
                <input
                        type="text"
                        class="form-control"
                        id="InputContent"
                        placeholder="Content"
                        name="params[content]"
                        value="<?php echo $params['article']['content']; ?>"
                >
            </div>
            <input type="hidden" name="params[id]" value="<?php echo $params['article']['id']; ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php include_once 'layout/footer.php'; ?>
</body>