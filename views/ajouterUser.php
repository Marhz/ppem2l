<?php use Core\Form; ?>
<div id="addrForm">
    <div class="col-md-8 col-md-offset-2">
        <?php 
        if(isset($csvErrors))
        { 
            foreach($csvErrors as $error)
            {
                ?>
                <message type="danger">$error</message>
                <?php
            }
        }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter un Utilisateur
            </div>
            <div class="panel-body">
                <form action="addUserCSV" method="post" enctype='multipart/form-data'>
                    <div class="form-group col-md-12">
                        <?= Form::file('csv', 'Fichier : ', ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= Form::select('chef_id','Chef :', $users, ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= Form::submit('submit',' Ajouter en Csv', ['class' => 'form-control btn btn-primary']) ?>
                    </div>
                </form>
                <form action="ajouterUser" method="post">
                    <div class="form-group col-md-12">
                        <?= Form::text('nom', 'Nom : ', ['class' => 'form-control']) ?>
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
                        <?= Form::text('prenom', 'Prenom : ', ['class' => 'form-control']) ?>
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
                        <?= Form::email('email', 'Email : ', ['class' => 'form-control']) ?>
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
                        <?= Form::checkbox('chef', ['chef' => ' Chef'], ['class' => 'chef']) ?>
                    </div>
                    <div class="form-group col-md-12 users">
                        <?= Form::select('chef_id','Chef :', $users, ['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group col-md-12 employes">
                        <?= Form::select('employes[]','Employes :', $employes, ['class' => 'form-control select2','multiple']) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= Form::submit('submit',' Ajouter', ['class' => 'form-control btn btn-primary']) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  -->