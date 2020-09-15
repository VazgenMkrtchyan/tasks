
<?php if (isset($_SESSION['flash'])): ?>
    <script>
        function alertifyTogether(message, className, delay = 20) {
            if (className == 'alertify-success' || className == 'alertify-info') {
                var msg = alertify.success('Default message');
                msg.delay(10).setContent(message);
            } else {
                var msg = alertify.warning('Default message');
                // alertify.set('notifier','position', 'top-right');
                msg.delay(10).setContent(message);
            }
        }
    </script>
    <?php
    if(isset($_SESSION['flash']['errors'])):
        $dataMessage = $_SESSION['flash']['errors'];
        $className  = 'alertify-danger';
    endif;

    if(isset($_SESSION['flash']['success'])):
        $dataMessage = $_SESSION['flash']['success'];
        $className  = 'alertify-success';
    endif;

    if(isset($dataMessage) && isset($className)):
        foreach ($dataMessage as $key => $value):  ?>
            <script>
                $(document).ready(function () {
                    var className = "<?= $className ?>", value = "<?= $value ?>";
                    alertifyTogether(value, className)
                })
            </script>
        <?php
        endforeach;

        if(isset($_SESSION['flash']['errors'])){
            unset($_SESSION['flash']['errors']);
        }

        if(isset($_SESSION['flash']['success'])){
            unset($_SESSION['flash']['success']);
        }
    endif;
endif;
?>