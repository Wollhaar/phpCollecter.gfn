<h2>Bearbeite Benutzer</h2>
<form action="?a=manage" method="post">
    
    <input type="radio" name="title" value="herr" <?php echo Helper::isChecked('herr', $user->getTitle()) ?> />
    <label>Herr</label>
    <input type="radio" name="title" value="frau" <?php echo Helper::isChecked('frau', $user->getTitle()) ?> />
    <label>Frau</label><br/>
    
    <input type="text" name="firstname" placeholder="Vorname" value="<?php echo $user->getFirstname() ?>" />
    <input type="text" name="surname" placeholder="Nachname" value="<?php echo $user->getSurname() ?>" /><br/>
    <input type="text" name="email" placeholder="E-mail" value="<?php echo $user->getEmail() ?>" /><br/>
    <p><?php if($user->getStatus() == STAT_HIDDEN){echo 'current ';} ?><br/>
        <a href="?a=admin&id=<?php echo $user->getId() ?>&val=0">gesperrt</a></p>
    <p><?php if($user->getStatus() == STAT_PUBLIC){echo 'current ';} ?><br/>
        <a href="?a=admin&id=<?php echo $user->getId() ?>&val=1">öffentlich</a></p>
    <p><?php if($user->getStatus() == STAT_ADMIN){echo 'current ';} ?><br/>
        <a href="?a=admin&id=<?php echo $user->getId() ?>&val=2">admin</a></p>
    <?php // if ?>
    <!--<input type="password" name="password" placeholder="Passwort" />
    <input type="password" name="password_confirm" placeholder="Passwort wiederholen" /><br/>-->
    <button type="submit">Update</button>
    
</form>
