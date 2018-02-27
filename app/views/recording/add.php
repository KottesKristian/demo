<?php 
    if ($this->registry['saved']) { echo '<p class="text-success mt-3 ml-5">Дані успішно збережено</p>'; }
?>
<div class="row">
    <div class="col-sm-6 mx-auto mt-5">
        <form id="validateForm" class="needs-validation" role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" novalidate>
            <div class="form-group">
                <label class="control-label" for="name">Ім'я *</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="site">Сайт</label>
                <input name="site" type="text" class="form-control" id="site" placeholder="Сайт" >
            </div>
            <div class="form-group">
                <label for="tetx">Текст *</label>
                <textarea name="text" type="text" class="form-control" id="text" placeholder="Текст" required></textarea>
            </div>
            <div class="form-group">
                <div id="captcha" class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Len90cUAAAAAOdgxqi47RbR0U2k-ha6EeNNJOxN"></div> 
            </div>
            <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>