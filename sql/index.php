<?php
for ($i=0; $i < 2000; $i++) { 
    echo "INSERT INTO `product_media`(`id_media`, `id_product`) VALUES (${i},${i});<br>";
}