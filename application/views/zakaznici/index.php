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
        <h1>Zoznam zakaznikov</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">&nbsp; <a href="<?php echo site_url('zakaznici/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a>
                </div>
                <table id="table_id" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Priezvisko</th>
                        <th>Telefon</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($zakaznici)): foreach($zakaznici as $zakaznici): ?>
                        <tr class="table-primary">
                            <th scope="row"><?php echo '#'.$zakaznici['idZakaznici']; ?></th>
                            <td><?php echo $zakaznici['Meno']; ?></td>
                            <td><?php echo $zakaznici['Priezvisko']; ?></td>
                            <td><?php echo $zakaznici['Telefon'];?></td>
                            <td><?php echo $zakaznici['Email'];?></td>
                            <td align="right">
                                <a href="<?php echo site_url('zakaznici/view/'.$zakaznici['idZakaznici']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('zakaznici/edit/'.$zakaznici['idZakaznici']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('zakaznici/delete/'.$zakaznici['idZakaznici']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Určite si prajete vymazať túto položku?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadny zakaznici neboli nájdení.....</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

