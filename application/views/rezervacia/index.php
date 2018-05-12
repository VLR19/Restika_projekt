<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>Zoznam rezervacii</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">&nbsp; <a href="<?php echo site_url('rezervacia/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a>
                </div>
                <table id="table_id" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Datum</th>
                        <th>Počet hosti</th>
                        <th>Typ akcii</th>
                        <th>Počet stolov</th>
                        <th>Zakaznici</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($rezervacia)): foreach($rezervacia as $rezervacia): ?>
                        <tr class="table-primary">
                            <th scope="row"><?php echo '#'.$rezervacia['idRezervacia']; ?></th>
                            <td><?php echo $rezervacia['Datum']; ?></td>
                            <td><?php echo $rezervacia['Pocet_hosti']; ?></td>
                            <td><?php echo $rezervacia['Typ_akcii'];?></td>
                            <td><?php echo $rezervacia['Pocet_stolov'];?></td>
                            <td><?php echo $rezervacia['Zakaznici'];?></td>
                            <td align="right">
                                <a href="<?php echo site_url('rezervacia/view/'.$rezervacia['idRezervacia']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('rezervacia/edit/'.$rezervacia['idRezervacia']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('rezervacia/delete/'.$rezervacia['idRezervacia']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Určite si prajete vymazať túto položku?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadne rezervacii neboli nájdení.....</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>