<div class="container">
    <div class="col-xs-12">
        <?php
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading" ><?php echo $action; ?>
                    objednavky <a href="<?php echo site_url('objednavky/'); ?>" class="glyphicon glyphicon-circle-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Datum objednavky</label>
                            <input type="text" class="form-control"
                                   name="Datum objednavky" placeholder="Vlož datum objednavky" value="<?php echo
                            !empty($post['Datum_objednavky'])?$post['Datum_objednavky']:''; ?>">
                            <?php echo form_error('Datum_objednavky','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Suma</label>
                            <input type="text" class="form-control"
                                   name="Suma" placeholder="Vlož sumu" value="<?php echo
                            !empty($post['Suma'])?$post['Suma']:''; ?>">
                            <?php echo form_error('Suma','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Rezervacia'); ?>
                            <?php echo form_dropdown('idRezervacia', $rezervacia, $rezervacia_selected, 'class="form-control"'); ?>
                            <?php echo form_error('idRezervacia','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>