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
                                    Pin Logs
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
                        <h3 class="block-title">Pin Logs</h3>
                    </div>
                    <div class="block-content block-content-full">
                            <form action="/admission/selectpinlogs" method="POST">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                        Batch 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                
                                                    <select required class="form-control" name="batch_id">
                                                        <?php foreach($batches as $batch):?>
                                                            <option value="<?= $batch['batch_id']?>"><?= $batch['batch_name']?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div style="margin-top:30px;" class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>

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
                <?php if(isset($_SESSION['pinlogs'])):?>
                    <div class="block-header block-header-default">
                        <div class="row">
                            <div class="col-md">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td>S/N</td>
                                        <td>PIN</td>
                                        <td>SERIAL</td>
                                        <td>BATCH</td>
                                        <td>STATUS</td>
                                        <td>APPLICATION NUMBER</td>
                                    </tr>
                                </thead>
                                <?php $sn =1;?>
                                <tbody>
                                    
                                    <?php foreach($_SESSION['pinlogs'] as $pinglog):?>
                                        <?php  
                                                
                                            $start = strlen($pinglog['pin']) - 4;
                                            $pin1 = "*******".substr($pinglog['pin'],$start,strlen($pinglog['pin']));
                                        ?>
                                        <tr>
                                            <th><?php echo $sn;?></th>
                                            <th><?php echo $pin1; ?></th>
                                            <th><?= $pinglog['serial']?></th>
                                            <th><?= $pinglog['batch_id']?></th>
                                            <th><?= $pinglog['status']?></th>
                                            <th>
                                                <?php if($pinglog['status'] === 'used'){ 
                                                    echo $pinglog['app_number'];
                                                    }else{
                                                        echo "--";
                                                    }?>
                                            </th>
                                        </tr>
                                        <?php $sn++;?>
                                    <?php endforeach;?>
                                </tbody>
                                
                            </table>
                            </div>
                        </div>
                        
                    </div>
                <?php endif;?>
                <?php unset($_SESSION['pinlogs']);?>
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