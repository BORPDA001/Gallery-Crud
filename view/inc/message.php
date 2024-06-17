<?php
if(isset($_SESSION['msg'])) {
    $status = $_SESSION['msg']['status'];
    $msg = $_SESSION['msg']['text'];
    ?>

    <?php if($status == 'success'): ?>
        <div class="alert alert-success"><?= $msg; ?></div>
    <?php elseif($status == 'fail'): ?>
        <div class="alert alert-danger"><?= $msg; ?></div>

    <?php elseif($status == 'warning'): ?>
        <div class="alert alert-warning"><?= $msg; ?></div>
    <?php endif; } ?>