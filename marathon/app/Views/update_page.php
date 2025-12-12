<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php
        echo view('include/header');
        echo view('include/menu')
        ?>

    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Race
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">

                    <form role="form" method="post" action="/marathon/public/edit_race">

                        <div class="form-group">
                            <label>Race Name</label>
                            <input name="race_name" id="race_name" type="text" value="<?=$race[0]['raceName']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Race Location</label>
                            <input name="race_location" id="race_location" type="text" value="<?=$race[0]['raceLocation']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Race Description</label>
                            <textarea name="race_description" id="race_description" class="form-control" rows="3"><?=$race[0]['racedescription']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Race Date</label>
                            <input name="race_date" id="race_date" type="datetime-local" value="<?=$race[0]['raceDateTime']?>" class="form-control">
                        </div>
                        <input type="hidden" id="txtID" name="txtID"  value="<?=$race[0]['raceID']?>">
                        <button type="submit" class="btn btn-default">Update Race</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>

                    </form>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
