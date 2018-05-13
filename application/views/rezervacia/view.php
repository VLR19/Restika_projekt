<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily rezervacii <a href="<?php
                echo site_url('rezervacia/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Datum rezervacii:</label>
                    <p><?php echo
                        !empty($rezervacia['Datum'])?$rezervacia['Datum']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Počet hosti:</label>
                    <p><?php echo
                        !empty($rezervacia['Pocet_hosti'])?$rezervacia['Pocet_hosti']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Typ akcii:</label>
                    <p><?php echo
                        !empty($rezervacia['Typ_akcii'])?$rezervacia['Typ_akcii']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Počet stolov:</label>
                    <p><?php echo
                        !empty($rezervacia['Pocet_stolov'])?$rezervacia['Pocet_stolov']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Zakaznik:</label>
                    <p><?php echo
                        !empty($rezervacia['Zakaznik'])?$rezervacia['Zakaznik']:''; ?>
                        <a href="<?php echo site_url('zakaznici/viewfest/'.$rezervacia['idZakaznika']); ?>" class="glyphicon glyphicon-eye-open"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>