<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <?php if (empty($list)): ?>
                <p>Задач нет</p>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Деиствие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <a href=""></a>
                    <?php foreach ($list as $val): ?>
                        <tr>
                            <td><?php echo $val['username']; ?></td>
                            <td><?php echo $val['email']; ?></td>
                            <td><?php echo $val['text']; ?></td>
                            <td><?php echo $val['status'] == 1 ? "<span style='color: green'>Выполнено</span>" : "<span style='color: red'>Не выполнено</span>" ; ?></td>
                            <td><?php echo "<a href='/account/edit/".$val["id"]."'>Редактировать</a>"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </div>
</div>