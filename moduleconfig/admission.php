<?php 
switch ($route){
    case "/admission/newbatch":
        $current_page = "application";
        $page_title = "application";
        $page_description = "Nwe Batch";

        //get session
        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $sessions = [];
        while($row = mysqli_fetch_assoc($result)){
            $sessions[] = $row;


        };

        break;
    case "/admission/viewbatches":
        $current_page = "application";
        $page_title = "application";
        $page_description = "View Batches";

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
        $current_page = "application";
        $page_title = "application";
        $page_description = "Update Batch";

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
        $current_page = "application";
        $page_title = "application";
        $page_description = "New Application";

    case "/admission/bulkadmission":
        $current_page = "application";
        $page_title = "application";
        $page_description = "Bulk Admission";

    case "/admission/singleadmission":
        $current_page = "application";
        $page_title = "application";
        $page_description = "Single Admission";
        
    case "/admission/viewapplications":
        $current_page = "application";
        $page_title = "application";
        $page_description = "View Application";

    case "/admission/bulkadmissionletter":
        $current_page = "application";
        $page_title = "application";
        $page_description = "Bulk Admission Letter";

    case "/admission/generatepin":
        $current_page = "application";
        $page_title = "application";
        $page_description = "new application";

    case "/admission/pinlogs":
        $current_page = "application";
        $page_title = "application";
        $page_description = "pin log";
    
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
            $current_page = "application";
            $page_title = "application";
            $page_description = "applications record";

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
                $current_page = "application";
                $page_title = "application";
                $page_description = "Dashboard applications record";


                $query = "SELECT * FROM admission_batches WHERE status ='open'";
                $result = mysqli_query($dbc,$query);

                $num_rows = mysqli_num_rows($result);
                if($num_rows ===1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['batch_name'] = $row['batch_name']; 
                    $_SESSION['batch_id'] = $row['batch_id'];
                }
                $query = "SELECT * FROM admission_application_form"; 
                //look for a way to get current applications for current id
                //there is no batch_id in application form and no class_id in batches WHERE batch_id ='$row[batch_id]'";
                $result = mysqli_query($dbc,$query);
                $num_rows = mysqli_num_rows($result);
                if($num_rows >=1){
                    $_SESSION['number_of_applications'] = $num_rows;
                }
                else{
                    echo "There Is No Current Batch";
                }

                
                break;
    
}
