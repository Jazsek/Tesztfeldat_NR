<?php 
    if($_GET["user_email"]){
        require_once("config/config.php");
        require_once("src/UserController.php");

        $user = new User($_GET["user_email"]);
        if($user->user_id){
            //Mivel ez nem volt külön feladat, és nem szerettem volna túlbonyolítani, így configból jön a projekt neve.
            $tasks = $user->getUserTasksInProjectByName(Config::$project_name);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jaszolos Adam teszt feladat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center mt-2">ActiveCollab datas</h1>
                <?php if(!empty($user->user_id) && $_GET["user_email"]){ ?>
                <table class="table table-hover">
                    <p class="text-center text-italic"><b><?= $user->user_name ?></b> task(s) in <b><?= Config::$project_name ?></b> project</p>   
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Last modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $task): ?>
                        <tr>
                            <td><?= $task["name"] ?></td>
                            <td><?= $task["body"] ?: "-" ?></td>
                            <td><?= date("Y.m.d H:i:s", $task["updated_on"]); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Figyelem!</h4>
                        <p>Nincs megadva email cím / a megadott emailcímen <?= ($_GET["user_email"]) ? "<i>(".$_GET["user_email"].")</i>" : "" ?> nem található felhasználó ehhez a projekthez.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>