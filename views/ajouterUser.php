<?php use Core\Form; ?>
<div id="addrForm">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter un Utilisateur
            </div>
            <div class="panel-body">
            <form action="ajouterUser" method="post">
                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <?= Form::text('nom', 'Nom : ', ['class' => 'form-control']) ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <?= Form::text('prenom', 'Prenom : ', ['class' => 'form-control']) ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <?= Form::email('email', 'Email : ', ['class' => 'form-control']) ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <?= Form::checkbox('chef', ['chef' => ' Chef']) ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <?= Form::select('chef_id','Chef :', $users, ['class' => 'form-control']) ?>
                    </div>
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