<?php

set_include_path("./");

function includes_src_dir() {
  // TODO : Inclure les fichiers dans src/ dynamiquement
  require_once("src/Router.php");

  $include_files_from_src_subdir = function (string $dir_name, string $src_path = "src") {
    $dir_path = $src_path."/".$dir_name;
    $files = array_diff(scandir($dir_path), array('..', '.'));
    array_pop($files);
    foreach ($files as $file)
      require_once($dir_path."/".$file);
  };

  $directories = array(
    "control",
    "model",
    "view",
  );

  foreach ($directories as $directory)
    $include_files_from_src_subdir($directory);

}
?>
