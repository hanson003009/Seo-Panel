<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
    <?php
    $custSiteInfo = getCustomizerDetails();
    $spTitle = empty($spTitle) ? SP_TITLE : $spTitle;
    $spDescription = empty($spDescription) ? SP_DESCRIPTION : $spDescription;
    $spKeywords = empty($spKeywords) ? SP_KEYWORDS : $spKeywords;
    $spKey = "v" . substr(SP_INSTALLED, 2);    
    ?>
    <title><?php echo stripslashes($spTitle)?></title>
    <meta name="description" content="<?php echo $spDescription?>" />
    <meta name="keywords" content="<?php echo $spKeywords?>" />
    <link type="text/css" href="<?php echo SP_WEBPATH?>/jquery-ui-custom/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo SP_CSSPATH?>/screen.css?<?php echo $spKey?>" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo SP_CSSPATH?>/datepicker.css?<?php echo $spKey?>" media="all" />
    <?php if (in_array($_SESSION['lang_code'], array('ar', 'he', 'fa'))) {?>
    	<link rel="stylesheet" type="text/css" href="<?php echo SP_CSSPATH?>/screen_rtl.css?<?php echo $spKey?>" media="all" />
    <?php }?>
    
    <link rel="shortcut icon" href="<?php echo !empty($custSiteInfo['site_favicon']) ? $custSiteInfo['site_favicon'] : SP_IMGPATH . "/favicon.ico"?>" />
    <script type="text/javascript" src="<?php echo SP_JSPATH?>/jquery-1.10.1.min.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_JSPATH?>/common.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_JSPATH?>/popup.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_JSPATH?>/datepicker.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_WEBPATH?>/jquery-ui-custom/js/jquery-ui-1.10.3.custom.min.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_JSPATH; ?>/loader.js?<?php echo $spKey?>"></script>
    <script type="text/javascript" src="<?php echo SP_JSPATH; ?>/jquery.tablesorter.min.js?<?php echo $spKey?>"></script>
    
    <?php if (isPluginActivated("customizer")) {?>
    	<link rel="stylesheet" type="text/css" href="<?php echo SP_WEBPATH?>/custom_style.php?<?php echo $spKey?>" media="all" />
    	<script type="text/javascript" src="<?php echo SP_WEBPATH?>/custom_js.php?<?php echo $spKey?>"></script>
    <?php }?>
    
</head>
<body>
<script type="text/javascript">
var spdemo = <?php echo SP_DEMO; ?>;
var wantproceed = '<?php  echo $spText['label']['wantproceed']; ?>';
</script>

<div class="main_container">

    <div id="Header">
    
    	<div id="round_content_header">
            <?php include_once(SP_VIEWPATH."/menu/topmenu.ctp.php");?>
            <div>
            	<div id="logo_div"><img src="<?php echo !empty($custSiteInfo['site_logo']) ? $custSiteInfo['site_logo'] : SP_IMGPATH . "/logo.jpg";?>"></img></div>
            	<div id="logo_text"><?php echo !empty($custSiteInfo['site_name']) ? $custSiteInfo['site_name'] : "Seo Panel"?></div>
            </div>
        
            <!-- TABS -->
            <div id="Tabs" style="clear: both;">
                <ul id="MainTabs">
                    <?php include(SP_VIEWPATH.'/menu/main_menu.ctp.php');?>
                </ul>
            </div>
        </div>
        
        <?php echo getRoundTabBot(); ?>
    </div>
    
    <div id="Wrapper">
        <table width="100%" cellspacing="0px" cellpadding="0px">
        	<tr><td id="newsalert"></td></tr>
        	<tr>
        		<td class="Container">
            		<div id="ContentFrame">
            			<noscript>
            				<p class="note error">JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page.</p>
            			</noscript>
            			<?php echo $viewContent?>
            		</div>
        		</td>
        	</tr>
        </table>
    </div>
    <?php include_once(SP_VIEWPATH."/common/footer.ctp.php"); ?>
</div>
<div id="tmp"><form name="tmp" id="tmp"></form></div>
<div id="dialogContent" style="display:none;"></div>
<?php if(empty($_COOKIE['hidenews']) && !SP_HOSTED_VERSION && empty($custSiteInfo['disable_news'])){ ?>
	<script>scriptDoLoad('<?php echo SP_WEBPATH?>/index.php?sec=news', 'newsalert');</script>
<?php }?>
<?php
// add google analytics code to verify the site hits 
if ( defined('SP_GOOGLE_ANALYTICS_TRACK_CODE')) { 
	echo SP_GOOGLE_ANALYTICS_TRACK_CODE;
}
?>
</body>
</html>
