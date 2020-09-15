<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/update/<?php echo $task[0]['id']; ?>" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Имя:</label>
                            <input type="text" class="form-control" value="<?php echo $task[0]['username']; ?>" disabled>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Почта:</label>
                            <input type="text" class="form-control" value="<?php echo $task[0]['email']; ?>" disabled>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Задание</label>
                            <textarea type="textarea" class="form-control" name="text"><?php echo $task[0]['text']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Статус</label>
                            <input type="checkbox" name="status" value="1" <?=$task[0]['status']?'checked':''?>>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                    <a class="btn btn-primary" href="/account/profile">На главную</a>
            </form>
        </div>
    </div>


</div>