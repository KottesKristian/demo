<?php 
    if (isset($this->invalid_password)) {
        echo "<p class=\"text-danger mt-3 ml-5\"> Неправильні ім'я або пароль!</p>"; 
    }
?>
<div class="row">
    <div class="col-sm-6 mx-auto mt-5">
        <form id="" class="needs-validation" role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" novalidate>
            <div class="form-group">
                <label for="login">Email address</label>
                <input name="login" type="text" class="form-control" id="login" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
