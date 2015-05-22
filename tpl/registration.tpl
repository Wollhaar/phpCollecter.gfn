    <h1>Registration</h1>

<form action="?a=save" method="post">
    <?php if(isset($error)): ?>
    <div id="error">
        <?php foreach($error as $e) : ?>
            <?php if($e == ERROR_EMPTY): ?>
            <p>Bitte füllen Sie die Eingabefelder.</p>
            <?php elseif ($e == ERROR_TITLE): ?>
            <p>Bitte überprüfen Sie Ihr Anrede.</p>
            <?php elseif ($e == ERROR_FIRSTNAME): ?>
            <p>Bitte überprüfen Sie Ihren Vornamen.</p>
            <?php elseif($e == ERROR_LASTNAME): ?>
            <p>Bitte überprüfen Sie Ihren Nachnamen.</p>
            <?php elseif($e == ERROR_EMAIL): ?>
            <p>Bitte überprüfen Sie Ihre Email.</p>
            <?php elseif($e == ERROR_PASSWORD): ?>
            <p>Die Passworteingabe ist nicht korrekt.</p>
            <?php elseif($e == ERROR_PASSWORD_CONFIRM): ?>
            <p>Die Passwörter stimmen nicht überein.</p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif ?>
    <input type="radio" name="title" value="herr" <?php echo Helper::isChecked('herr', $reg['title']) ?> />
    <label>Herr</label>
    <input type="radio" name="title" value="frau" <?php echo Helper::isChecked('frau', $reg['title']) ?> />
    <label>Frau</label><br/>
    
    <input type="text" name="firstname" placeholder="Vorname" value="<?php echo $reg['firstname'] ?>" />
    <input type="tex
           
           t" name="surname" placeholder="Nachname" value="<?php echo $reg['surname'] ?>" /><br/>
    <input type="text" name="email" placeholder="E-mail" value="<?php echo $reg['email'] ?>" /><br/>
    <?php // if ?>
    <input type="password" name="password" placeholder="Passwort" />
    <input type="password" name="password_confirm" placeholder="Passwort wiederholen" /><br/>
    <button type="submit">Registrieren</button>
    
</form>