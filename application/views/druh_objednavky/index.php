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
        <h1>Zoznam druhov objednavok</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">&nbsp; <a href="<?php echo site_url('druh_objednavky/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a>
                </div>
                <table id="table_id" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Množstvo</th>
                        <th>Potraviny</th>
                        <th>Objednavky</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($druh_objednavky)): foreach($druh_objednavky as $druh_objednavky): ?>
                        <tr class="table-primary">
                            <th scope="row"><?php echo '#'.$druh_objednavky['idDruh_objednavky']; ?></th>
                            <td><?php echo $druh_objednavky['Mnozstvo']; ?></td>
                            <td><?php echo $druh_objednavky['Potraviny']; ?></td>
                            <td><?php echo $druh_objednavky['Objednavky'];?></td>
                            <td align="right">
                                <a href="<?php echo site_url('druh_objednavky/view/'.$druh_objednavky['idDruh_objednavky']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('druh_objednavky/edit/'.$druh_objednavky['idDruh_objednavky']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('druh_objednavky/delete/'.$druh_objednavky['idDruh_objednavky']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Určite si prajete vymazať túto položku?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadne druhy objednavok neboli nájdení.....</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>