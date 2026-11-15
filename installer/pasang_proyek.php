<?php
/**
 * Installer LAB LOKAL untuk proyek Laravel 12. Membutuhkan internet, PHP, Composer, Chrome.
 * Tidak menggunakan DB maupun hosting. Jalankan SATU KALI sebelum Pertemuan 9.
 */
$root=dirname(__DIR__);
$target=$root.DIRECTORY_SEPARATOR.'sib-qa-lab';
$source=$root.DIRECTORY_SEPARATOR.'project_files';
function step(string $cmd, string $cwd): void {
 echo "\n> $cmd\n";
 $old=getcwd(); chdir($cwd);
 passthru($cmd, $code);
 chdir($old);
 if ($code!==0) { fwrite(STDERR,"\nSTOP: langkah gagal (kode $code). Lihat troubleshooting Jobsheet 09.\n"); exit($code); }
}
function copyDir(string $from,string $to): void {
 foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($from,FilesystemIterator::SKIP_DOTS),RecursiveIteratorIterator::SELF_FIRST) as $entry) {
   $relative=substr($entry->getPathname(),strlen($from)+1);
   $dest=$to.DIRECTORY_SEPARATOR.$relative;
   if($entry->isDir()) {if(!is_dir($dest))mkdir($dest,0775,true);}
   else{if(!is_dir(dirname($dest)))mkdir(dirname($dest),0775,true);copy($entry->getPathname(),$dest);}
 }
}
function setenv(string $file,string $key,string $value): void {
 $text=file_get_contents($file);$line=$key.'='.$value;
 if(preg_match('/^'.preg_quote($key,'/').'=.*$/m',$text))$text=preg_replace('/^'.preg_quote($key,'/').'=.*$/m',$line,$text);
 else $text.="\n".$line."\n";
 file_put_contents($file,$text);
}
if(PHP_VERSION_ID<80200){fwrite(STDERR,"PHP >=8.2 diperlukan.\n");exit(1);}
if(!is_dir($target)) {
 echo "Menyiapkan Laravel 12 di folder sib-qa-lab. Perlu internet.\n";
 step('composer create-project laravel/laravel sib-qa-lab "^12.0" --no-interaction',$root);
} elseif(!file_exists($target.DIRECTORY_SEPARATOR.'artisan')) {
 fwrite(STDERR,"Ada folder sib-qa-lab, tetapi bukan proyek Laravel. Jangan menimpa folder tersebut.\n");exit(1);
}
// Jangan menimpa pekerjaan jika sudah pernah setup lengkap.
if(file_exists($target.DIRECTORY_SEPARATOR.'.sib_qa_setup_done')){
 echo "Proyek sudah disiapkan: $target\n";exit(0);
}
$composerJson=$target.DIRECTORY_SEPARATOR.'composer.json';
$j=json_decode(file_get_contents($composerJson),true);
if(!isset($j['require-dev']['laravel/dusk']))step('composer require laravel/dusk --dev --no-interaction',$target);
if(!file_exists($target.DIRECTORY_SEPARATOR.'tests'.DIRECTORY_SEPARATOR.'DuskTestCase.php'))step('php artisan dusk:install',$target);
// Dusk default test typically expects /login; the lab does not provide /login.
$autoExample=$target.DIRECTORY_SEPARATOR.'tests'.DIRECTORY_SEPARATOR.'Browser'.DIRECTORY_SEPARATOR.'ExampleTest.php';
if(file_exists($autoExample))unlink($autoExample);
if(!file_exists($target.DIRECTORY_SEPARATOR.'.env'))copy($target.DIRECTORY_SEPARATOR.'.env.example',$target.DIRECTORY_SEPARATOR.'.env');
foreach(['APP_ENV'=>'local','APP_DEBUG'=>'true','APP_URL'=>'http://127.0.0.1:8000','SESSION_DRIVER'=>'file','CACHE_STORE'=>'file','QUEUE_CONNECTION'=>'sync'] as $k=>$v)setenv($target.DIRECTORY_SEPARATOR.'.env',$k,$v);
copyDir($source,$target);
step('php artisan key:generate --force',$target);
step('php artisan config:clear',$target);
echo "\nChromeDriver: menyesuaikan dengan Chrome terpasang...\n";
step('php artisan dusk:chrome-driver --detect',$target);
file_put_contents($target.DIRECTORY_SEPARATOR.'.sib_qa_setup_done',date(DATE_ATOM));
echo "\nSETUP SELESAI. Selanjutnya: cd sib-qa-lab lalu php artisan serve --host=127.0.0.1 --port=8000\n";
