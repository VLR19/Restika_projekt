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
                <div class="form-group">
                    <label>Potraviny:</label>
                    <p><?php echo
                        !empty($druh_objednavky['Potraviny'])?$druh_objednavky['Potraviny']:''; ?>
                        <a href="<?php echo site_url('potraviny/viewfest/'.$druh_objednavky['idPotraviny']); ?>" class="glyphicon glyphicon-eye-open"></a></p>
                </div>
                <div class="form-group">
                    <label>Rezervacia:</label>
                    <p><?php echo
                        !empty($druh_objednavky['Objednavky'])?$druh_objednavky['Objednavky']:''; ?>
                        <a href="<?php echo site_url('objednavky/viewfest/'.$druh_objednavky['idObjednavky']); ?>" class="glyphicon glyphicon-eye-open"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>