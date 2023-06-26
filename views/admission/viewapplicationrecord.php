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
                                    Full Applications
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
                        <h3 class="block-title">Full Applications</h3>

                        <button class='btn btn-primary'>
                            <i class="fa fa-print"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full">
                        <table>
                            <tr>
                                <td style="width:25%;border:1px solid black;">
                                    <img class="mx-auto d-block" style="width:40%; " src="<?php echo BASE_URL ."/assets/uploads/modules/".$_SESSION['records'][0]['passport_photograpy']?>">
                                </td>
                                <td style="text-align:center;border:1px solid black;">
                                    <h3 style="margin:0;font-weight:800;"><?= getSetting('school_name'); ?></h3>
                                    <p style="margin:0;"><?= getSetting('school_address') ?></p>
                                    <p style="margin:0;"><?= getSetting('school_telephone') ?></p>
                                </td>
                                <td style="width:25%;border:1px solid black;">
                                    <img class="mx-auto d-block" style="width:50%;" src="/assets/uploads/logo/logo.png" alt="School Logo">
                                </td>
                            </tr>
                            <tr style="border:1px solid black;">
                                <td style="text-align:left;width:30%;vertical-align:top;font-size:12px;">
                                    <span><b>Application Number: </b></span>
                                    <h5><?= $_SESSION['records'][0]['app_number'];?></h5>
                                </td>
                                <td colspan="2" style="text-align:left;vertical-align:bottom;">
                                    <h3 style="font-weight:bolder">ADMISSION APPLICATION FORM</h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border:1px solid black;">
                                    <p>NAME OF CHILD:  <?= strtoupper($_SESSION['records'][0]['first_name']." ".$_SESSION['records'][0]['middle_name']." ".$_SESSION['records'][0]['last_name']);?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:20%;border:1px solid black;">
                                                <p>AGE: 
                                                    <?php $date = date("Y",strtotime($_SESSION['records'][0]['date_of_birth']));
                                                        $currenctdate = date("Y") - $date;
                                                        echo $currenctdate;
                                                    ?>
                                                </p>
                                            </td>
                                            <td style="width:20%;border:1px solid black;">
                                                <p>SEX: 
                                                    <?php if($_SESSION['records'][0]['sex'] === 'f') echo 'FEMALE';?>
                                                    <?php if($_SESSION['records'][0]['sex'] === 'm') echo 'MALE';?>
                                                </p>
                                            </td>
                                            <td style="border:1px solid black;">
                                                <p>CHILD DATE OF BIRTH(Y,M,D): <?= $_SESSION['records'][0]['date_of_birth'];?></p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:50%;border:1px solid black;">
                                                <p>CLASS: <?= strtoupper($_SESSION['records'][0]['class_alternative_name']);?></p>
                                            </td>
                                            <td style="width:50%;border:1px solid black;">
                                                <p>NATIONALITY: <?= strtoupper($_SESSION['records'][0]['nationality']);?></p>                         
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border:1px solid black;">
                                    <p>STATE: <?= strtoupper($_SESSION['records'][0]['state_of_origin'])?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border:1px solid black;">
                                    <p>LOCAL GOVERNMENT: <?= strtoupper($_SESSION['records'][0]['l_g_a'])?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border:1px solid black;">
                                    <p>ADDRESS: <?= strtoupper($_SESSION['records'][0]['address'])?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border:1px solid black">
                                    <p>RELIGION: 
                                        <?php if($_SESSION['records'][0]['religion'] === "c"){echo "CHRISTIAN";} else echo "MUSLIM"
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:50%;padding-right:5px;">
                                                <table style="width:100%;border-collapse:separate;">
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <b><p>FATHER INFORMATION</p></b>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <?php $fatherInfo = json_decode($_SESSION['records'][0]['father_info']); ?>

                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">FATHER NAME: <br> <b><?= strtoupper($fatherInfo->father_name); ?></b></p>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">OCCUPATION: </br><b><?= strtoupper($fatherInfo->father_occupation);?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">CONTACT ADDRESS: </br><b><?= strtoupper($fatherInfo->contact_address);?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">POSTAL ADDRESS: </br><b><?= strtoupper($fatherInfo->postal_address);?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">TEL: </br><b><?= $fatherInfo->tel;?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">EMAIL: </br><b><?= $fatherInfo->email;?></b></p>
                                                        </td>
                                                    </tr>
                                                </table>


                                            </td>
                                            <td style="width:50%;padding-left:5px;">
                                                <table style="width:100%;border-collapse:separate;">
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <b><p>MOTHER INFORMATION</p></b>
                                                        </td>
                                                    </tr>
                                                    <?php $motherInfo = json_decode($_SESSION['records'][0]['mother_info'],true);?>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">NAME: </br><b><?= strtoupper($motherInfo['mother_name'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">OCCUPATION: </br><b><?= strtoupper($motherInfo['mother_occupation'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">ADDRES: </br><b><?= strtoupper($motherInfo['contact_address'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">POSTAL ADDRESS: </br><b><?= strtoupper($motherInfo['postal_address'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">TEL: </br><b><?= $motherInfo['tel']?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">EMAIL: </br><b><?= $motherInfo['email']?></b></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                        </tr>

                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3" class="border:1px; text-center">
                                    <p>in the eventof an emergency, <?= strtolower(getSetting('school_name')); ?> schould please contact:</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3">
                                    <table style="width:100%;">
                                        <tr>
                                            <td style="width:50%;padding-right:5px;">
                                                <table style="width:50%;border-collapse:separate;">
                                                    <?php $guadianinfo = json_decode($_SESSION['records'][0]['guardian_info'],true)?>
                                                    <tr>
                                                        <td style="border:1px solid black">
                                                            <b><p>GURDIANT INFORMATION</p></b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">NAME: </br><b><?= strtoupper($guadianinfo['guardian_name'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">CONTACT ADRESS: </br><b><?=strtoupper($guadianinfo['contact_address'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">POSTALL ADDRESS: </br><b><?= strtoupper($guadianinfo['postal_address'])?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">TEL: </br><b><?= $guadianinfo['tel']?></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:1px solid black;">
                                                            <p style="margin:0;">EMAIL: </br><b><?= $guadianinfo['email']?></b></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            
                                        </tr>
                                    </table>
                                </td>
                            </tr>

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