<h1>Admin Area</h1>
<table border="1">
    <h2>User-Tabelle</h2>
    <tr>
        <td>Vorname</td>
        <td>Nachname</td>
        <td>Email</td>
        <td colspan="3">Status</td>
        <td>Aktion</td>
    </tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user->getFirstname() ?></td>
        <td><?php echo $user->getSurname() ?></td>
        <td><?php echo $user->getEmail() ?></td>
        <td>
            <span><?php if($user->getStatus() == STAT_HIDDEN){echo 'current ';} ?></span><br/>
            <a href="?a=admin&id=<?php echo $user->getId() ?>&val=0">gesperrt</a>
        </td><td>
            <span><?php if($user->getStatus() == STAT_PUBLIC){echo 'current ';} ?></span><br/>
            <a href="?a=admin&id=<?php echo $user->getId() ?>&val=1">öffentlich</a>
        </td><td>
            <span><?php if($user->getStatus() == STAT_ADMIN){echo 'current ';} ?></span><br/>
            <a href="?a=admin&id=<?php echo $user->getId() ?>&val=2">admin</a>
        </td>
        <td><a href="?a=manage&id=<?php echo $user->getId() ?>">bearbeiten</a></td>   
    </tr>
<?php endforeach; ?>
</table>