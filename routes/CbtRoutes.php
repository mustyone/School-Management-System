<?php
get('/cbt', 'views/cbt/student/index');
get('/cbt/student/dashboard', 'views/cbt/student/dashboard');
get('/cbt/close', 'controllers/cbt/close');


get('/cbt/dashboard', 'views/cbt/dashboard');
get('/cbt/createexam','views/cbt/createexam');
get('/cbt/examlist','views/cbt/examlist');
get('/cbt/updateexam/$id','views/cbt/updateexam');

post('/cbt/verifystudentid','controllers/cbt/verifystudentid');
post('/cbt/insertcreateexams','controllers/cbt/insertcreateexams');
post('/cbt/updateexams','controllers/cbt/updateexams');

get('/cbt/submit', 'controllers/cbt/submitfil');