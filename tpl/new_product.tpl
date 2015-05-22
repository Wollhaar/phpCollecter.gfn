<h1>Neues Produkt</h1>

<form action="?a=new" id="newproduct" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->getId() ?>" />
    <input type="hidden" name="image" value="<?php echo $product->getImage() ?>" />
    <input type="text" name="title" placeholder="Titel" value="<?php echo $product->getTitle() ?>" />
    <input type="text" name="price" placeholder="Preis" value="<?php echo $product->getPrice() ?>" />
    <label>Beschreibung</label>
    <textarea name="description" value="<?php echo $product->getDescription() ?>"></textarea>
    
    <input type="file" name="upload" accept="image/*" />
    
    <button type="submit">Speichern</button>
</form>