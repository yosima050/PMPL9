<?php
$root=dirname(__DIR__);$target=$root.DIRECTORY_SEPARATOR.'sib-qa-lab';
$files=['artisan','app/Support/ShopRules.php','resources/views/shop.blade.php','routes/web.php','tests/Browser/ContohDosenTest.php','tests/Unit/ContohWhiteBoxTest.php','tests/Unit/Anggota1WhiteBoxTest.php'];
echo "=== CHECK STRUKTUR ===\n";
foreach($files as $f){$ok=file_exists($target.DIRECTORY_SEPARATOR.str_replace('/' ,DIRECTORY_SEPARATOR,$f)); echo ($ok?'PASS':'MISSING')." $f\n";}
