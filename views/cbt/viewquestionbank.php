<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/loginchecker.php"); ?>
<?php include(APP_PATH . "/config/rolechecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>


<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
    <script>
        function showOptionFormat(key, optionFormat) {
            console.log(key);
            //hide all other optionformats
            const optionformats = document.querySelectorAll(`.optionformat${key}`);

            optionformats.forEach((format) => {
                format.style.display = 'none';
            });

        

            //show other option formats
            const el = document.querySelector(optionFormat);
            el.style.display = 'block';


        }
    </script>
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
                        <form enctype='multipart/form-data' action="/cbt/insertquestions" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">

                                            <?php foreach ($questions as $i => $question) : ?>



                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">
                                                            Question <?= $i + 1; ?><span class="text-danger">*</span>
                                                        </label>

                                                        <input type="hidden" value="<?= $i ?>" name="questions[]" class="form-control">
                                                        <textarea class="form-control texteditor" cols="2" rows="2" name="question-<?= $i ?>"><?php echo  htmlspecialchars_decode($question['question']); ?></textarea>
                                                    </div>

                                                    <div class="mb-2 form-group d-flex gap-3">


                                                        <div>
                                                            <input <?= $question['question_type'] === 'sigle choice' ? 'checked' : '' ?> id='qtypeSC<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='sc' type="radio" name="optiontype-<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeSC<?= $i; ?>">Single Choice</label>
                                                        </div>
                                                        <div>
                                                            <input <?= $question['question_type'] === 'multiple choice' ? 'checked' : '' ?> id='qtypeMC<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='mc' type="radio" name="optiontype-<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeMC<?= $i; ?>">Multiple Choice</label>

                                                        </div>
                                                        <div>
                                                            <input <?= $question['question_type'] === 'true/false' ? 'checked' : '' ?> id='qtypeTF<?= $i; ?>' data-key="<?= $i; ?>" class="questionTypeRadio" value='tf' type="radio" name="optiontype-<?= $i; ?>">
                                                            <label style="cursor:pointer" for="qtypeTF<?= $i; ?>">True/False</label>
                                                        </div>

                                                    </div>

                                                    <!-- Single choice options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatSC-<?= $i; ?>">
                                                        <small>Pick the correct answer using the radios</small>

                                                        <button type="button" data-option-wrapper-key='<?= $i; ?>' class="btn btn-outline-primary float-end newOption newSCOption mb-1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>

                                                        <div class="form-group SCOptionsWrapper<?= $i; ?>">

                                                            <?php
                                                            $options = json_decode($question['question_metadata'], true);
                                                            $answers =  json_decode($question['answer'], true);

                                                            ?>

                                                            <?php if ($question['question_type'] === 'sigle choice') : ?>
                                                                <?php foreach ($options as $option) : ?>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text">
                                                                            <input <?= in_array($option, $answers) ? 'checked' : ''; ?> style="cursor:pointer" type="radio" name="optionanswer-sc-<?= $i ?>" class="optionanswerradio">
                                                                        </span>
                                                                        <input type="text" value="<?= $option; ?>" name="options-sc-<?= $i ?>[]" class="form-control options">
                                                                        <span class="input-group-text">
                                                                            <button type="button" class='btn btn-sm text-danger deleteOption'>
                                                                                <i class='fa fa-trash'></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                            

                                                        </div>
                                                    </div>

                                                    <!-- Multiple choice options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatMC-<?= $i; ?>">
                                                        <small>Pick the correct answers applicable </small>
                                                        <button type="button" data-option-wrapper-key='<?= $i; ?>' class="btn btn-outline-primary float-end newOption newMCOption mb-1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <div class="form-group MCOptionsWrapper<?= $i; ?>">
                                                            <?php if ($question['question_type'] === 'multiple choice') : ?>
                                                                <?php foreach ($options as $option) : ?>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text">
                                                                            <input <?= in_array($option, $answers) ? 'checked' : ''; ?> style="cursor:pointer" type="checkbox" name="optionanswer-mc-<?= $i ?>[]" class="optionanswerradio">
                                                                        </span>
                                                                        <input value="<?= $option; ?>" type="text" name="options-mc-<?= $i ?>[]" class="form-control options">
                                                                        <span class="input-group-text">
                                                                            <button type="button" class='btn btn-sm text-danger deleteOption'>
                                                                                <i class='fa fa-trash'></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>

                                                            
                                                        </div>
                                                    </div>

                                                    <!-- True or false options-->
                                                    <div class="optionformats optionformat<?= $i; ?> optionformatTF-<?= $i; ?>">
                                                        <small>Pick the correct answer using the radios </small>
                                                        <?php if ($question['question_type'] === 'true/false') : ?>
                                                            <?php
                                                            $options = json_decode($question['question_metadata'], true);

                                                            ?>
                                                            <div class="form-group">
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text">
                                                                        <input <?= $answers[0] === 'True' ? 'checked' : ''; ?> style="cursor:pointer" value="True" type="radio" name="optionanswer-tf-<?= $i ?>">
                                                                    </span>
                                                                    <input type="text" name="options-tf-<?= $i ?>[]" value="True" readonly class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text">
                                                                        <input <?= $answers[0] === 'False' ? 'checked' : ''; ?> style="cursor:pointer" value="False" type="radio" name="optionanswer-tf-<?= $i ?>" class="optionanswerradio">
                                                                    </span>
                                                                    <input type="text" name="options-tf-<?= $i ?>[]" value="False" readonly class="form-control">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                       
                                                    </div>

                                                </div>

                                                <?php

                                                if ($question['question_type'] === 'sigle choice') {
                                                    echo '<script>showOptionFormat('.$i.', ".optionformatSC-' . $i . '")</script>';
                                                }

                                                if ($question['question_type'] === 'multiple choice') {
                                                    echo '<script>showOptionFormat('.$i.',".optionformatMC-' . $i . '")</script>';
                                                }

                                                if ($question['question_type'] === 'true/false') {
                                                    echo '<script>showOptionFormat('.$i.',".optionformatTF-' . $i . '")</script>';
                                                }
                                                ?>
                                            <?php endforeach; ?>
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
            $('.texteditor').summernote();

            let radioVal = null;
            let key = null;

            $('.options').keydown(function(e){
                if(e.keyCode === 9){
                    const button = $(this).parent().parent().parent().find('button.newOption');
                    button.trigger('click');
                }
            });

            $('.questionTypeRadio').click(function() {


                radioVal = $(this).val();


                key = $(this).attr('data-key');

                $('.optionformat' + key).hide();


                if (radioVal === 'sc') {
                    let selector = '.optionformatSC-' + key;
                    $('.optionformatSC-' + key).show();



                } else if (radioVal === 'mc') {
                    $('.optionformatMC-' + key).show();
                } else {
                    $('.optionformatTF-' + key).show();
                }



            });

            $('.newSCOption,.newMCOption').click(function() {
                let optionWrapperKey = $(this).attr('data-option-wrapper-key');

                if (radioVal === 'sc') {
                    let SCOptionsWrapper = $('.SCOptionsWrapper' + optionWrapperKey);
                    let option = `
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <input style="cursor:pointer" type="radio" name="optionanswer-sc-${optionWrapperKey}" class="optionanswerradio">
                        </span>
                        <input type="text" name="options-sc-${optionWrapperKey}[]" class="form-control">
                        <span class="input-group-text">
                            <button type="button" class='btn btn-sm text-danger deleteOption'>
                                <i class='fa fa-trash'></i>
                            </button>
                        </span>
                    </div>
                    `;
                    SCOptionsWrapper.append(option);

                }

                if (radioVal === 'mc') {
                    let MCOptionsWrapper = $('.MCOptionsWrapper' + optionWrapperKey);
                    let option = `
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <input style="cursor:pointer" type="checkbox" name="optionanswer-mc-${optionWrapperKey}[]" class="optionanswerradio">
                        </span>
                        <input type="text" name="options-mc-${optionWrapperKey}[]" class="form-control">
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


            $(document).on('click', '.optionanswerradio', function(e) {
                let inputVal = $(this).parent().next().val();
                if (inputVal.length <= 0) {
                    alert('You cant pick an empty answer');
                    e.preventDefault();
                    return;
                } else {
                    $(this).val(inputVal);
                }
            });


            //Delete an option
            $(document).on('click', '.deleteOption', function() {
                $(this).parent().parent().remove();
            });


        });
    </script>


</body>

</html>