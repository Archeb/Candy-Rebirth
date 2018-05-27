<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
ob_start();
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
    <script src="<?php $this->options->themeUrl('js/lazysizes.min.js'); ?>" type="text/javascript" charset="utf-8" async=""></script>
	<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
	<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/vs2015.min.css" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/materialdesignicons.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
	<style>
	    .page-container{
	        <?php if($this->options->wrapperLoaction=="placeMiddle"){ ?>
	        justify-content: center;
	       <?php }else if($this->options->wrapperLoaction=="placeRight"){ ?>
	        flex-direction: row-reverse;
	       <?php } ?>
	    }
	    <?php if($this->options->navColor=="bright"){ ?>
	    .menu .group .item{
	        color:#dedede;
	    }
	    .menu .group .item:hover{
	        color:#fafafa;
	        text-shadow: 1px 1px 10px rgba(255,255,255,0.2), 1px 1px 10px rgba(255,255,255,0.2);
	    }
	    .menu .group .item:active{
	        color:#ffffff;
	    }
	    .menu .group .drop-down{
	        color:#dedede;
	    }
	    <?php } ?>
	</style>
	<?php $this->header(); ?>
</head>
<body>
    <?php 
    if ($this->options->bgURL){
        $bgURL=$this->options->bgURL;
    }else{
        $bgURL='https://i.loli.net/2018/04/15/5ad2ca39da9bb.jpg';
    }
    ?>
    <div class="bg" style="background-image:url('<?php echo $bgURL ?>');"></div>
    <div class="notify-container"></div>
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
            <a onclick="document.querySelector('#search').focus()" class="item mdi mdi-magnify"></a>
            <div class="search">
                <input class="search-box" name="search" id="search" placeholder="回车Go！">
            </div>
        </div>
    </div>
