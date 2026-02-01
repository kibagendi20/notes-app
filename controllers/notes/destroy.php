<?php

    use Core\Database;
    use Core\App;
    // $config = require base_path('config.php');
    // $db = new Database($config['database']);

    // $db = App::container()->resolve('Core\Database');
    $db = App::resolve(Database::class);
    $note = $db -> query('select * from notes where id = :id', ['id' => $_POST['id']]) -> findOrFail();
      
        authorize($note['user_id'] == 1);

        $db -> query('DELETE FROM notes WHERE id = :id', [
            'id' => $_POST['id']
        ]);
        
        header('location: /notes');
        exit();
    
    