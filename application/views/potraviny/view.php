<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily potraviny <a href="<?php
                echo site_url('potraviny/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Nazov:</label>
                    <p><?php echo
                        !empty($potraviny['Nazov'])?$potraviny['Nazov']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Druh:</label>
                    <p><?php echo
                        !empty($potraviny['Druh'])?$potraviny['Druh']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Cena:</label>
                    <p><?php echo
                        !empty($potraviny['Cena'])?$potraviny['Cena']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>