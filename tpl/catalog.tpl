<h1>Katalog</h1>
<?php foreach($products as $product): ?>
<div class="product">
    <img width="150" height="100" src="<?php echo UPLOAD_PATH.$product->getImage(); ?>" alt="Bild eines Schuhs" />
    <h3 id="titel"><?php echo $product->getTitle(); ?></h3>   
    <p id="price"><?php echo $product->getPrice(); ?> €</p>   
    <p id="description"><?php echo $product->getDescription(); ?></p>  
    <?php if(isset($_SESSION['user']) && $_SESSION['user']->getStatus() == STAT_ADMIN): ?>
    <a href="?a=edit&id=<?php echo $product->getId(); ?>" class="edit"><img src="img/Edit.png" height="20" alt="" /></a>   
    <?php endif; ?>
</div>
<?php endforeach; ?>