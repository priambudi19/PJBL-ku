<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($title)){?>
    <title><?= $title ?></title>
    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="<?= base_url()?>assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/jquery/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= base_url()?>assets/jquery/node_modules/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
    <link href="<?= base_url()?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/color.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/js/jquery.datetimepicker.css">
    

</head>

<style>
    #content {
        background-color: #eeeeee;
    }
    ::-webkit-scrollbar {
    width: 6px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); 
    border-radius: 1px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 1px;
    -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.5); 
}


</style>
    