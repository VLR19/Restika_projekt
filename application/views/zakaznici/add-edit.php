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
                <div class="panel-heading"><?php echo $action; ?>
                    Temperature <a href="<?php echo site_url('zakaznici/'); ?>"
                                   class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Date</label>
                            <input type="text" class="form-control"
                                   name="measurement_date" placeholder="Enter date" value="<?php echo
                            !empty($post['measurement_date'])?$post['measurement_date']:''; ?>">
                            <?php echo form_error('measurement_date','<p
class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Zakaznici</label>
                            <input type="text" class="form-control"
                                   name="temperature" placeholder="Enter temperature" value="<?php echo
                            !empty($post['temperature'])?$post['temperature']:''; ?>">
                            <?php echo form_error('temperature','<p
class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Sky</label>
                            <input type="text" class="form-control"
                                   name="sky" placeholder="Enter sky" value="<?php echo
                            !empty($post['sky'])?$post['sky']:''; ?>">
                            <?php echo form_error('sky','<p class="helpblock
text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">User</label>
                            <input type="text" class="form-control"
                                   name="user" placeholder="Enter user" value="<?php echo
                            !empty($post['user'])?$post['user']:''; ?>">
                            <?php echo form_error('user','<p class="helpblock
text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea name="description" class="formcontrol"
                                      placeholder="Enter description"><?php echo
                                !empty($post['description'])?$post['description']:''; ?></textarea>
                            <?php echo form_error('description','<p
class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn
btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>