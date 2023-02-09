<table style="border: 2px solid #333 !important;">
    <tbody>
        <tr>
            <td>
                <img src="/student_pictures/<?php echo $result['result_student_id']; ?>.jpg" width="100px" height="100px" alt="">
            </td>
            <td class="text-center">
                <h3> <?php echo setting('school_name') ?></h3>
                <p><?php echo setting('school_address') ?></p>
                <p>Tel: <?php echo setting('school_telephone') ?></p>
            </td>

            <td class="text-center">
                <img src="/assets/images/logo.png" width="100px" height="100px" alt="">
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="text-align:center;">
                            <?php
                            echo strtoupper($studentInfo['name']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <?php
                            echo strtoupper($studentInfo['student_id']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;"><?= strtoupper($studentInfo['gender']); ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>Class</td>
                        <td>
                            <?php echo $studentInfo['class']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Session</td>
                        <td><?php echo $session ?></td>
                    </tr>
                    <tr>
                        <td>Term</td>
                        <td><?php echo getTermName($term) ?></td>
                    </tr>

                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>House</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>NIC</td>
                        <td><?php echo $nic = number_in_class($studentInfo['class_id']) ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?= date("M d, Y") ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">
                <p class="h4" style=""><?php echo strtoupper(getTermName($term)) ?> TERM RESULT</p>
            </td>
        </tr>
        <tr>
            <?php
            $tests_category = fetchtests($studentInfo['class_id']);
            ?>
            <table>
                <thead>
                    <tr>
                        <td style="text-align: center;">S/N</td>
                        <td style="text-align: center;">Subject</td>
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
                    <?php $sn = 1;
                    $total_score = $numberOfSubjects =  0; ?>
                    <?php foreach ($results as $subjectResult) : ?>
                        <?php
                        $total_score += $subjectResult['result_total_score'];
                        $numberOfSubjects++;
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $sn++; ?></td>
                            <td style="text-align: center;"><?php echo $subjectResult['subject_name'] ?></td>
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
                    <td colspan="5" style="text-align: right;">Total</td>
                    <td style="text-align: center;"><?php echo $total_score; ?></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right;">Average</td>
                    <td style="text-align: center;"><?php echo round($total_score / $nic, 2); ?></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right;">Position</td>
                    <td style="text-align: center;">

                        <?php 
                        echo getPosition(
                            $result['result_student_id'],
                            $result['result_session_id'],
                            $result['result_term'],
                            $result['result_class_id'],
                            $nic
                        );
                        ?>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>
        </tr>
    </tbody>
</table>