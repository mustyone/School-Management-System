<?php 
get('/admission/dashboard', 'views/admission/dashboard.php');
get('/admission/newbatch', 'views/admission/newbatch.php');
get('/admission/viewbatches','views/admission/viewbatches.php');
get('/admission/newbatch','views/admission/newbatch.php');
get('/admission/updatebatch/$id','views/admission/updatebatch');
get('/admission/newapplication','views/admission/newapplication');
get('/admission/pin','views/admission/pin');
get('/admission/newapplication','views/admission/newapplication');
get('/admission/viewapplications','views/admission/viewapplications');
get('/admission/viewadmissionforms','views/admission/viewapplicationforms');
get('/admission/viewapplications','views/admission/viewapplications');
get('/admission/viewapplicationforms','controllers/admission/viewapplicationforms');
get('/admission/viewapplicationrecord/$app_id','views/admission/viewapplicationrecord');
get('/admission/viewapplicationrecord','views/admission/viewapplicationrecord');
get('/admission/singleadmission','views/admission/singleadmission');
get('/admission/bulkadmission','views/admission/bulkadmission');
get('/admission/viewbatches','views/admission/viewbatches');

get('/admission/sigleadmissionletter','views/admission/sigleadmissionletter');
get('/admission/bulkadmissionletter','views/admission/bulkadmissionletter');
get('/admission/bulkadmissionletters','views/admission/bulkadmissionletters');

get('/admission/generatepin','views/admission/generatepin');
get('/admission/admissionletter','views/admission/admissionletter');
get('/admission/pinlogs','views/admission/pinlogs');
get('/admission/updatebatchstatus/$batch_id','controllers/admission/updatebatchstatus');

get('/admission/confirmation','views/admission/confirmation');

post('/admission/newbatch','controllers/admission/savenewbatch');
post('/admission/updatebatch','controllers/admission/updateviewbatch');
post('/admission/checkbatches','controllers/admission/checkbatches');
post('/admission/applicationform','controllers/admission/applicationform');
post('/admission/viewapplication','controllers/admission/viewapplications');
post('/admission/selectsingleadmission','controllers/admission/selectsingleadmission');
post('/admission/savesingleadmission','controllers/admission/savesingleadmission');
post('/admission/selectbulkadmission','controllers/admission/selectbulkadmission');
post('/admission/savebulkadmission','controllers/admission/savebulkadmission');

post('/admission/getsingleletter','controllers/admission/getsingleletter');
post('/admission/getbulkadmitted','controllers/admission/getbulkadmitted');
post('/admission/confermstudent','controllers/admission/confermstudent');


post('/admission/generatingpins','controllers/admission/generatingpins');
post('/admission/selectpinlogs','controllers/admission/selectpinlogs');
