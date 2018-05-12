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
                    zakaznici <a href="<?php echo site_url('zakaznici/'); ?>" class="glyphicon glyphicon-circle-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Meno</label>
                            <input type="text" class="form-control"
                                   name="Meno" placeholder="Vlož meno zakaznika" value="<?php echo
                            !empty($post['Meno'])?$post['Meno']:''; ?>">
                            <?php echo form_error('Meno','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Priezvisko</label>
                            <input type="text" class="form-control"
                                   name="Priezvisko" placeholder="Vlož priezvisko zakaznika" value="<?php echo
                            !empty($post['Priezvisko'])?$post['Priezvisko']:''; ?>">
                            <?php echo form_error('Priezvisko','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Telefon</label>
                            <input type="text" class="form-control"
                                   name="Telefon" placeholder="Vlož cislo telefonu zakaznika" value="<?php echo
                            !empty($post['Telefon'])?$post['Telefon']:''; ?>">
                            <?php echo form_error('Telefon','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control"
                                   name="Email" placeholder="Vlož Email zakaznika" value="<?php echo
                            !empty($post['Email'])?$post['Email']:''; ?>">
                            <?php echo form_error('Email','<p class="helpblock text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>