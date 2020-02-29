<body class="form-signin">
    <form action="/?page=auth&action=register" method="post">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" name="params[email]" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" name="params[password]" class="form-control" id="InputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="InputPassword2">Repeat Password</label>
            <input type="password" name="params[password_repeat]" class="form-control" id="InputPassword2" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="Check1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>


