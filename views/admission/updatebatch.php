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
                                    Update Batch
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
                        <h3 class="block-title">Update Batch</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/admission/updatebatch" method="POST">
                            <input type="hidden" value="<?php echo $data['batch_id'];?>" name="batch_id">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Batch Name <span class="text-danger">*</span>
                                                </label>
                                                <input required type="text" class="form-control" name="batch_name" value="<?= $data['batch_name']?>">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Batch Code <span class="text-danger">*</span>
                                                </label>
                                                <input required type="text" class="form-control" name="batch_code" value="<?= $data['batch_code']?>">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Session <span class="text-danger">*</span>
                                                </label>
                                                <select required name="session_id" class="form-control">
                                                    <?php foreach ($records as $session) : ?>
                                                        <option <?php if($data['session_id'] == $session['session_id']){ echo "selected";} ?> value="<?= $session['session_id']?>">
                                                            <?= $session['session_name']?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Term <span class="text-danger">*</span>
                                                </label>
                                                <select required name="term_id" class="form-control">
                                                    <option <?php if($data['term_id'] == "1" ) echo "selected"?> value="1">First</option>
                                                    <option <?php if($data['term_id'] == "2" ) echo "selected"?> value="2">Second</option>
                                                    <option <?php if($data['term_id'] == "3" ) echo "selected"?> value="3">Third</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Status <span class="text-danger">*</span>
                                                </label>
                                                <select required name="status" class="form-control">
                                                    
                                                    <option <?php if($data['status'] == 'open') echo "selected"?> value="open">open</option>
                                                    <option <?php if($data['status'] == 'closed') echo "selected"?> value="closed">closed</option>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                <input required value="<?= $data['start_date']?>" class="form-control" name="start_date">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                <input required value="<?= $data['end_date']?>" class="form-control" name="end_date">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Pin <span class="text-danger">*</span>
                                                </label>
                                                <select required name="require_pin" class="form-control">
                                                    <option <?php if($data['require_pin'] == "yes") echo "selected"?> value="yes">yes</option>
                                                    <option <?php if($data['require_pin'] == "no") echo "selected"?> value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                                </div>
                        </form>
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