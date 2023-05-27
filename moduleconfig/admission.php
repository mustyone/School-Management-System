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
}