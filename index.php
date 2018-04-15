<?php
/**
 * 一个单行横向滚动主题！
 * 
 * @package Candy: Rebirth
 * @author Archeb
 * @version 1.2
 * @link https://qwq.moe/
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit;
	if(isset($_GET['ajaxload'])){
	    $this->need('article-list.php'); 
            listArticles($this);
	    die();
	}
$this -> need('header.php');
?>
<div id="index" class="screen index <?php if($this->options->firstScreen=="showIndex") echo "move-show"; ?>">
    <div style="margin:40vh auto;text-align:center;">
        <h1 style="font-size:2.3rem"><?php $this->options->title(); ?></h1>
        <span style="color:#696969;font-size:0.9rem"><?php $this->options->description(); ?></font>
        <h3></h3>
        <br>
        <a href="#" class="btn" onclick="Move('#archive','#index','right')">Explore Me</a>
    </div>
    
</div>
<div id="archive" class="screen archive <?php if($this->options->firstScreen=="showArchive") echo "move-show"; ?>">
    <div class="archive-container">
        <?php $this->need('author-info.php'); ?>
        <div class="article-list">
            <?php $this->need('article-list.php'); 
            listArticles($this); ?>
        </div>
    </div>
    <div class="category-container">
        
    </div>
</div>
<div id="page" class="screen page">
    <div class="page-container">
        
    </div>
</div>
<div id="archive" class="screen page">
</div>
<script>

    var pageInfo=<?php echo json_encode(
        [
            'currentPage' => $this->_currentPage,
            'total'=> $this->getTotal(),
            'pageSize' => $this->parameter->pageSize,
            'type' => $this->parameter->type
        ]
        )  ?>
</script>
<?php 
    $this -> need('footer.php');
?>