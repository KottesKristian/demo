<div class="container">
    <div class="row">
        <div class="container">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

                <?php
                    $params = $this->registry['params'];
                ?>
                <select name='sort'>
                    <option <?php echo $params['created_at'] === 'ASC' ? 'selected' : '';?>  value="date_ASC">сортування по даті</option>
                    <option <?php echo $params['created_at'] === 'DESC' ? 'selected' : '';?>  value="date_DESC">сортування по даті (в зворотньому порядку)</option>
                    <option <?php echo $params['name'] === 'ASC' ? 'selected' : ''; ?> value="name_ASC">сортування по імені (по алфавіту)</option>
                    <option <?php echo $params['name'] === 'DESC' ? 'selected' : '';?> value="name_DESC">сортування по імені (в зворотньому порядку)</option>
                    <option <?php echo $params['email'] === 'ASC' ? 'selected' : '';?>  value="email_ASC">сортування по email</option>
                    <option <?php echo $params['email'] === 'DESC' ? 'selected' : '';?>  value="email_DESC">сортування по email (в зворотньому порядку)</option>
                </select>

                <button id="submitBtn" type="submit" class="btn-primary ">Submit</button>
            </form>
        </div>
        <div class="table-responsive">
            <table id="recording" class="table mt-2">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ім'я</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Дата додавання</th>
                        <?php if (Helper::isAdmin()): ?>
                        <th scope="col"></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $data = $this->data['recordings'];
                        $i = 1;
                        foreach ($data as $value):
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <?php if (Helper::isAdmin()): ?>
                        <td><?php echo Helper::simpleLink('/recording/edit', $value['name'], array('id'=>$value['id']));?></td>
                        <?php else: ?>
                        <td><?php echo $value['name'];?></td>
                        <?php endif;?>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo $value['created_at'] = date('d.m.Y H:i:s', strtotime($value['created_at']));;?></td>
                        <?php if (Helper::isAdmin()): ?>
                        <td id="delete"><?php echo Helper::simpleLink('/recording/delete', 'Видалити', array('id'=>$value['id']));?></td>
                        <?php endif; ?>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination"></ul>
            </nav>
        </div>
    </div>
</div>

