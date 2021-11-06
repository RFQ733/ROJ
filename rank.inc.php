<?php
    include_once('./engine/header.php') ;
    include('db.conn.php') ;
?>

<?php
        print <<<EOT
        <table class="table table-hover">
        <thead>
            <tr class="toprow">
                <th>排名</th>
                <th class="hidden-xs">
                    id
                </th>
                <th>
                    username								</th>
                <th class="hidden-xs">
                    rating								</th>
               
            </tr>
        </thead>
        <tbody>
            
        EOT ;
    $sql = 'SELECT roj_users.uid,roj_users.username,rank.rating FROM roj_users,`rank` WHERE 1 ORDER by rating DESC' ;
    $result = mysqli_query($conn,$sql) ;
    $http_response_header["content-type"] = "application/json" ;
    $index =1 ;
    if (mysqli_num_rows($result) > 0) {
        while( $row = mysqli_fetch_assoc($result) ){
            $arr =array(
                "username"=>$row["username"] ,
                "uid"=>$row["uid" ] ,
                "rating"=>$row["rating"]
            ) ;
            $arrall[] = $arr;
            $um = $arr['username'] ;
            $id = $arr['uid'] ;
            $rati = $arr["rating"] ;
            print <<<EOT
                <tr class="evenrow" >
                <td>
                    <div class="none"> $index </div>
                </td>
                <td class="hidden-xs">
                    <div class="center"> $id </div>
                </td>
                <td>
                    <div class="left"><a  >$um</a></div>
                </td>
                <td class="hidden-xs">
                    <div pid="1001" fd="source" class="center"> $rati</div>
                </td>
                
                </tr>
             EOT;
        
        $index++;
        }

    }
    // echo json_encode($arrall) ;
?>

    <script>
        $(".active").removeclass('active');
        $("#rank").addclass("active") ;

    </script>
<?php
    include_once('./engine/footer.php') ;
?>