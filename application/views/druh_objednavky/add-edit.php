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
                    druh_objednavky <a href="<?php echo site_url('druh_objednavky/'); ?>" class="glyphicon glyphicon-circle-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Množstvo</label>
                            <input type="text" class="form-control"
                                   name="Mnozstvo" placeholder="Vlož množstvo objednavok" value="<?php echo
                            !empty($post['Mnozstvo'])?$post['Mnozstvo']:''; ?>">
                            <?php echo form_error('Mnozstvo','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>