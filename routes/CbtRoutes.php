<?php
get('/cbt', 'views/cbt/student/index');
get('/cbt/student/dashboard', 'views/cbt/student/dashboard');
get('/cbt/close', 'controllers/cbt/close');


get('/cbt/dashboard', 'views/cbt/dashboard');

post('/cbt/verifystudentid','controllers/cbt/verifystudentid');