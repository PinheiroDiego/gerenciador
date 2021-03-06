<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Homepage - Gerenciador</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <?php include("../includes/nav.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Homepage</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="../home">Principal</a></li>
                            <li class="active">Homepage</li>
                        </ol>





                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
<?php
     $conexao = mysqli_connect("127.0.0.1", "root", "", "erich");
      mysqli_set_charset($conexao, 'utf8');
     $dados = mysqli_query($conexao,  "SELECT * FROM home WHERE id = 1");

     while ($home = mysqli_fetch_array($dados)):
   ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Homepage</h3> 
                                            
                            <form class="form-horizontal form-material" method="POST" action="../homepage/editardepartamento.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Título</label>
                                    <div class="col-md-12">
                                        <input type="text" name="T_titulo" class="form-control form-control-line" value="<?= $home['titulo'] ?>"> 
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12">Imagem</label>
                                    <div class="col-md-12">
                                 <input type="file" id="InputFile" name="InputFile">
                                  </div>
                                </div>
                                
                               <div class="form-group">
                               <div class="col-sm-12">
                            <button type="submit" class="btn btn-success" value="Inserir">Atualizar</button>
                    </div>
                </div>
                              </form>
                      </div>
           
                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php include("../includes/footer.php"); ?>
               <?php endwhile; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
