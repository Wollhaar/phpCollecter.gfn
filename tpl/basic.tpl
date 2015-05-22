<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produkte</title>
        <link type="text/css" rel="stylesheet" href="css/sheet.css" />
    </head>
    <body>
        <div id="wrapper">
        <div id="head"></div>
        <div id="navi">
            <ul>
                <li><a href="?a=home">Home</a></li>
                <li><a href="?a=regist">Registrieren</a></li>
                <li><a href="?a=catalog">Katalog</a></li>
                <li><a href="?a=galery">Galerie</a></li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']->getStatus() == STAT_ADMIN): ?>
                <li><a href="?a=new">Produkt hinzufügen</a></li>
                <li><a href="?a=admin">Admin Area</a></li>
                <?php endif; ?>
            </ul>
            <hr/>
            <h2>Login</h2>
            
            <?php if(!isset($_SESSION['user'])): ?>
            <form action="index.php?a=login" method="post">
                <input type="text" name="email" placeholder="email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="login" value="Login" />
            </form>
            <?php else: ?>
            <p>logged in als <?php echo $_SESSION['user']->getFirstname(); ?>
            <a href="?a=logout">Logout</a>
            </p>
            <?php endif; ?>
        </div>
        <div id="content">
            <?php include_once "tpl/$tpl.tpl"; ?>
        </div>
        <div id="footer"></div>
        </div>
    </body>
</html>
