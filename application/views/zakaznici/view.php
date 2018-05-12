<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily zakaznika <a href="<?php
                echo site_url('zakaznici/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Meno zakaznika:</label>
                    <p><?php echo
                        !empty($zakaznici['Meno'])?$zakaznici['Meno']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Priezvisko:</label>
                    <p><?php echo
                        !empty($zakaznici['Priezvisko'])?$zakaznici['Priezvisko']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Telefon:</label>
                    <p><?php echo
                        !empty($zakaznici['Telefon'])?$zakaznici['Telefon']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo
                        !empty($zakaznici['Email'])?$zakaznici['Email']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>