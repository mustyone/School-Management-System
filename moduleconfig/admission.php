<?php 
switch ($route){
    case "/admission/newbatch":
        $CURRENT_PAGE = "dashboard";
        $PAGE_TITLE = "Dashboard";

        //get session
        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $sessions = [];
        while($row = mysqli_fetch_assoc($result)){
            $sessions[] = $row;


        };

        break;
    case "/admission/viewbatches":
        $CURRENT_PAGE = "updatebatch";
        $PAGE_TITLE = "Update Batch";

        //fetch all batches
        $query = "SELECT * FROM admission_batches LEFT JOIN sessions 
        ON admission_batches.session_id = sessions.session_id";
        $result = mysqli_query($dbc,$query);

        $batches = [];
        while($record = mysqli_fetch_assoc($result)){
            $batches[] = $record;
        }
        break;
    case "/admission/updatebatch/":
        $CURRENT_PAGE = "updatebatch";
        $PAGE_TITLE = "Update Batch";

        //fetch view record to update
        $query = "SELECT * FROM admission_batches WHERE batch_id ='$id'";
        $result = mysqli_query($dbc,$query);
        
        
        $data = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc,$query);
        
        $records = [];

        while($row = mysqli_fetch_assoc($result)){
            $records[] = $row;
        };

        break;
    case "/admission/newapplication":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";

    case "/admission/bulkadmission":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";
    case "/admission/singleadmission":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";
        
    case "/admission/viewapplications":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";

    case "/admission/bulkadmissionletter":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";

    case "/admission/generatepin":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";

    case "/admission/pinlogs":
        $CURRENT_PAGE = "new application";
        $PAGE_TITLE = "New Application";
        
        
    
        // fetch batches batch_name 
        $query = "SELECT * FROM admission_batches";
        $result = mysqli_query($dbc,$query);

        $batches = [];
        while($record = mysqli_fetch_assoc($result)){
            $batches[] = $record;
        }

        $classes = getClasses();


        break;
        case "/admission/viewapplicationrecord/":
            $CURRENT_PAGE = "application record";
            $PAGE_TITLE = "applications record";

            //query
            //extract($_GET);

            $query = "SELECT * FROM admission_applications 
            LEFT JOIN admission_application_form ON admission_applications.app_number = admission_application_form.app_number
            LEFT JOIN classes ON admission_application_form.class_id = classes.class_id LEFT JOIN admission_application_guardian ON admission_application_form.app_number = admission_application_guardian.app_number
            WHERE app_id ='$app_id'";

            $result = mysqli_query($dbc,$query);

            $num_rows = mysqli_num_rows($result);
            if($num_rows ===1){
                while($rows = mysqli_fetch_assoc($result)){
                    $_SESSION['records'][] = $rows;
                }
                header("location:/admission/viewapplicationrecord");
            }
            else{
                $_SESSION['error'] = "No Record Found";
                header("location:/admission/viewapplications?error=1");
            }

            break;
            case "/admission/dashboard":
                $CURRENT_PAGE = "application record";
                $PAGE_TITLE = "applications record";

                $query = "SELECT * FROM admission_batches WHERE status ='open'";
                $result = mysqli_query($dbc,$query);

                $num_rows = mysqli_num_rows($result);
                if($num_rows ===1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['batch_name'] = $row['batch_name']; 
                    $_SESSION['batch_id'] = $row['batch_id'];
                }
                $query = "SELECT * FROM admission_applications WHERE batch_id ='$row[batch_id]'";
                $result = mysqli_query($dbc,$query);
                $num_rows = mysqli_num_rows($result);

                $_SESSION['number_of_applications'] = $num_rows;
                break;
    
}
