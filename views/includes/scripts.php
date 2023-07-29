<script src="<?= BASE_URL ?>/assets/js/oneui.app.min.js"></script>

<!-- jQuery (required for jQuery Validation plugin) -->
<script src="<?= BASE_URL ?>/assets/js/lib/jquery.min.js"></script>


<!-- Page JS Plugins -->
<script src="<?= BASE_URL ?>/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?= BASE_URL ?>/assets/js/pages/op_auth_signin.min.js"></script>

<script src="<?= BASE_URL ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

<!--Custom JS-->
<script>
    $(document).ready(function() {

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(".datatable").DataTable();


        $("#section").change(function() {
            let sectionID = $("#section option:selected").attr('data-section-id');

            $("#sectionID").val(sectionID);
        });

        $("#addNewGradeRow").click(function() {
            const tbody = $("#tableBody");

            const tr = $("<tr>");

            const td = $("#template tr").html();

            tr.append(td);

            tbody.append(tr);

        });

        $(document).on("click", ".removeRow", function() {
            $(this).parent().parent().remove();
        });

        $(".test_score").change(function() {
            let score = parseInt($(this).val());
            let max_score = parseInt($(this).attr('max'));
            let row_id = $(this).attr('data-id');

            if (score > max_score) {
                $(this).val(0);
                alert(`${score} is more than ${max_score}`);
                $(this).focus();
            } else {
                let total_score = 0;
                let hidden_field = $(this).prev();
                let test_id = hidden_field.attr('data-test-id');

                hidden_field.val(test_id + ":" + score);

                console.log(hidden_field.val());
                //select all elements that have the same row_id
                $(".test_score[data-id=" + row_id + "]").each(function() {
                    total_score += parseInt($(this).val());
                });

                $(".total_score[data-id=" + row_id + "]").val(total_score);

                $.ajax({
                    url: '<?= BASE_URL ?>/controllers/result/getgrade.php',
                    method: 'GET',
                    data: {
                        'score': total_score,
                        'section_id': '<?php echo $_SESSION['data']['section_id'] ?? 0; ?>'
                    },
                    success: function(result) {
                        let data = JSON.parse(result);
                        let grade = data.grade;
                        let remark = data.remark;
                        $(".grade[data-id=" + row_id + "]").val(grade);
                        $(".remark[data-id=" + row_id + "]").val(remark);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }


        });

        $("#current_class_id").change(function() {
            $.ajax({
                url: '<?= BASE_URL ?>/controllers/result/getclasses.php',
                method: 'GET',
                data: {
                    'class_id': $("#current_class_id").val(),
                },
                success: function(data) {
                    let studentList = JSON.parse(data);
                    console.log(studentList);
                    let tr = "";
                    $("#student_list").html("");

                    for (key in studentList) {
                        let student = studentList[key];
                        let student_id = student.student_id;
                        let student_name = `${student.student_first_name} ${student.student_middle_name} ${student.student_last_name}`
                        tr += `
                    <tr>
                      <td><input checked type="checkbox" name="student_ids[]" value="${student_id}" /></td>
                      <td>${student_id}</td>
                      <td>${student.student_first_name}</td>
                      <td>${student.student_middle_name}</td>
                      <td>${student.student_last_name}</td>
                    </tr>
                    `;
                    }

                    $("#student_list").html(tr);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });



        $("#term_id").change(function() {
            $.ajax({
                url: '<?= BASE_URL ?>/controllers/result/getstudentdata.php',
                method: 'GET',
                data: {
                    'class_id': $("#student_class_id").val(),
                    'session_id': $("#session_id").val(),
                    'term_id': $("#term_id").val(),
                },
                success: function(data) {
                    let studentList = JSON.parse(data);
                    let optionsList = `<option value=''>Select a student</option>`;
                    $("#student_list").html("");

                    for (key in studentList) {
                        let student = studentList[key];
                        let optionVal = student.student_id;
                        let optionText = `${student.student_first_name} ${student.student_middle_name} ${student.student_last_name}`
                        optionsList += `<option value='${optionVal}'>${optionText}</option>`;
                    }

                    $("#student_list").html(optionsList);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $("#class_id").change(function() {
            $.ajax({
                url: '<?= BASE_URL ?>/controllers/result/getclasses.php',
                method: 'GET',
                data: {
                    'class_id': $(this).val()
                },
                success: function(data) {
                    let studentList = JSON.parse(data);
                    let optionsList = `<option value=''>Select a student</option>`;
                    $("#student_list").html("");

                    for (key in studentList) {
                        let student = studentList[key];
                        let optionVal = student.student_id;
                        let optionText = `${student.student_first_name} ${student.student_middle_name} ${student.student_last_name}`
                        optionsList += `<option value='${optionVal}'>${optionText}</option>`;
                    }

                    $("#student_list").html(optionsList);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $("#section_shot_code").change(function() {
            let id = $("#section_shot_code option:selected").attr('data-section-id');
            $("#section_id").val(id);
        });

        $("#print").click(function() {
            window.print();
        });

    });
</script>