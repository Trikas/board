<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-xl"><table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">CSM board result</th>
            <th scope="col">CSMB board result</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?foreach($this->users as $user):?>
        <tr>
            <th scope="row"><?=$user->id?></th>
            <td><?=$user->first_name?></td>
            <td><?=$user->last_name?></td>
            <td><?=$user->csm_result?></td>
            <td><?=$user->csmb_result?></td>
            <td><a href="/csm/<?=$user->id?>">CSM board</a>&nbsp;<a href="/csmb/<?=$user->id?>">CSMB board</a></td>
        </tr>
        <?endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>