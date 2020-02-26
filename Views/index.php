<a href="?page=login&action=show" type="button" class="btn btn-primary" >Login</a>
<a href="?page=register&action=show" type="button" class="btn btn-secondary" >Register</a>
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