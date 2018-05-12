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
                    rezervacia <a href="<?php echo site_url('rezervacia/'); ?>" class="glyphicon glyphicon-circle-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Datum</label>
                            <input type="text" class="form-control"
                                   name="Datum" placeholder="Vlož datum rezervacii" value="<?php echo
                            !empty($post['Datum'])?$post['Datum']:''; ?>">
                            <?php echo form_error('Datum','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Pocet_hosti</label>
                            <input type="text" class="form-control"
                                   name="Pocet_hosti" placeholder="Vlož pocet hostej" value="<?php echo
                            !empty($post['Pocet_hosti'])?$post['Pocet_hosti']:''; ?>">
                            <?php echo form_error('Pocet_hosti','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Typ_akcii</label>
                            <input type="text" class="form-control"
                                   name="Typ_akcii" placeholder="Vlož typ akcii" value="<?php echo
                            !empty($post['Typ_akcii'])?$post['Typ_akcii']:''; ?>">
                            <?php echo form_error('Typ_akcii','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Pocet_stolov</label>
                            <input type="text" class="form-control"
                                   name="Pocet_stolov" placeholder="Vlož pocet stolov na akcii" value="<?php echo
                            !empty($post['Pocet_stolov'])?$post['Pocet_stolov']:''; ?>">
                            <?php echo form_error('Pocet_stolov','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>