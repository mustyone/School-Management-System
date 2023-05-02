<?php
get('/result', 'views/result/login');
get('/logout', 'controllers/result/logout');
get('/result/admin/dashboard', 'views/result/admin/dashboard');

get('/result/admin/schoolinfo', 'views/result/admin/schoolinfo');

get('/result/admin/newsession', 'views/result/admin/newacademicsession');
get('/result/admin/academicsessions', 'views/result/admin/academicsessions');
get('/result/admin/editsession/$id', 'views/result/admin/editsession');
get('/result/admin/deletesession/$id', 'views/result/admin/deletesession');
get('/result/admin/markactivesession/$id', 'views/result/admin/markactivesession');

get('/result/admin/newsection', 'views/result/admin/newsection');
get('/result/admin/allsections', 'views/result/admin/allsections');
get('/result/admin/editsection/$id', 'views/result/admin/editsection');
get('/result/admin/deletesection/$id', 'views/result/admin/deletesection');

get('/result/admin/newclass', 'views/result/admin/newclass');
get('/result/admin/allclasses', 'views/result/admin/allclasses');
get('/result/admin/editclass/$id', 'views/result/admin/editclass');
get('/result/admin/deleteclass/$id', 'views/result/admin/deleteclass');

get('/result/admin/newsubject', 'views/result/admin/newsubject');
get('/result/admin/allsubjects', 'views/result/admin/allsubjects');
get('/result/admin/editsubject/$id', 'views/result/admin/editsubject');
get('/result/admin/deletesubject/$id', 'views/result/admin/deletesubject');

get('/result/admin/grading', 'views/result/admin/grading');
get('/result/admin/grading/$section_id', 'views/result/admin/grading');

get("/result/admin/newassesment", 'views/result/admin/newassesment');
get("/result/admin/allassesments", 'views/result/admin/allassesments');
get('/result/admin/editassesment/$id', 'views/result/admin/editassesment');
get('/result/admin/deleteassesment/$id', 'views/result/admin/deleteassesment');


get('/result/admin/comments', 'views/result/admin/comments');
get('/result/admin/comments/$section_id', 'views/result/admin/comments');
get('/result/admin/deletecomment/$id', 'views/result/admin/deletecomment');

get('/result/admin/newstudent', 'views/result/admin/newstudent');
get('/result/admin/newbulkstudent', 'views/result/admin/newbulkstudent');
get('/result/admin/registerstudent', 'views/result/admin/registerstudent');
get('/result/admin/deleteregistration/$id', 'views/result/admin/deleteregistration');
get('/result/admin/students', 'views/result/admin/allstudents');
get('/result/admin/editstudent/$id', 'views/result/admin/editstudent');
get('/result/admin/deletestudent/$id', 'views/result/admin/deletestudent');
get('/result/admin/studentfile','views/result/admin/studentfile');

get('/result/admin/uploadreport','views/result/admin/uploadreport');
get('/result/admin/updatereport','views/result/admin/updatereport');
get('/result/admin/recordingsheet','/views/result/admin/recordingsheet');
get('/result/admin/studentreport','/views/result/admin/studentreport');


get('/result/admin/subjectbroadsheet', '/views/result/admin/subjectbroadsheet');


get('/result/admin/newteacher', '/views/result/admin/newteacher');
get('/result/admin/teachers', '/views/result/admin/allteachers');
get('/result/admin/editteacher/$id', 'views/result/admin/editteacher');
get('/result/admin/deleteteacher/$id', 'views/result/admin/deleteteacher');
get('/result/admin/blockteacher/$id', 'controllers/result/blockteacher');
get('/result/admin/unblockteacher/$id', 'controllers/result/unblockteacher');
get('/result/admin/assignsubjects', '/views/result/admin/assignsubjects');
get('/result/admin/assignclassteacher', '/views/result/admin/assignclassteacher');


get('/result/admin/preparepromotionlist', '/views/result/admin/preparepromotionlist');
get('/result/admin/promotionlist', '/views/result/admin/promotionlist');

get('/result/admin/newbackup', '/views/result/admin/backup');
get('/result/admin/backuprecords', '/views/result/admin/backuprecords');
get('/result/admin/deletebackup/$id', 'controllers/result/deletebackup');
get('/result/admin/restorebackup', '/views/result/admin/restorebackup');

get('/result/admin/upgradeapp', '/views/result/admin/upgradeapp');

get('/result/admin/changepassword', '/views/result/admin/changepassword');


