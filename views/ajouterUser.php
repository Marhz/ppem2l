<?php use Core\Form; ?>
<div id="addrForm">
    <div class="col-md-8 col-md-offset-2">
        <?php 
        if(isset($csvErrors))
        { 
            foreach($csvErrors as $error)
            {
                ?>
                <message type="danger"><?= $error ?></message>
                <?php
            }
        }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter un Utilisateur
            </div>
            <div class="panel-body">
                <?php if(auth('user')->isAdmin()){ ?>
                    <form action="addUserCSV" method="post" enctype='multipart/form-data'>
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
                <?php } ?>
                <form action=<?= baseUrl() ?>ajouterUser method="post">
                    <div class="form-group col-md-12">
                        <?= Form::text('nom', 'Nom : ', ['class' => 'form-control','value' => $user->nom]) ?>
                        <?php if(isset($errors['nom'])) 
                            {
                                ?>
                                <small class="error">
                                    <?= $errors['nom'] ?>
                                </small>
                                <?php
                            }
                        ?>
                    </div>            
                    <div class="form-group col-md-12">
                        <?= Form::text('prenom', 'Prenom : ', ['class' => 'form-control','value' => $user->prenom]) ?>
                        <?php if(isset($errors['prenom'])) 
                            {
                                ?>
                                <small class="error">
                                    <?= $errors['prenom'] ?>
                                </small>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= Form::email('email', 'Email : ', ['class' => 'form-control','value' => $user->email]) ?>
                        <?php if(isset($errors['email'])) 
                            {
                                ?>
                                <small class="error">
                                    <?= $errors['email'] ?>
                                </small>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group col-md-12 chefSelect">
                         <input type="checkbox" name="chef" value="Chef" <?php if($user->level >= 1) echo "checked='checked'";?> class="chef" id="chef" > <label for="chef" > Chef </label>
                    </div>
                    <div class="form-group col-md-12 users">
                        <label for="chef_id">Chef : (optionnel)</label>
                        <select name="chef_id" id="chef_id" class="form-control">
                            <option value="" disabled selected hidden>Choisir un chef ou laisser vide.</option>
                            <?php 
                            foreach($chiefs as $chief)
                            { 
                                ?>
                                <option <?php if($chief->id == $user->chef_id) echo 'selected="selected"'; ?> value="<?= $chief->id ?>"><?= $chief->fullName() ?></option>
                                
                            <?php
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-12 employes">
                        <label>Employes : (optionel)</label>
                        <select multiple name="employes[]" id="employes[]" class="form-control select2">
                            <?php 
                            foreach($employes as $employe)
                            { 
                                ?>
                                <option value="<?= $employe->id ?>"><?= $employe->fullName() ?></option>
                            <?php

                            }
                            if($user->employes->count() > 0)
                            { 
                                foreach($user->employes as $employe)
                                { 
                                ?>
                                    <option selected value="<?= $employe->id ?>"><?= $employe->fullName() ?></option>
                                <?php
                                }
                            } ?>
                        </select>
                    </div>
                  <?php if (isset($_GET['id']))
                    { ?>
                        
                    <?php 
                    }
                    ?>
                    <div class="form-group col-md-12">
                        <?= Form::submit('submit',' Ajouter', ['class' => 'form-control btn btn-primary','value' => !isset($user->id) ? "Ajouter" : "Editer"]) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  -->