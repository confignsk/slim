<?php global $Wcms ?>

<?

//echo "<pre>";
//print_r($Wcms);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?></title>
		<meta name="description" content="<?= $Wcms->page('description') ?>">
		<meta name="keywords" content="<?= $Wcms->page('keywords') ?>">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="<?= $Wcms->asset('css/style.css') ?>">
		
		<?= $Wcms->css() ?>

	</head>

	<body>
		<?= $Wcms->settings() ?>
		<?= $Wcms->alerts() ?>

		<nav class="navbar navbar-expand-lg navbar-light navbar-default">
			<div class="container">
				<a class="navbar-brand" href="<?= $Wcms->url() ?>">
					<?= $Wcms->get('config', 'siteTitle') ?>
				</a>

				<div class="navbar-header">
				<button type="button" class="navbar-toggler navbar-toggle" data-toggle="collapse" data-target="#menu-collapse">
					<span class="navbar-toggler-icon">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
				</button>
				</div>

				<div class="collapse navbar-collapse" id="menu-collapse">
					<ul class="nav navbar-nav navbar-right ml-auto">
						<?= $Wcms->menu() ?>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center padding40">
					<?= $Wcms->page('content') ?>

				</div>
			</div>
		</div>

		<div class="container-fluid blueBackground whiteFont">
			<div class="row">
				<div class="col-lg-12 text-center padding40">
					<?= $Wcms->block('subside') ?>
					

				</div>
			</div>
		</div>
		<div class="container-fluid blueBackground whiteFont">
			<div class="row">
				<div class="col-lg-12 text-center padding40">
					
					<?= $Wcms->block('subside1') ?>

				</div>
			</div>
		</div>
		<footer class="container-fluid">
			<div class="text-right padding20">
				<?= $Wcms->footer() ?>

			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" type="text/javascript"></script>
		<?= $Wcms->js() ?>

	</body>
	<?
//$GLOBALS["MY_DEBUG"]["X"] = Array("Debug help function, colors output",1,null, Array(0,1,2,3,4,5,6,7,8,9));
function print_my_debug() {
   if(empty($GLOBALS["CDBUG"])) return "";
   echo "<style>pre h2 {font-size:13px !important;}</style><pre style='font-size:13px !important; margin-left:15px; margin-top:50px;'>";
   function wrap($color, $text) {
      return "<span style='color:".$color."'>".$text."</span>";
   }
   function filter_tilda_keys(&$a) {
      static $level = 0;
      $tab = "    ";
      $len = 0;
      foreach($a as $k=>$v) {
         //if(substr($k, 0, 1) != "~") {
            if(is_array($v)) {
            echo str_repeat($tab, $level).wrap("red", $k)."\n";
               if(!empty($v)) {
                  $level++;
                  filter_tilda_keys($v);
               }
            } elseif(is_string($v)) {
               echo str_repeat($tab, $level).wrap("blue", $k)." = ".(strlen($v) < 40 ? $v : substr($v, 0, 40)."…")."\n";
            } else {
               echo str_repeat($tab, $level).wrap("black", $k)." = ".$v."\n";
            }
            //if($len++ > 2 && $level != 0) {echo str_repeat($tab, $level).wrap("red", "N(".count($a).")")."\n";break;}
         //}
      }
      $level--;
      echo "";
   }
   filter_tilda_keys($GLOBALS["CDBUG"]);
   //print_r($GLOBALS["MY_DEBUG"]);
   echo "</pre>";
}
print_my_debug();




	?>
</html>