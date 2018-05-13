<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily objednavky <a href="<?php
                echo site_url('objednavky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Datum objednavky:</label>
                    <p><?php echo
                        !empty($objednavky['Datum_objednavky'])?$objednavky['Datum_objednavky']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Suma:</label>
                    <p><?php echo
                        !empty($objednavky['Suma'])?$objednavky['Suma']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Rezervacia:</label>
                    <p><?php echo
                        !empty($objednavky['Rezervacia'])?$objednavky['Rezervacia']:''; ?>
                        <a href="<?php echo site_url('rezervacia/viewfest/'.$objednavky['idRezervacia']); ?>" class="glyphicon glyphicon-eye-open"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>