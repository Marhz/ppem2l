

<?php use Core\Form; ?>
<div id="addrForm">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Convertir un fichier CSV en utilisateurs
            </div>
            <div class="panel-body">
                <form action="<?= baseUrl() ?>addUserCSV" method="post" enctype='multipart/form-data'>
                    <div class="form-group col-md-12">
                        <?= Form::file('csv', 'Fichier : ', ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="chef_id">Chef : (optionnel)</label>
                        <select name="chef_id" id="chef_id" class="form-control">
                            <option value="" disabled selected hidden>Choisir un chef ou laisser vide.</option>
                            <?php
                            foreach($chiefs as $chief)
                            { 
                                ?>
                                <option value="<?= $chief->id ?>"><?= $chief->fullName() ?></option>
                            <?php
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <?= Form::submit('submit',' Ajouter en Csv', ['class' => 'form-control btn btn-primary']) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
