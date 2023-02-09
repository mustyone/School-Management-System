<?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-success d-flex align-items-center" role="alert">
    <div class="flex-shrink-0">
        <i class="fa fa-fw fa-check"></i>
    </div>
    <div class="flex-grow-1 ms-3">
        <p class="mb-0">
            <?= $_SESSION['message']; ?>
        </p>
    </div>
</div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div class="flex-shrink-0">
        <i class="fa fa-fw fa-exclamation"></i>
    </div>
    <div class="flex-grow-1 ms-3">
        <p class="mb-0">
            <?= $_SESSION['error']; ?>
        </p>
    </div>
</div>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['warning'])): ?>
<div class="alert alert-warning d-flex align-items-center" role="alert">
    <div class="flex-shrink-0">
        <i class="fa fa-fw fa-triangle-exclamation"></i>
    </div>
    <div class="flex-grow-1 ms-3">
        <p class="mb-0">
            <?= $_SESSION['warning']; ?>
        </p>
    </div>
</div>
<?php unset($_SESSION['warning']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['info'])): ?>
<div class="alert alert-info d-flex align-items-center" role="alert">
    <div class="flex-shrink-0">
        <i class="fa fa-fw fa-circle-info"></i>
    </div>
    <div class="flex-grow-1 ms-3">
        <p class="mb-0">
            <?= $_SESSION['info']; ?>
        </p>
    </div>
</div>
<?php unset($_SESSION['info']); ?>
<?php endif; ?>