get('/result/teacher/dashboard','/views/result/teacher/dashboard');
get('/result/teacher/uploadreport','/views/result/teacher/uploadreport');
get('/result/teacher/updatereport','/views/result/teacher/updatereport');
get('/result/teacher/uploadreport/$subject_id/$class_id','/controllers/result/uploadreport_teacher');
get('/result/teacher/updatereport/$subject_id/$class_id','/controllers/result/updatereport_teacher');


get('/result/teacher/changepassword', '/views/result/teacher/changepassword');


//##################################  POST REQUESTS #########################################################
post('/result/teacher/saveresult','controllers/result/saveresult');
post('/result/teacher/updateresult','controllers/result/updateresult');
post('/result/teacher/changepassword', 'controllers/result/changepassword_teacher');

post('/result/admin/savesettings', 'controllers/result/savesettings');
post('/result/admin/changepassword', 'controllers/result/changepassword');

post('/result/admin/backupdatabase','controllers/result/backupdatabase');
post('/result/admin/restorebackup','controllers/result/restorebackup');

post('/result/admin/showpromotionlist', 'controllers/result/showpromotionlist');
post('/result/admin/showpromotionlists', 'controllers/result/showpromotionlists');

post('/result/admin/savepromotionlist', 'controllers/result/savepromotionlist');


post('/result/admin/newteacher', 'controllers/result/addteacher');
post('/result/admin/updateteacher','controllers/result/updateteacher');
post('/result/admin/deleteteacher', 'controllers/result/deleteteacher');
post('/result/admin/showsubjectassignment', 'controllers/result/showsubjectassignment');
post('/result/admin/saveassignments', 'controllers/result/saveassignments');
post('/result/admin/showclassassignment', 'controllers/result/showclassassignment');
post('/result/admin/saveclassassignments', 'controllers/result/saveclassassignments');



post('/result/admin/fetchbroadsheet', 'controllers/result/fetchbroadsheet');


post('/result/admin/uploadreport','controllers/result/uploadreport');
post('/result/admin/updatereport','controllers/result/updatereport');
post('/result/admin/updateresult','controllers/result/updateresult');
post('/result/admin/saveresult','controllers/result/saveresult');
post('/result/admin/recordingsheet','controllers/result/recordingsheet');
post('/result/admin/fetchresult', 'controllers/result/fetchresult');

post('/result/admin/updatestudent', 'controllers/result/updatestudent');
post('/result/admin/deleteregistration', 'controllers/result/deleteregistration');
post('/result/admin/registerstudent', 'controllers/result/registerstudent');
post('/result/admin/newstudent', 'controllers/result/savestudent');
post('/result/admin/newbulkstudent', 'controllers/result/savestudents');
post('/result/admin/showstudents', 'controllers/result/showstudents');
post('/result/admin/filterstudents', 'controllers/result/filterstudents');
post('/result/admin/deletestudent', 'controllers/result/deletestudent');
post('/result/admin/showstudentfile', 'controllers/result/showstudentfile');



post('/result/admin/showcomments', 'controllers/result/showcomments');
post('/result/admin/updatecomments', 'controllers/result/updatecomments');
post('/result/admin/savecomments', 'controllers/result/savecomments');
post('/result/admin/deletecomment', 'controllers/result/deletecomment');


post('/result/admin/newassesment', 'controllers/result/savetest');
post('/result/admin/editassesment', 'controllers/result/updateassesment');
post('/result/admin/deleteassesment', 'controllers/result/deleteassesment');

post('/result/admin/showgrading', 'controllers/result/showgrading');
post('/result/admin/updategrading', 'controllers/result/updategrading');
post('/result/admin/savegrading', 'controllers/result/savegrading');



post('/result/admin/newsubject', 'controllers/result/savesubject');
post('/result/admin/editsubject', 'controllers/result/updatesubject');
post('/result/admin/deletesubject', 'controllers/result/deletesubject');

post('/result/admin/updateacademicsession', 'controllers/result/updateacademicsession');
post('/result/admin/deleteacademicsession', 'controllers/result/deleteacademicsession');
post('/result/admin/markactivesession', 'controllers/result/markactivesession');

post('/result/admin/newsection', 'controllers/result/savesection');
post('/result/admin/editsection', 'controllers/result/updatesection');
post('/result/admin/deletesection', 'controllers/result/deletesection');

post('/result/admin/newclass', 'controllers/result/saveclass');
post('/result/admin/editclass', 'controllers/result/updateclass');
post('/result/admin/deleteclass', 'controllers/result/deleteclass');



