<!DOCTYPE html>
<html lang="en-US">
<head>
 <meta charset="utf-8">
 <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href=https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css>
    <link rel="stylesheet" type="text/css" href=https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/united/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/united/bootstrap.min.css">


    <script type="text/javascript" src=https://code.jquery.com/jquery-1.12.4.js></script>
    <script type="text/javascript" src=https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js></script>
    <script type="text/javascript" src=https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js></script>
    <script type="text/javascript" src=https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js></script>
    <script type="text/javascript" src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js></script>

    <script type="text/javascript">
        $('#table_id').dataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    </script>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('zakaznici'); ?>">Zakaznici</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('rezervacia/'); ?>">Rezervacia</a></li>
                <li><a href="<?php echo site_url('objednavky/'); ?>">Objednavky</a></li>
                <li><a href="<?php echo site_url('druhobjednavky/'); ?>">Druhy objednavok</a></li>
                <li><a href="<?php echo site_url('potraviny/'); ?>">Potraviny</a></li>
            </ul>
        </div>
    </div>
</nav>