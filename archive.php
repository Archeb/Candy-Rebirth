<?php
/**
 * Candy: Rebirth (CodeName: Move)
 * 
 * @package Candy: Rebirth
 * @author Archeb
 * @version 1.0.0
 * @link https://qwq.moe/
 */
 
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit;
	if(isset($_GET['ajaxload'])){ 
	    if($_GET['ajaxload']=="firstload"){$this->need('archive-info.php'); ?>
        <div class="article-list">
        <?php } ?>
	    <?php
	    $this->need('article-list.php'); 
            listArticles($this); 
        ?>
        <?php if($_GET['ajaxload']=="firstload"){ ?>
        </div>
        <input type="hidden" id="tmp_total" value="<?php echo $this->getTotal() ?>" />
        <?php } ?>
	    <?php
	    die();
	}
$this -> need('header.php');
$this->need('article-list.php'); 
?>
<script>
    backArchive=true;
</script>
<div id="index" class="screen index">
    <div style="margin:40vh auto;text-align:center;">
        <h1 style="font-size:2.3rem"><?php $this->options->title(); ?></h1>
        <span style="color:#696969;font-size:0.9rem"><?php $this->options->description(); ?></font>
        <h3></h3>
        <br>
        <a href="#" class="btn" onclick="Move('#archive','#index','right')">Explore Me</a>
    </div>
    
</div>
<div id="archive" class="screen archive move-show">
    <div class="archive-container" style="overflow: hidden; transform: translate(0px, -100vh);">
        <div class="article-list">
        <?php $this->need('author-info.php'); ?>
        <?php $art=$this->widget('Widget_Archive@indexfenlei', 'pageSize=5&type=index') ?>
        <?php listArticles($art); ?>
        </div>
    </div>
    <div class="category-container" style="transform: translate(0px, -100vh);">
        <?php $this->need('archive-info.php'); ?>
        <div class="article-list">
            <?php listArticles($this); ?>
        </div>
    </div>
</div>
<div id="page" class="screen page">
    <div class="page-container">
        
    </div>
</div>

<script>
categoryInfo={url:null,pageNow:<?php echo $this->_currentPage ?>,total:<?php echo $this->getTotal() ?>}
    var pageInfo=<?php echo json_encode(
        [
            'currentPage' => $art->_currentPage,
            'total'=> $art->getTotal(),
            'pageSize' => $art->parameter->pageSize,
            'type' => $art->parameter->type
        ]
        )  ?> 
</script>
<?php 
    $this -> need('footer.php');
?>