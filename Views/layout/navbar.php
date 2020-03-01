<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
        <?php
            if (\App\Auth::checkIfLoggedIn()) {
                echo '<li class="nav-item">
                <a class="nav-link" href="?page=article&action=showAddForm">Add article</a>
            </li>';
            }
        ?>
        </ul>
        <ul class="navbar-nav">
        <?php
        if (\App\Auth::checkIfLoggedIn()) {
            echo '<li class="nav-item"><a href="?page=auth&action=logout" type="button" class="btn btn-primary" >Logout </a></li>';
        } else {
            echo '<li class="nav-item"><a href="?page=auth&action=showLoginForm" type="button" class="btn btn-primary" >Login </a></li>';
            echo '<li class="nav-item"><a href="?page=auth&action=showRegistrationForm" type="button" class="btn btn-secondary" >Register</a></li>';
        }
        ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>