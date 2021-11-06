<?php
    include_once('../db.conn.php') ;
    $http_response_header["content-type"] = "application/json" ;
    $sql = "SELECT * FROM roj_problems "  ;
    $result = mysqli_query($conn,$sql) ;
    echo "[" ;
    if (mysqli_num_rows($result) > 0) {
        $first = 1;
        $ks = 0 ;
        if( $_GET["page"]!= NULL ){
            $ks = $_GET["page"] ;
        }
        $ksbe  = 20 *($ks-1 ) + 1 ;
        $cur = 1 ;
        $arr = array() ;
        while($row = mysqli_fetch_assoc($result)) {
            
            if( $row['problem_id']!= 1000 && (($ks!=0 && $cur >= $ksbe && $cur<=$ksbe+20) ||$ks == 0 ) ){
                if( $first == 0){
                    echo "," ;
                }
                if( $first == 1){
                    $first = 0 ;
                }
                echo "{" . '"problem_id":'.$row['problem_id'] .",".'"problem_name":'.'"'.$row['problem_name'].'",'.'"problem_description":'.'"'.$row['problem_description'].'"'.
                    ',"problem_time_limit":'.$row['problem_time_limit'].',"problem_memory_limit":"'.$row['problem_memory_limit']
                    .'"}';
                $ele = array(
                    "problem_id"=>$row['problem_id'] ,
                    "problem_name"=>$row["problem_name"],
                    "problem_time_limit"=>$row["problem_time_limit"],
                    "problem_memory_limit"=>$row['problem_memory_limit'],
                    "problem_description"=>$row['problem_description']
                );
                $arr[] = $ele ;
            }

            $cur++ ;
        }
    } else {
        echo "";
    }
    
    echo "]" ;
    
    mysqli_close($conn);

?>