<?php

$subjects = $_SESSION["broadsheet"]['subjects'];
$students = $_SESSION["broadsheet"]['students'];
?>

<div class="text-center">
    <span class="h3 d-block"><?= strtoupper(setting('school_name')) ?></span>
    <span class="h4 d-block">
        Subject Broadsheet for <?= $_SESSION['broadsheet']['session_name'] ?>
        <?= $_SESSION['broadsheet']['term_name'] . " Term" ?> 
    </span>
</div>
<div class="row">
    <div class="col-md-12">
        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Student name</th>
                    <?php
                    foreach ($subjects as $subject) {
                        foreach ($subject as $subject_id => $subject_name) {
                            $shortened_subject_name = substr($subject_name, 0, 3) . ".";
                            echo "<th style='text-align:center' class='diagonal-text'>{$shortened_subject_name}</th>";
                        }
                    }
                    ?>

                    <th>Total</th>
                    <th>Average</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>

                <?php $sn = 1; ?>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $student['student_first_name'] . " " . $student['student_middle_name'] . " " . $student['student_last_name'] ?></td>
                        <?php
                        $total_score = $subjectCount = 0;
                        foreach ($subjects as $subject) {
                            foreach ($subject as $subject_id => $subject_name) {
                                $score = getSubjectScore(
                                    $student['student_id'],
                                    $subject_id,
                                    $_SESSION['broadsheet']['session_id'],
                                    $_SESSION['broadsheet']['term_id']
                                );

                                if ($score > 0) {
                                    $subjectCount++;
                                }

                                $total_score += $score;
                                echo "<td style='text-align:center'>{$score}</td>";
                            }
                        }
                        ?>
                        <td><?php echo $total_score ?></td>
                        <td>
                            <?php

                            if ($subjectCount > 0) {
                                echo number_format($total_score / $subjectCount, 2);
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo getPosition(
                                $student['student_id'],
                                $_SESSION['broadsheet']['session_id'],
                                $_SESSION['broadsheet']['term_id'],
                                $student['student_class_id'],
                                count($students)
                            );
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>