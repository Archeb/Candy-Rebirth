<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>



<div id="comments">
    <div class="comments-head"><svg style="width:20px;height:20px" viewBox="0 0 24 24">
    <path fill="white" d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7C5,5.89 5.9,5 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.9 12.75,23 12.5,23V23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15Z" />
</svg>&nbsp;&nbsp;<?php _e('评论'); ?></div>
    <?php $this->comments()->to($comments); ?>
    <li class="comment-body comment-parent comment-even comment-by-author"><div class="a-comment"><div class="comment-element"><div class="comment-container"><div class="comment-author-avatar"><a target="_blank" href=""><img class="avatar" src="" alt="" width="55" height="55"></a></div><div class="comment-author-info"><div class="comment-meta"><span class="comment-author-name"><a href="" rel="external nofollow"></a></span> <a class="comment-time"></a></div><div class="comment-content"><p></p></div></div></div></div></div></li>
    <?php if ($comments->have()): ?>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>
    
</div>

<?php if($this->allow('comment')): ?>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <div class="send-comment">
                <div class="reply-info reply-info-closed">
                    <div class="left">您正在回复给 <span id="reply-name">Poi</span>：</div>
                    <div class="right"><a onclick="TypechoComment.cancelReply()"><svg style="width:18px;height:18px;margin-top:2px" viewBox="0 0 24 24">
    <path fill="#626262" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
</svg></a></div>
                    <input type="hidden" name="parent" id="comment-parent" value="">
                </div>
                <div id="<?php $this->respondId(); ?>" class="respond">
                            <textarea rows=8 name="text" id="textarea" class="textarea" placeholder="快来写下成为女装大佬的宣言吧！" required ><?php $this->remember('text'); ?></textarea>
                		    <input type="hidden" name="_" value="<?php echo $this->security->getToken($this->permalink) ?>" />
                            <a onclick="sendComment()" class="send" id="submit-comment"><svg style="width:50px;height:20px" viewBox="0 0 24 24">
    <path fill="#666666" d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
</svg></a>
                </div>
                </div>
                <div class="extra">
                    <?php if($this->user->hasLogin()): ?>
                		<div class="text-info" style="background-color:#20bf20;color:white;"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></div>
                		<input type="hidden" name="author" value="<?php $this->user->screenName(); ?>"/>
            			<input type="hidden" name="mail" value="<?php $this->user->mail() ?>" />
            			<input type="hidden" name="url" value="<?php $this->options->siteUrl(); ?>" />
                        <?php else: ?>
                        <svg style="width:50px;height:15px;" viewBox="0 0 24 24">
    <path fill="#444444" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
</svg><input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" placeholder="<?php _e('称呼'); ?>" required />
                    	<svg onclick="changeCommentAvatarMode()" style="width:50px;height:15px;cursor:pointer;" viewBox="0 0 24 24">
    <path id="avatarMode" fill="#444444" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
</svg></span><input type="email" name="mail" id="mail" class="text" placeholder="←点此使用QQ头像" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    	<svg style="width:50px;height:15px" viewBox="0 0 24 24">
    <path fill="#444444" d="M9,19V13H11L13,13H15V19H18V10.91L12,4.91L6,10.91V19H9M12,2.09L21.91,12H20V21H13V15H11V21H4V12H2.09L12,2.09Z" />
</svg></span><input type="url" name="url" id="url" class="text" style="margin-right: 0;" placeholder="<?php _e('网站'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                        <script>
                            var mail = document.querySelector('#mail').value;
                            var end;
                            if((end = mail.indexOf('@use.qq.avatar')) != -1) {
                                changeCommentAvatarMode();
                                document.querySelector('#mail').value = mail.substring(0, end);
                            }
                        </script>
                        <?php endif; ?>
                </div>
            </form>
            <?php else: ?>
            <div class="text-info"><span class="mdi mdi-close"></span>&nbsp;<?php _e('评论已关闭'); ?></div>
            <?php endif; ?>
            
