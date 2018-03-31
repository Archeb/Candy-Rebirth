<?php

if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;

if(!isset($_GET['ajaxload'])){
    $this -> need('header.php');
}
?>
<?php
while($this->next()):
global $isShuoshuo;
    $isShuoshuo=false;
    array_map(function($v){global $isShuoshuo;if($v['name']=="说说"){$isShuoshuo=true;};},$this->categories);
    if($isShuoshuo===true){ 
?>
<div class="bean shuoshuo">
    <div class="content">
        <div class="shuoshuo-head"><div class="title"><span class="mdi mdi-star"></span>&nbsp;说说</div><div class="time"><?php $this->date('F jS , Y'); ?></div></div>
        <div class="body">
            <div class="side">
                <?php $this->author->gravatar(100); ?>
            </div>
            <div class="text">
                <?php echo $this->excerpt; ?>
            </div>
        </div>
    </div>
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="comment">
        <div class="show-comment">
                <?php $this -> need('comments.php') ?>
            </div>
        <?php if($this->allow('comment')): ?>
        <div class="visible">
        <div class="send-comment">
            <div id="<?php $this->respondId(); ?>" class="respond">
            	
                        <textarea name="text" id="textarea" class="textarea" placeholder="快来写下成为女装大佬的宣言吧！" required ><?php $this->remember('text'); ?></textarea>
            		    <input type="hidden" name="_" value="<?php echo $this->security->getToken($this->permalink) ?>" />
                        <div class="send" id="submit-comment" type="submit"><span class="mdi mdi-send"></span></div>
                    
            	</form>
            </div>
    
            </div>
            <div class="extra">
                <?php if($this->user->hasLogin()): ?>
        		<div class="text-info"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></div>
        		<input type="hidden" name="author" value="博主(刷新可见)"/>
    			<input type="hidden" name="mail" value="" />
    			<input type="hidden" name="url" value="<?php $this->options->siteUrl(); ?>" />
                <?php else: ?>
                <span class="mdi mdi-account"></span><input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" placeholder="<?php _e('称呼'); ?>" required />
            	<span class="mdi mdi-email"></span><input type="email" name="mail" id="mail" class="text" placeholder="<?php _e('Email'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            	<span class="mdi mdi-home-outline"></span><input type="url" name="url" id="url" class="text" placeholder="<?php _e('网站'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
        <div class="extra"><div class="text-info"><?php _e('评论已关闭'); ?></div></div>
        <?php endif; ?>
    </form>
</div>
<?php }else{ ?>
<div class="bean article" onclick="ajaxLoad('<?php echo $this->permalink ?>');">
    <?php if ($this->fields->previewImage && $this->fields->previewImage!==""): ?>
    <div class="cover">
        <div class="cover-image" style="background-image:url(<?php $this->fields->previewImage(); ?>)"></div>
        <div class="title"><?php $this->title(); ?></div>
    </div>
    <?php endif; ?>
    <div class="content">
        <div class="text">
            <?php $this->excerpt(50, '') ?>
        </div>
        <div class="continue"><span class="mdi mdi-arrow-right"></span></div>
    </div>
</div>
<?php } endwhile; ?>
<div class="end">&nbsp;</div>
</div>
    <script>
        var pageInfo=<?php echo json_encode(
            [
                'currentPage' => $this->_currentPage,
                'total'=> $this->getTotal(),
                'pageSize' => $this->parameter->pageSize,
                'permaLink' => $this->_pageRow["permalink"],
                'type' => $this->parameter->type
            ]
            )  ?>
        
        
        /*< ceil($this->getTotal() / $this->parameter->pageSize)) {
					echo '' .str_replace("{page}",$this->_currentPage + 1,Typecho_Router::url($this->parameter->type .
	                (false === strpos($this->parameter->type, '_page') ? '_page' : NULL),
	                $this->_pageRow, $this->options->index));
					}*/
    </script>
<?php 
if(!isset($_GET['ajaxload'])){
    $this -> need('footer.php');
}
?>