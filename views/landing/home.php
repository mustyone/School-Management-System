<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/loginchecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>
<?php include(APP_PATH . "/config/modules.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Student Result Processing System - <?= APP_VERSION; ?></title>


    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="/assets/css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
<div id="page-container">
    <div class="container-fluid p-0 m-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><?= setting('school_name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex flex-row justify-content-between">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <?= date("M d, Y h:i a") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" class="nav-link" href="/logout">Logout</a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="container mt-3">
            <?php include APP_PATH. "/views/includes/message.php"; ?>
            <div class="row justify-content-center push">
                <?php $modulesLoop = $_SESSION['allowedModules'][0] === "*" ? $registeredModules : $_SESSION['allowedModules']; ?>
                <?php foreach ($modulesLoop as $module): ?>
                    <?php if (!isset($modules[$module])) continue; ?>
                    <div class="col-md-3 mb-4">
                        <a href="<?= $modules[$module]['url'] ?>" style="color:#333">
                            <div class="card">
                                <div class="card-body text-center py-5">
                                    <i class="<?= $modules[$module]['icon']; ?>"></i>
                                    <h2 class="card-title my-2"><?= $modules[$module]['title'] ?></h2>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </main>
</div>
</body>

