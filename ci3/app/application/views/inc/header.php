<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bic-Ben Mail</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('asset/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/css/icon-custom.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/css/sweetalert2.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/css/bbp.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/css/jquery-ui.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('asset/library/datatables.min.css')?>">

    <script src="<?=base_url('asset/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('asset/js/jquery-ui.min.js')?>"></script>
</head>
<body <?php if(isset($_COOKIE['sidebar'])){echo 'class="'.get_cookie('sidebar').'"'; }?>>