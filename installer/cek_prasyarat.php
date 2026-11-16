<?php
// Cek prasyarat - berjalan TANPA memasang paket atau mengubah file.
echo "=== SIB QA LAB: PRA-CHECK ===\n";
echo "PHP: " . PHP_VERSION . ' | '.PHP_OS_FAMILY."\n";
if (PHP_VERSION_ID < 80200) {echo "FAIL PHP minimal 8.2\n"; exit(1);}
else echo "PASS PHP >= 8.2\n";
function has_command($cmd) {
    $output=[]; $code=1;
    exec($cmd.' 2>&1', $output, $code);
    return [$code,implode("\n",array_slice($output,0,3))];
}
foreach (['composer --version','php -m'] as $command) {
 [$rc,$out]=has_command($command);
 echo "\n> $command\n".($rc===0?'PASS ':'CHECK ')."\n".$out."\n";
}
echo "\nPeriksa Google Chrome secara manual: Chrome > About Google Chrome.\n";
echo "Petunjuk lanjut: Jobsheet 09, langkah instalasi.\n";
