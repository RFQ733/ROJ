<?php
    Session_start();
 
    include("./db.conn.php") ;
    $um = $_POST["username"] ;
    $ans = false ;
    
    $sql = " SELECT * FROM roj_users where username='$um'" ;
    $result = mysqli_query($conn,$sql) ;
    if (mysqli_num_rows($result) > 0) {
        while( $row = mysqli_fetch_assoc($result) ){
            if( $row["password"] == $_POST["password"]) {
                $ans= true ;
                $uid = $row["uid"] ;

            }
        }
    }
    mysqli_close($conn);
    if( $ans == true ){
        $_SESSION["uid"] = $uid;
       
        $_SESSION["username"] = $um ;
    } else{
        $_SESSION["uid"] = -1 ;
    }
    echo $_SESSION["uid"] ;
    

    
?>
<?php
 
//客户端不支持cookie时，使用该办法传递session.
$SID = session_id();
echo '<br /><a href="index.php?' . $SID . '">通过URL传递SESSION</a>';
?>