<?php
$result = $_SESSION['result'][0];
?>
<?php if (!is_null($result) && count($result) > 0) : ?>
    <table style="border: 2px solid #333 !important;">
        <tr>
            <td style="text-align:center;width:20%;">
                <img src="/assets/images/logo.png" width="100px" height="100px" alt="">
            </td>

            <td style="text-align:center;">
                <h3 style="margin:0 ;"> <?php echo setting('school_name') ?></h3>
                <p style="margin:0 ;"><?php echo setting('school_address') ?></p>
                <p style="margin:0 ;"><?php echo setting('school_motto') ?></p>
                <p style="margin:0 ;">Tel: <?php echo setting('school_telephone') ?></p>
            </td>
            <td style="width: 20%;">
                <img src="/student_pictures/<?php echo $result['result_student_id']; ?>.jpg" width="100px" height="100px" alt="">
            </td>

        </tr>
        <tr style="background-color:black;color:#fff;">
            <td colspan="3" class="text-center">
                <span class="h3" style="color:white;">
                    <?php echo strtoupper(getTermName($result['result_term'])) ?> TERM RESULT
                </span>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td style="width: 20%;">CLASS</td>
                        <td style="text-align: center ;">
                            <?php echo $result['class_alternative_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">STUDENT NAME</td>
                        <td style="text-align: center ;">
                            <?php
                            echo strtoupper($result['student_first_name'] . " " . $result['student_middle_name'] . " " .  $result['student_last_name']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">ADMISSION NUMBER</td>
                        <td style="text-align: center ;width:20%">
                            <?php
                            echo strtoupper($result['student_id']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>GENDER</td>
                        <td style="text-align: center ;">
                            <?php echo strtoupper($result['gender'] ?? "NA") ?>
                        </td>
                    </tr>

                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>HOUSE</td>
                        <td style="text-align: center ;">-</td>
                    </tr>
                    <tr>
                        <td>SESSION</td>
                        <td style="text-align: center ;"><?php echo $result['session_name']; ?></td>
                    </tr>
                    <tr>
                        <td>TERM</td>
                        <td style="text-align: center ;"><?php echo getTermName($result['result_term']); ?></td>
                    </tr>
                    <tr>
                        <td>NUMBER IN CLASS</td>
                        <td style="text-align: center ;">
                            <?php
                            echo $nic = number_in_class(
                                $result['result_session_id'],
                                $result['result_term'],
                                $result['result_class_id']
                            );
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-end">
                <span>Date Generated: <?= date("F d, Y"); ?> </span>
            </td>
        </tr>

        <tr>
            <?php
            $tests_category = fetchtests($result['result_class_id']);
            ?>
            <table>
                <thead>
                    <tr style="background-color:#333333;color:#ffffff ;">
                        <td style="text-align: left;">Subject</td>
                        <?php foreach ($tests_category as $test) : ?>
                            <td style="text-align: center;">
                                <?php echo $test['test_name']; ?>
                            </td>
                        <?php endforeach; ?>
                        <td style="text-align: center;">Total</td>
                        <td style="text-align: center;">Grade</td>
                        <td style="text-align: center;">Remark</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    $total_score = $numberOfSubjects =  0; ?>
                    <?php foreach ($_SESSION['result'] as $subjectResult) : ?>
                        <?php
                        $total_score += $subjectResult['result_total_score'];
                        $numberOfSubjects++;
                        ?>
                        <tr>
                            <?php $sn++; ?>
                            <td style="text-align: left;"><?php echo $subjectResult['subject_name'] ?></td>
                            <?php foreach ($tests_category as $test) : ?>
                                <?php
                                $student_id = $subjectResult['result_student_id'];
                                $arr =  json_decode($subjectResult['result_test'], true);
                                $testScores = [];
                                foreach ($arr as $ar) {
                                    $exploded = explode(":", $ar);
                                    $testScores[$student_id][] = [
                                        $exploded[0] => $exploded[1]
                                    ];
                                }

                                $score = searchTestScores($testScores[$student_id], $test['test_id'])
                                ?>
                                <td style="text-align: center;">
                                    <?php echo $score; ?>
                                </td>
                            <?php endforeach; ?>
                            <td style="text-align: center;"><?php echo $subjectResult['result_total_score'] ?></td>
                            <td style="text-align: center;"><?php echo $subjectResult['result_grade'] ?></td>
                            <td style="text-align: center;"><?php echo $subjectResult['result_remark'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <td colspan="4" style="text-align: right;">Total</td>
                    <td style="text-align: center;"><?php echo $total_score; ?></td>
                    <td colspan="2"></td>
                </tr>

            </table>
        </tr>

    </table>
    <table>
        <tr>
            <td style="margin-right:50px;vertical-align:top ;">
                <table style="margin-bottom:10px">
                    <tr style="color:#fff;background-color:black;">
                        <td colspan="2">PSYCHOMOTOR SKILLS</td>
                    </tr>
                    <tr>
                        <td style="width:30% ;">Punctuality</td>
                        <td style="width: 10%;"><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Attendance in class</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Honesty</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Sport</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Creativity</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Promptness in completing work</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                    <tr>
                        <td>Relationship with other Students</td>
                        <td><?= random_char(); ?></td>
                    </tr>
                </table>
                <table>
                    <tr style="color:#fff;background-color:black;">
                        <td colspan="2">SKILL GRADE</td>
                    </tr>
                    <tr>
                        <td>EXCELLENT</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>VERY GOOD</td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>GOOD</td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td>PASS</td>
                        <td>D</td>
                    </tr>
                    <tr>
                        <td>FAIR</td>
                        <td>E</td>
                    </tr>
                </table>
            </td>
            <td style="margin-right:50px;vertical-align:top ;">
                <?php
                $gradingSystem = sectiongrading($result['section_id']);
                ?>
                <table>
                    <tr style="color:#fff;background-color:black;">
                        <td style="text-align: center ;" colspan="3">Keys to score grade</td>
                    </tr>
                    <?php foreach ($gradingSystem as $grade) : ?>
                        <tr>
                            <td><?= $grade['grade_min_score'] ?>-<?= $grade['grade_max_score'] ?></td>
                            <td><?= $grade['grade_char'] ?></td>
                            <td><?= $grade['grade_remark'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
            <td style="vertical-align:top;">
                <table style="margin-bottom: 10px;">
                    <tr>
                        <td>Average for term</td>
                        <td><?php echo round($avgTerm = $total_score / $numberOfSubjects, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Average for session</td>
                        <td>
                            <?php
                            echo getAverageForSession(
                                $result['result_student_id'],
                                $result['result_session_id'],
                                $result['result_class_id']
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>
                            <?php echo getPosition(
                                $result['result_student_id'],
                                $result['result_session_id'],
                                $result['result_term'],
                                $result['result_class_id'],
                                $nic
                            );
                            ?>
                        </td>
                    </tr>
                </table>

                <table>
                    <tr style="background-color:black;color:white;">
                        <td style="text-align:center ;" colspan="2">CLASS TEACHER</td>
                    </tr>
                    <tr>
                        <td style="text-align:center ;" colspan="2">
                            <strong><?= strtoupper(getClassTeacherName($result['result_class_id'], $result['result_session_id'])); ?></strong>
                        </td>
                    </tr>
                    <tr style="background-color:black;color:white;">
                        <td style="text-align:center ;" colspan="2">Class Teacher's Comment</td>
                    </tr>
                    <tr>
                        <td style="text-align:center ;" colspan="2">
                            <?= $result['result_term'] !== 3 ? getTeacherComment( $avgTerm ) : ""; ?>
                        </td>
                    </tr>

                    <tr style="margin-bottom:10px ;">
                        <td colspan="2">&nbsp;</td>
                    </tr>

                    <tr style="color:#fff;background-color:black;">
                        <td colspan="2" style="text-align:center ;">Next Term Begins</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p><?php echo setting('school_resumption_date'); ?></p>
                        </td>
                    </tr>

                    <tr style="margin-bottom:10px ;">
                        <td colspan="2">&nbsp;</td>
                    </tr>

                    <tr style="background-color:black;color:white;">
                        <td style="text-align:center ;" colspan="2">Class Teacher's Signature</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;height:80px;" colspan="2">

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr class="">
            <td style="background-color:black;color:white; width:20%;">
                <strong>Principal's comment</strong>
            </td>
            <td colspan="2">
                <?= $result['result_term'] !== 3 ? getPrincipalComment($avgTerm) : ""; ?>
            </td>
        </tr>
        <tr class="generalComment">
            <td colspan="3" style="text-align:center ;vertical-align:bottom;">
                <p><strong>Principal's Stamp & Signature</strong></p>
            </td>
        </tr>

        <tr style="background-color:black;color:white;">
            <td style="padding:5px;" colspan="2">
                <?php echo setting('result_footer'); ?>
            </td>
        </tr>
    </table>

<?php else : ?>
    <table style="border: 2px solid #333 !important;">
        <tr>
            <td colspan="3" style="text-align:center;">
                <h3>No result found for parameters chosen</h3>
            </td>
        </tr>
    </table>
<?php endif; ?>