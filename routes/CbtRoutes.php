<?php
get('/cbt', 'views/cbt/student/index');
get('/cbt/student/dashboard', 'views/cbt/student/dashboard');
get('/cbt/close', 'controllers/cbt/close');


get('/cbt/dashboard', 'views/cbt/dashboard');
get('/cbt/createexam','views/cbt/createexam');
get('/cbt/examlist','views/cbt/examlist');
get('/cbt/updateexam/$id','views/cbt/updateexam');
get('/cbt/picexams','views/cbt/picexams');

get('/cbt/picexamquestionbank','views/cbt/picexamquestionbank');
get('/cbt/picsubjectquestionbank','views/cbt/picsubjectquestionbank');

get('/cbt/viewquestionbank','views/cbt/viewquestionbank');

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
post('/cbt/insertquestions','controllers/cbt/insertquestions');
post('/cbt/picsubjectquestionbank','controllers/cbt/picsubjectquestionbank');

post('/cbt/viewquestionbank','controllers/cbt/viewquestionbank');

get('/cbt/submit', 'controllers/cbt/submitfil');