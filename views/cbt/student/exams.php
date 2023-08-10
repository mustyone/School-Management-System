<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/studentloginchecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
</head>

<body>
    <div id="page-container">
        <main id="main-container">
            <!-- Hero -->
            <?php include APP_PATH . "/views/cbt/student/topbar.php"; ?>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    User Information
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered">

                                    <tr>
                                        <td colspan="3">
                                            <img class="img img-responsive" src="/assets/media/avatars/avatar0.jpg" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span><?= $studentRecord['student_id'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>
                                                <?= $studentRecord['student_first_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span><?= $studentRecord['student_middle_name'] ?></span>
                                        </td>
                                        <td>
                                            <span><?= $studentRecord['student_last_name'] ?></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span><?= $studentRecord['student_class_id'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span>
                                                <a class="btn w-100 btn-danger" href="/cbt/close">
                                                    <i class="fa fa-sign-out"></i>
                                                    Logout
                                                </a>
                                            </span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="block block-rounded">    
                            <div class="block-header block-header-default">
                            <span class="block-title">
                                <?php foreach($subjects as $subject):?>

                                        <button class="btn btn-success"><?= $subject['subject_name'] ?></button>
                                <?php endforeach;?>
                                </span>     
                            </div>
    
                            <div class="block-content">
                                <p>questions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block block-rounded">
                                <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="btabs-animated-fade-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-fade-home" role="tab" aria-controls="btabs-animated-fade-home" aria-selected="true">Home</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="btabs-animated-fade-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-fade-profile" role="tab" aria-controls="btabs-animated-fade-profile" aria-selected="false" tabindex="-1">Profile</button>
                                    </li>
                                    <li class="nav-item ms-auto" role="presentation">
                                    <button class="nav-link" id="btabs-animated-fade-settings-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-fade-settings" role="tab" aria-controls="btabs-animated-fade-settings" aria-selected="false" tabindex="-1">
                                        <i class="si si-settings"></i>
                                    </button>
                                    </li>
                                </ul>
                                <div class="block-content tab-content overflow-hidden">
                                    <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel" aria-labelledby="btabs-animated-fade-home-tab" tabindex="0">
                                    <h4 class="fw-normal">Home Content</h4>
                                    <p>Content fades in..</p>
                                    </div>
                                    <div class="tab-pane fade" id="btabs-animated-fade-profile" role="tabpanel" aria-labelledby="btabs-animated-fade-profile-tab" tabindex="0">
                                    <h4 class="fw-normal">Profile Content</h4>
                                    <p>Content fades in..</p>
                                    </div>
                                    <div class="tab-pane fade" id="btabs-animated-fade-settings" role="tabpanel" aria-labelledby="btabs-animated-fade-settings-tab" tabindex="0">
                                    <h4 class="fw-normal">Settings Content</h4>
                                    <p>Content fades in..</p>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>


            </div>
            <!-- END Page Content -->
        </main>
    </div>
    <!-- END Page Container -->

    <?php include "/../includes/scripts.php"; ?>
</body>

</html>