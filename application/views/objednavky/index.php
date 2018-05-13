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
        <h1>Zoznam objednavok</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">&nbsp; <a href="<?php echo site_url('objednavky/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a>
                </div>
                <table id="table_id" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Datum objednavky</th>
                        <th>Suma</th>
                        <th>Rezervacia</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($objednavky)): foreach($objednavky as $objednavky): ?>
                        <tr class="table-primary">
                            <th scope="row"><?php echo '#'.$objednavky['idObjednavky']; ?></th>
                            <td><?php echo $objednavky['Datum_objednavky']; ?></td>
                            <td><?php echo $objednavky['Suma']; ?></td>
                            <td><?php echo $objednavky['Nazov akcii'];?></td>
                            <td align="right">
                                <a href="<?php echo site_url('objednavky/view/'.$objednavky['idObjednavky']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('objednavky/edit/'.$objednavky['idObjednavky']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('objednavky/delete/'.$objednavky['idObjednavky']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Určite si prajete vymazať túto položku?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadne objednavky neboli nájdení.....</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>