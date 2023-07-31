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
                                    Questions
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
                        <h3 class="block-title">Questions</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/cbt/question" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <?php for ($i = 0; $i < $_SESSION['number_of_question_per_subject']; $i++) : ?>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">
                                                            Question <?= $i + 1; ?><span class="text-danger">*</span>
                                                        </label>

                                                        <input type="text" class="form-control texteditor" placeholder="" name="question<?= $i ?>">
                                                    </div>

                                                    <div class="mb-2 form-group d-flex gap-3">

                                                        <div>
                                                            <input id='qtypeSC<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='sc' type="radio" name="optiontype<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeSC<?= $i; ?>">Single Choice</label>
                                                        </div>
                                                        <div>
                                                            <input id='qtypeMC<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='mc' type="radio" name="optiontype<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeMC<?= $i; ?>">Multiple Choice</label>

                                                        </div>
                                                        <div>
                                                            <input id='qtypeTF<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='tf' type="radio" name="optiontype<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeTF<?= $i; ?>">True/False</label>
                                                        </div>

                                                    </div>

                                                    <!-- Single choice options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatSC-<?= $i; ?>" >
                                                        <small>Pick the correct answer using the radios</small>
                                                        
                                                        <button type="button" data-option-wrapper-key='<?= $i; ?>' class="btn btn-outline-primary float-end newSCOption mb-1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>

                                                        <div class="form-group SCOptionsWrapper<?= $i; ?>">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">
                                                                    <input style="cursor:pointer" type="radio" name="optionanswer<?= $i ?>" id="">
                                                                </span>
                                                                <input type="text" name="options<?= $i ?>[]" class="form-control">
                                                                <span class="input-group-text">
                                                                    <button type="button" class='btn btn-sm text-danger deleteOption'>
                                                                        <i class='fa fa-trash'></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <!-- Multiple choice options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatMC-<?= $i; ?>">
                                                        <small>Pick the correct answers applicable </small>
                                                        <button type="button" data-option-wrapper-key='<?= $i; ?>' class="btn btn-outline-primary float-end newMCOption mb-1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <div class="form-group MCOptionsWrapper<?= $i; ?>">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">
                                                                    <input style="cursor:pointer" type="checkbox" name="optionanswer<?= $i ?>[]" id="">
                                                                </span>
                                                                <input type="text" name="options<?= $i ?>[]" class="form-control">
                                                                <span class="input-group-text">
                                                                    <button type="button" class='btn btn-sm text-danger deleteOption'>
                                                                        <i class='fa fa-trash'></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- True or false options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatTF-<?= $i; ?>">
                                                        <small>Pick the correct answer using the radios </small>
                                                       
                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">
                                                                    <input style="cursor:pointer" type="radio" name="optionanswer<?= $i ?>" id="">
                                                                </span>
                                                                <input type="text" name="options<?= $i ?>[]" value="True" readonly class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">
                                                                    <input style="cursor:pointer" type="radio" name="optionanswer<?= $i ?>" id="">
                                                                </span>
                                                                <input type="text" name="options<?= $i ?>[]" value="False" readonly class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <!-- include summernote css/js -->
    <link href="<?= BASE_URL ?>/assets/summernote/summernote-lite.min.css" rel="stylesheet">
    <script src="<?= BASE_URL ?>/assets/summernote/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.texteditor').focus(function(){
                $(this).summernote();
            })

            $('.optionformats').hide();

            let radioVal = null;
            let key = null;

            $('.questionTypeRadio').click(function(){
                
                radioVal = $(this).val();
                
                key = $(this).attr('data-key');

                $('.optionformat'+key).hide();

                
                if(radioVal === 'sc'){
                    let selector = '.optionformatSC-'+key;
                    $('.optionformatSC-'+key).show();
                    


                }
                else if(radioVal === 'mc'){
                    $('.optionformatMC-'+key).show();
                }
                else{
                    $('.optionformatTF-'+key).show();
                }



            });

            $('.newSCOption,.newMCOption').click(function(){
                let optionWrapperKey = $(this).attr('data-option-wrapper-key');
                
                if(radioVal === 'sc'){
                    let SCOptionsWrapper = $('.SCOptionsWrapper'+optionWrapperKey);
                    let option = `
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <input style="cursor:pointer" type="radio" name="optionanswer${optionWrapperKey}" id="">
                        </span>
                        <input type="text" name="options${optionWrapperKey}[]" class="form-control">
                        <span class="input-group-text">
                            <button type="button" class='btn btn-sm text-danger deleteOption'>
                                <i class='fa fa-trash'></i>
                            </button>
                        </span>
                    </div>
                    `;
                    SCOptionsWrapper.append(option);

                }

                if(radioVal === 'mc'){
                    let MCOptionsWrapper = $('.MCOptionsWrapper'+optionWrapperKey);
                    let option =  `
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <input style="cursor:pointer" type="checkbox" name="optionanswer${optionWrapperKey}[]" id="">
                        </span>
                        <input type="text" name="options${optionWrapperKey}[]" class="form-control">
                        <span class="input-group-text">
                            <button type="button" class='btn btn-sm text-danger deleteOption'>
                                <i class='fa fa-trash'></i>
                            </button>
                        </span>
                    </div>
                    `;
                    MCOptionsWrapper.append(option);
                }
            });

            //Delete an option
            $(document).on('click', '.deleteOption', function(){
                $(this).parent().parent().remove();
            });


        });
    </script>


</body>

</html>