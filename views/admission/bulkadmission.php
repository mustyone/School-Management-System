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
                                    Bulk Admission
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
                        <h3 class="block-title">Bulk Admission</h3>
                    </div>
                    <div class="block-content block-content-full">
                            <form action="/admission/selectbulkadmission" method="POST">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    
                                                    <label class="form-label">
                                                        Batch 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control" name="batch_id">
                                                            <?php foreach($batches as $batch):?>
                                                                <option value="<?= $batch['batch_id']?>"><?= $batch['batch_name']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <button style="margin-top:30px;" type="submit" class="btn btn-primary">Submit</button>
                                                </div>

                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
            
              <!-- Page Content -->
              <div class="content">
                <?php include APP_PATH . "/views/includes/message.php"; ?>
                <div class="block block-rounded">
                    <?php if(isset($_SESSION['records'])):?>
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Application Form - <?php echo $_SESSION['records']['app_number'] ?></h3>
                        </div>
                        <div class="block block-rounded">
                            <div class="block-content block-content-full">
                                <form action="/admission/savebulkadmission" method="post">
                                    <table class="table table-responsive ">
                                        <thead>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>App Number</td>
                                                <td>Full Name</td>
                                                <td>Class</td>      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn =1;?>
                                            <?php foreach($_SESSION['records'] as $app_number => $records):?>
                                                <tr>

                                                        <th><input type="checkbox" name="app_numbers[]" value="<?= $records['app_number'] ?>"/></th>
                                                        <th><?= $records['app_number']?></th>
                                                        <th><?= $records['first_name']." ".$records['middle_name']." ".$records['last_name']?></th>
                                                        <th>
                                                            <select class="form-control" name="class_id[]">
                                                                <?php foreach($classes as $class):?>
                                                                    <option <?php if($class['class_id'] === $records['class_id']){ echo "selected";} ?> value="<?= $class['class_id']?>">
                                                                        <?= $class['class_alternative_name']?>
                                                                    </option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </th>
                                                    <input type="hidden" value="admitted" name="status">
                                                </tr>        
                                            <?php endforeach;?>
                                            <tr>
                                                <th><button type="submit" class="btn btn-primary">Admit</button></th>
                                            </tr>
                            
                                            <?php unset($_SESSION['record']); ?>      
                                            <?php unset($_SESSION['records']); ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    <?php endif;?>
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