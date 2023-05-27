<?php 
get('/admission/dashboard', 'views/admission/dashboard.php');
get('/admission/newbatch', 'views/admission/newbatch.php');
get('/admission/viewbatches','views/admission/viewbatches.php');
get('/admission/newbatch','views/admission/newbatch.php');
get('/admission/updatebatch/$id','views/admission/updatebatch');
post('/admission/newbatch','controllers/admission/savenewbatch.php');
post('/admission/updatebatch','controllers/admission/updateviewbatch');