<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
?>
<!DOCTYPE HTML>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->options->title(); ?></title>
    <link rel="stylesheet/less" href="<?php $this->options->themeUrl('css/w.less?v2'); ?>">
    <script src="<?php $this->options->themeUrl('js/plugins.js'); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php $this->options->themeUrl('js/m.js?v5'); ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php $this->options->themeUrl('js/less.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
	<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/vs2015.min.css" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/materialdesignicons.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="bg"></div>
    <div class="menu">
        <div class="group">
            <a class="item mdi mdi-arrow-left" id="back" onclick="back()"></a>
            <div class="drop-down">
                <span class="item mdi mdi-format-annotation-plus" onclick="biggerFont()"></span>
                <span class="item mdi mdi-share-variant"></span>
            </div>
        </div>
        <div class="group">
            <div class="hidden">
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while($pages->next()): ?>
                        <a class="item" onclick="showArticle('<?php $pages->permalink(); ?>')"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                
            </div>
            <a onclick="ShowNav()" class="item mdi mdi-menu"></a>
        </div>
    </div>