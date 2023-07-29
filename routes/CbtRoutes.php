<?php
get('/cbt', 'views/cbt/student/index');
get('/cbt/student/dashboard', 'views/cbt/student/dashboard');
get('/cbt/close', 'controllers/cbt/close');


get('/cbt/dashboard', 'views/cbt/dashboard');
get('/cbt/createexam','views/cbt/createexam');
get('/cbt/examlist','views/cbt/examlist');
get('/cbt/updateexam/$id','views/cbt/updateexam');
get('/cbt/picexams','views/cbt/picexams');
get('/cbt/viewquestion','views/cbt/viewquestion');
get('/cbt/picsubjects','views/cbt/picsubjects');
get('/cbt/questions','views/cbt/questions');

get('/cbt/instructions','views/cbt/student/instructions');
get('/cbt/exams','views/cbt/student/exams');

post('/cbt/verifystudentid','controllers/cbt/verifystudentid');
post('/cbt/insertcreateexams','controllers/cbt/insertcreateexams');
post('/cbt/updateexams','controllers/cbt/updateexams');
post('/cbt/picexam','controllers/cbt/picexam');
post('/cbt/picsubject','controllers/cbt/picsubject');
post('/cbt/question','controllers/cbt/question');

get('/cbt/submit', 'controllers/cbt/submitfil');