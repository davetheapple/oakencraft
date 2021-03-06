<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');

/*$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.localscroll-1.2.7-min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.parallax-1.1.3.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.scrollTo-1.4.2-min.js'); // jquery.scrolling-parallax.js
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.scrolling-parallax.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');*/

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}


/*
jimport( 'joomla.application.module.helper' );
$module = JModuleHelper::getModule( 'login' );
echo '<div class="login-module">';
print_r( $module );
echo '</div>';*/


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif; ?>
	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">
		body.site
		{
			border-top: 3px solid <?php echo $this->params->get('templateColor'); ?>;
			background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
		}
		a
		{
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php endif; ?>
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<?php $bUrl = $this->baseurl . '/templates/' . $this->template; ?>
	<script src='<?php echo $bUrl; ?>/js/velocity.min.js'></script>
	<script src='<?php echo $bUrl; ?>/js/jquery.localscroll-1.2.7-min.js'></script>
	<script src='<?php echo $bUrl; ?>/js/jquery.parallax-1.1.3.js'></script>
	<script src='<?php echo $bUrl; ?>/js/jquery.scrollTo-1.4.2-min.js'></script>
	<script src='<?php echo $bUrl; ?>/js/jquery.stellar.min.js'></script>
	
	<script src='<?php echo $bUrl; ?>/js/jquery.alton.min.js'></script>
	<script src='<?php echo $bUrl; ?>/js/velocity.min.js'></script>
	<script src='<?php echo $bUrl; ?>/js/template.js'></script>
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">

	<!-- Body -->
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?> slider-container">
			
			
			<!-- jdoc:include type="modules" name="banner" style="xhtml" / -->
			<div class="row-fluid">
				<?php /*if ($this->countModules('position-8')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-8" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; */?>
				<main id="content" role="main" class="<?php echo $span; ?> slide" data-stellar-background-ratio="0.2">
					<!-- Begin Content -->
					<!-- Header -->
					<header class="header" role="banner">
						<div class="header-inner clearfix">
							<a class="brand pull-left" href="<?php echo $this->baseurl; ?>/">
								<?php echo $logo; ?>
							</a>
							<div class="header-search pull-right">
								<jdoc:include type="modules" name="position-0" style="none" />
							</div>
						</div>
						
						<nav class="navigation" role="navigation">
							<jdoc:include type="module" name="breadcrumbs" title="Breadcrumbs" />
							
							<jdoc:include type="module" name="menu" />
							<jdoc:include type="message" />
						</nav>
					
					</header>
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<!-- End Content -->
				</main>
				<div class="secondary">
					<div class="slide col-md-9" id="slide3">
						<jdoc:include type="modules" name="position-4" />
					</div>
					<div class="slide col-md-3" id="slide2">
						<!-- jdoc:include type="component" / -->
						<!-- jdoc:include type="modules" name="position-5" / -->
						
						<?php
						
						$query = "SELECT * FROM #__content";
						$db = JFactory::getDBO();
						$db->setQuery($query); 
						$articles = $db->loadObjectList(); 
						$count = 0;
						foreach($articles as $article){
						    if($count >= 3) break;
						    
						    $article2 = JTable::getInstance("content"); 
							$article2->load($article->id); // Get Article ID
							$article_images = $article2->get("images"); // Get image parameters
							$pictures = json_decode($article_images); // Split the parameters apart
							// Print the image
							if($pictures->{'image_intro'}) {
								echo "<div class='product'><img src='" . $pictures->{'image_intro'} . "' alt='" . $pictures->{'image_intro_alt'} . "'><p class='prod-title'>".$article->title."</p></div>";
								$count++;
							}
							
						}
						
						?>
					</div>
				</div>
				
				
				<?php /*if ($this->countModules('position-7')) : ?>
					<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="position-7" style="well" />
						<!-- End Right Sidebar -->
					</div>
				<?php endif;*/ ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">

			<jdoc:include type="modules" name="footer" style="none" />
			<p>
				&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>. All rights reserved.
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
