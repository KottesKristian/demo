<?php       
    $data = $this->data;
    if ($this->registry['saved']) { echo '<p class = "text-success mt-3 ml-5">Дані успішно змінено</p>';}
?>
<div class="row">
    <div class="col-sm-6 mx-auto mt-3">
        <form id="validateForm" class="needs-validation" role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" novalidate>
            <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']?>">
            <div class="form-group">
                <label for="name">Ім'я *</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Ім'я" value="<?php echo $data['name'];?>">
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $data['email'];?>">
            </div>
            <div class="form-group">
                <label for="site">Сайт</label>
                <input name="site" type="text" class="form-control" id="site" aria-describedby="emailHelp" placeholder="Сайт" value="<?php echo $data['site'];?>">
            </div>
            <div class="form-group">
                <label for="tetx">Текст *</label>
                <textarea name="text" type="text" class="form-control" id="text" placeholder="Текст"><?php echo $data['text'];?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>