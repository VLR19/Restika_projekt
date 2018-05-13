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
                    potraviny <a href="<?php echo site_url('potraviny/'); ?>" class="glyphicon glyphicon-circle-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Nazov</label>
                            <input type="text" class="form-control"
                                   name="Nazov" placeholder="Vlož nazov potraviny" value="<?php echo
                            !empty($post['Nazov'])?$post['Nazov']:''; ?>">
                            <?php echo form_error('Nazov','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Druh</label>
                            <input type="text" class="form-control"
                                   name="Druh" placeholder="Vlož druh potraviny" value="<?php echo
                            !empty($post['Druh'])?$post['Druh']:''; ?>">
                            <?php echo form_error('Druh','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Cena</label>
                            <input type="text" class="form-control"
                                   name="Cena" placeholder="Vlož cenu potraviny" value="<?php echo
                            !empty($post['Cena'])?$post['Cena']:''; ?>">
                            <?php echo form_error('Cena','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>