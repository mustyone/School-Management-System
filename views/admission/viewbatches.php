<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/loginchecker.php"); ?>
<?php include(APP_PATH . "/config/rolechecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>


<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

        <?php include "sidebar.php"; ?>

        <?php include "header.php"; ?>

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h1 class="h3 fw-bold mb-2">
                                <?= $page_title; ?>
                            </h1>
                            <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                                <?= $page_description; ?>
                            </h2>
                        </div>
                        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="/admission/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    View Batches
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <?php include APP_PATH . "/views/includes/message.php"; ?>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">View Batches</h3>
                    </div>
                    <div class="block-content block-content-full">
                      <table class="table table-responsive ">
                            <thead>
                                <tr>
                                    <td>s/n</td>
                                    <td>BATCH NAME</td>
                                    <td>BATCH CODE</td>
                                    <td>SESSION</td>
                                    <td>TERM</td>
                                    <td>STATUS</td>
                                    <td>START DATE</td>
                                    <td>END DATE</td>
                                    <td>REQUED PIN</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn =1;?>
                                <?php foreach($batches as $batch):?>
                                    <tr>
                                        <th><?= $sn++?></th>
                                        <th><?= $batch['batch_code']?></th>
                                        <th><?= $batch['batch_name']?></th>
                                        <th><?= $batch['session_name']?></th>
                                        <th><?= getTermName($batch['term_id']) ;?></th>
                                        <th><?= $batch['status']?></th>
                                        <th><?= $batch['start_date']?></th>
                                        <th><?= $batch['end_date']?></th>
                                        <th><?= $batch['require_pin']?></th>
                                        <th><a href="/admission/updatebatch/<?= $batch['batch_id']?>"><button class="btn btn-info">Edit</button></a></th>
                                    </tr>
                                    
                                <?php endforeach;?>
                                
                            </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>

        <!-- END Main Container -->

        <?php include "footer.php"; ?>
    </div>
    <!-- END Page Container -->

    <?php include APP_PATH . "/views/includes/scripts.php"; ?>

</body>

</html>