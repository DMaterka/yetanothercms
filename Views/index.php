 <?php
    if (\App\Auth::checkIfLoggedIn()) {
        echo '<a href="?page=auth&action=logout" type="button" class="btn btn-primary" >Logout </a>';
    } else {
        echo '<a href="?page=auth&action=showLoginForm" type="button" class="btn btn-primary" >Login </a>';
        echo '<a href="?page=auth&action=showRegistrationForm" type="button" class="btn btn-secondary" >Register</a>';
    }
?>


</br>
</br>
</br>
<h1>List of Articles:</h1>
<?php
foreach ($params['articles'] as $article) {
    echo '<h1>' . $article['title'] . '</h1>';
    echo '<div>' . $article['content'] . '</div>';
    echo '</hr>';
} ?>