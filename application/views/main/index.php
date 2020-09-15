

<div class="container" style="margin-top: 20px" >
    <table id="profile-tasks" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Почта</th>
            <th>Статус</th>
            <th>Задача</th>
            <th>Деиствие</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['username']?></td>
                <td><?= $task['email']?></td>
                <td><?php echo $task['status'] == 1 ? "<span style='color: green'>Выполнено</span>" : "<span style='color: red'>Не выполнено</span>" ; ?></td>
                <td><?= $task['text']?></td>
                <td><?php echo "<a href='/account/edit/".$task["id"]."'>Редактировать</a>"; ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>


