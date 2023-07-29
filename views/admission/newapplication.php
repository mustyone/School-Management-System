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
                                    New Application
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
                        <h3 class="block-title">New Application</h3>
                    </div>
                    <div class="block-content block-content-full">
                            <form action="/admission/checkbatches" method="POST">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Choose a Batch
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control" name="batch_id">
                                                        <?php foreach($batches as $batch):?>
                                                            <option value="<?= $batch['batch_id']?>"><?= $batch['batch_name'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>                                    
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="save">Proceed</button>
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
                <?php if(isset($_SESSION['batch_record'] )):?>
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Application Form - <?php echo $_SESSION['applicationRecord']['applicationNumber'] ?></h3>
                    </div>
                    <div class="block-content block-content-full">
                            <form action="/admission/applicationform" method="POST" enctype="multipart/form-data">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <?php if($_SESSION['batch_record']['require_pin'] === "yes"):?>
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Pin <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('pin') ?>" required type="text" class="form-control" placeholder="Enter Pin" name="pin">
                                                </div>
                                            </div>
                                            <?php endif;?>
                                            <div class="row">
                                             

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Class<span class="text-danger">*</span>
                                                    </label>
                                                    <select required class="form-control" name="class_id" id="">
                                                        <option>select a class</option>

                                                        <?php foreach($classes as $class): ?>
                                                            <option
                                                            <?= old('class_id') === $class['class_id'] ? 'selected' : '' ?> 
                                                            value="<?= $class['class_id'] ?>">
                                                                <?= $class['class_alternative_name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        First Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('first_name')?>" required type="text" class="form-control" name="first_name" placeholder="First Name">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Middle Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('middle_name')?>" required type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                                </div>

                                                
                                            </div>

                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Last Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('last_name')?>" required type="text" class="form-control" name="last_name" placeholder="Last Name">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('address')?>" required class="form-control" type="text" placeholder="Address" name="address">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Date Of Birth <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('date_of_birth')?>"  required class="form-control" type="date" placeholder="Date Of Birth" name="date_of_birth">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Nationality <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('nationality')?>" required class="form-control" type="text" placeholder="Nationality" name="nationality">
                                                </div>

                                                
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Sex <span class="text-danger">*</span>
                                                    </label>
                                                    <select required name="sex" class="form-control">
                                                        <option value="">sex</option>
                                                        <option <?php if(old('sex') === 'm') echo "selected";?> value="m">Male</option>
                                                        <option <?php if(old('sex') === 'f') echo "selected";?> value="f">Female</option>
                                                    </select>
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Religion <span class="text-danger">*</span>
                                                    </label>
                                                    <select required name="religion" class="form-control">
                                                        <option value="">Religion</option>
                                                        <option <?php if(old('religion') === 'c') echo "selected";?> value="c">Christenity</option>
                                                        <option <?php if(old('religion') === 'm') echo "selected";?> value="m">Muslim</option>
                                                    </select>
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">State Of Origin <span class="text-danger">*</span></label>
                                                    <input value="<?= old('state_of_origin')?>" required type="text" class="form-control" name="state_of_origin">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">Local Government <span class="text-danger">*</span></label>
                                                    <input value="<?= old('l_g_a')?>" required type="text" class="form-control" name="l_g_a">
                                                </div>

                                               
                                            </div>
                                        </div>
                                        

                                        <div class="mb-4">
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label class="form-label">
                                                        Image <span class="text-danger">*</span>

                                                        <?php if(file_exists(APP_PATH . "/assets/uploads/modules/"  . old('passport_photograpy'))): ?>
                                                        <?php if(old('passport_photograpy')):?>
                                                         <a href="#" data-bs-toggle="modal" data-bs-target="#showimage">View Photograph</a>
                                                         <?php endif;?>
                                                         <div class="modal" id="showimage" tabindex="-1" aria-labelledby="showimage" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="block block-rounded block-transparent mb-0">
                                                               
                                                                <div class="block-content text-center fs-sm">
                                                                    <img src="<?= BASE_URL . "/assets/uploads/modules/" .  old('passport_photograpy'); ?>" alt="Passport Image" width="100px" height="100px">
                                                                </div>
                                                                <div class="block-content block-content-full text-end bg-body">
                                                                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <?php endif; ?>
                                                    </label>
                                                    <input  type="file" placeholder="Image" name="passport_photograpy">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Father's Name<span class="text-danger">*</span>
                                                    </label>
                                                    <input  value="<?= old('father_name')?>" required class="form-control" type="text" placeholder="Father's Full Name" name="father_name">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Father's Occupation  <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('father_occupation')?>" required class="form-control" type="text" placeholder="Father's Occupation" name="father_occupation">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Contact Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('contact_address')?>" required class="form-control" type="text" placeholder="Contact Address" name="contact_address">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Postal Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('postal_address')?>" required class="form-control" type="text" placeholder="Postal Address" name="postal_address">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Tel <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('tel')?>" required class="form-control" type="text" placeholder="Tel Number" name="tel">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        E-mail <span class="text-danger">*</span>
                                                    </label>
                                                <input value="<?= old('email')?>" required class="form-control" type="email" placeholder="Email Address" name="email">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Mother's Name<span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('mother_name')?>" required class="form-control" type="text" placeholder="Mothers Name" name="mother_name">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Mother's Occupation  <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('mother_occupation')?>" required class="form-control" type="text" placeholder="Mothers Occupation" name="mother_occupation">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Contact Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('contact_address')?>" required class="form-control" type="text" placeholder="Contact Address" name="contact_address">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Postal Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('postal_address')?>" required class="form-control" type="text" placeholder="Postal Address" name="postal_address">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                             <div class="col-md">
                                                <label class="form-label">
                                                    Tel <span class="text-danger">*</span>
                                                </label>
                                                <input value="<?= old('tel')?>" required class="form-control" type="text" placeholder="Tel Number" name="tel">
                                                </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    E-mail <span class="text-danger">*</span>
                                                </label>
                                                <input value="<?= old('email')?>" required class="form-control" type="email" placeholder="Email Address" name="email">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Name of Guardian<span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('guardian_name')?>" required class="form-control" type="text" placeholder="Name Of Guardian" name="guardian_name">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Contact Address  <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('contact_address')?>" required class="form-control" type="text" placeholder="Contact Address" name="contact_address">
                                                </div>

                                                <div class="col-md">
                                                    <label class="form-label">
                                                        Postal Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="<?= old('postal_address')?>" required class="form-control" type="text" placeholder="Postal Address" name="postal_address">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-4">
                                            <div class="row">
                                             <div class="col-md">
                                                <label class="form-label">
                                                    Tel <span class="text-danger">*</span>
                                                </label>
                                                <input value="<?= old('tel')?>" required class="form-control" type="text" placeholder="Tel Number" name="tel">
                                                </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    E-mail <span class="text-danger">*</span>
                                                </label>
                                                <input value="<?= old('email')?>" required class="form-control" type="email" placeholder="Email Address" name="email">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif;?>
                    <?php unset($_SESSION['batch_record']);?>
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