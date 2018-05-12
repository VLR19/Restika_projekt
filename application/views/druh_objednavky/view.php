<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily druhu objednavky <a href="<?php
                echo site_url('druh_objednavky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Mnozstvo druhov objednavok:</label>
                    <p><?php echo
                        !empty($druh_objednavky['Mnozstvo'])?$druh_objednavky['Mnozstvo']
                            :''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>