<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/task/save" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Имя:</label>
                            <input type="text" class="form-control" name="username" value="<?= isset($_SESSION['data']['username']) ? $_SESSION['data']['username'] : '' ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Почта:</label>
                            <input type="text" class="form-control" name="email" value="<?= isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : '' ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Задание</label>
                            <textarea type="textarea" class="form-control" name="text"><?= isset($_SESSION['data']['text']) ? $_SESSION['data']['text'] : '' ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                    <a class="btn btn-primary" href="/">На главную</a>
            </form>
        </div>
    </div>


</div>