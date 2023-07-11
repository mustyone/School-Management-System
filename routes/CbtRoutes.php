<?php
get('/cbt', 'views/cbt/student/index');
get('/cbt/student/dashboard', 'views/cbt/student/dashboard');
get('/cbt/close', 'controllers/cbt/close');


get('/cbt/dashboard', 'views/cbt/dashboard');
get('/cbt/createexam','views/cbt/createexam');
get('/cbt/examlist','views/cbt/examlist');

post('/cbt/verifystudentid','controllers/cbt/verifystudentid');
post('/cbt/insertcreateexams','controllers/cbt/insertcreateexams');

get('/cbt/submit', 'controllers/cbt/submitfil');