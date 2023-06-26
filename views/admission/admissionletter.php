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
                                    Admission Letter
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
                        <h3 class="block-title"></h3>
                    </div>
                    <div class="block-content block-content-full">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md text-center">
                                                    <img class="mx-auto d-block" style="width:10%; height:30%;" src="/assets/uploads/logo/logo.png" alt="School Logo">
                                                    <h3 style="margin:0;font-weight:800;"><?= getSetting('school_name'); ?></h3>
                                                    <p style="margin:0;"><?= getSetting('school_address')." ".getSetting('school_telephone') ?></p>
                                                    <hr style="border:1px solid; margin-top:0px;">
                                                </div>
                                            </div>
                                            <div class="row" style="padding-bottom:10%;">
                                                <div class="col-md">
                                                </div>
                                                <div class="col-md">
                                                </div>
                                                <div class="col-md">
                                                     <p ><?= date("M d, Y");?></p>   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <p style="margin:0;"><?= getSetting('school_address')." ".getSetting('school_telephone') ?></p>
                                                     <p><?= $_SESSION['student']['first_name']." ".$_SESSION['student']['middle_name'] ." ".$_SESSION['student']['last_name'];?></p>   
                                                </div>
                                            </div>
                                            <div class="row" style="padding-bottom:2%;">                                             
                                                <div class="col-md">
                                                    Dear <?= $_SESSION['student']['first_name']." ".$_SESSION['student']['middle_name'] ." ".$_SESSION['student']['last_name'];?>,
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                <div class="col-md">
                                                    <p>We are please to inform you that you have been admitted to the class of
                                                        <?=$_SESSION['student']['session_name']?> for the <?= strtolower(getSetting('school_name'));?>.
                                                        Attach to this admission letter, you will find a full admission package. it includes all documents
                                                        needed to follow up the registration which have to be submitted within four weeks.</br>
                                                        <p style="padding-bottom:2%;">Congratulation, We are looking forward to seeing you.</p>
                                                        </br><p style="padding-bottom:2%;">Sincerely,</p></br><p style="padding-bottom:2%;">Admission Committee</p>

                                                    </p>
                                                   
                                                </div>
                                                </div>
                                            </div>

                                        </div>

                                                  
                                    </div>
                                </div>
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