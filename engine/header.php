<!DOCTYPE html>
<?php
Session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style>
        html,body{
            height: 100vh;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ROJ</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./index.php">HOME</a></li>
                <li id="about"><a href="#">About</a></li>
                <li id="rank"><a href="./rank.inc.php">Rank</a></li>
            </ul>
  <?php
               
                if( $_SESSION["uid"] != NULL )
                {

              
                    $um = $_SESSION["username"] ;
                    print <<<EOT
                    <!-- TODO 题目搜索 -->
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                       
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">$um<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">  
                    EOT ;

                    print <<<EOT
                    </a></li>
                            <li><a href="#">个人文件</a></li>
                            <li><a href="#">做题分析</a></li>
                            <li><a href="#">设置</a></li>
                        </ul>
                    </li>
                    
                    EOT ;
                }
                else{
                    print <<<EOT
                    <!-- TODO 题目搜索 -->
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.html">登陆</a>  </li>
                        <li><a href="login.html">管理员登陆</a>  </li>
                    EOT ;
                    echo ("<li> <a href='' >  注册 </li>");
                }

                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
  

