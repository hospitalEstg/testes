<?php

use yii\db\Migration;

/**
 * Class m191029_101340_init_rbac_author
 */
class m191029_101340_init_rbac_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $auth= yii::$app->authManager;
    // 1- criar permissoes

     // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $auth->add($updateOwnPost);

     // add "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $auth->add($updatePost);

    //add ""deletePosts"
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete a post';
        $auth->add($deletePost);

        //viewPost
        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View a post';
        $auth->add($viewPost);


    // 2- criar roles (ou perfis)


    // add "author" role and give this role the "createPost" permission
        $guest = $auth->createRole('guest');
        $auth->add($guest);


        $utente = $auth->createRole('Utente');
        $auth->add($utente);
        $auth->addChild($utente, $viewPost);
        $auth->addChild($utente, $updateOwnPost);
        $auth->addChild($utente, $createPost);

 // add "admin" role and give this role the "createPost" permission
        $secretaria = $auth->createRole('Secretaria');
        $auth->add($secretaria);
        $auth->addChild($secretaria, $utente);
        $auth->addChild($secretaria, $updatePost);

        $medico = $auth->createRole('Medico');
        $auth->add($medico);
        $auth->addChild($medico, $secretaria);



    // 3- associar utilizadores a roles
    // Assign roles to users.2 are IDs returned by IdentityInterface::getId()

            $auth->assign($guest, 4);
            $auth->assign($utente, 1);
            $auth->assign($secretaria, 2);
            $auth->assign($medico, 3);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    $auth= yii::$app->authManager;
    $auth->removeAll();
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }
    */
}
