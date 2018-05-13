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
        <h1>Zoznam potravin</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">&nbsp; <a href="<?php echo site_url('potraviny/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a>
                </div>
                <table id="table_id" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazov</th>
                        <th>Druh</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($potraviny)): foreach($potraviny as $potraviny): ?>
                        <tr class="table-primary">
                            <th scope="row"><?php echo '#'.$potraviny['idPotraviny']; ?></th>
                            <td><?php echo $potraviny['Nazov']; ?></td>
                            <td><?php echo $potraviny['Druh']; ?></td>
                            <td><?php echo $potraviny['Cena'];?></td>
                            <td align="right">
                                <a href="<?php echo site_url('potraviny/view/'.$potraviny['idPotraviny']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('potraviny/edit/'.$potraviny['idPotraviny']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('potraviny/delete/'.$potraviny['idPotraviny']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Určite si prajete vymazať túto položku?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadne potraviny neboli nájdení.....</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

