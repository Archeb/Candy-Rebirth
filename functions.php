<?php 
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('words', 'entry');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('words', 'entry');
class words {
    public static function entry()
    {
    ?>
<style>
.field.is-grouped{margin-top:10px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;  -ms-flex-wrap: wrap;flex-wrap: wrap;}.field.is-grouped>.control{-ms-flex-negative:0;flex-shrink:0}.field.is-grouped>.control:not(:last-child){margin-bottom:.5rem;margin-right:.75rem}.field.is-grouped>.control.is-expanded{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-negative:1;flex-shrink:1}.field.is-grouped.is-grouped-centered{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.field.is-grouped.is-grouped-right{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.field.is-grouped.is-grouped-multiline{-ms-flex-wrap:wrap;flex-wrap:wrap}.field.is-grouped.is-grouped-multiline>.control:last-child,.field.is-grouped.is-grouped-multiline>.control:not(:last-child){margin-bottom:.75rem}.field.is-grouped.is-grouped-multiline:last-child{margin-bottom:-.75rem}.field.is-grouped.is-grouped-multiline:not(:last-child){margin-bottom:0}.tags{-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.tags .tag{margin-bottom:.5rem}.tags .tag:not(:last-child){margin-right:.5rem}.tags:last-child{margin-bottom:-.5rem}.tags:not(:last-child){margin-bottom:1rem}.tags.has-addons .tag{margin-right:0}.tags.has-addons .tag:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.tags.has-addons .tag:not(:last-child){border-bottom-right-radius:0;border-top-right-radius:0}.tag{-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#f5f5f5;border-radius:3px;color:#4a4a4a;display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;font-size:.75rem;height:2em;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;line-height:1.5;padding-left:.75em;padding-right:.75em;white-space:nowrap}.tag .delete{margin-left:.25em;margin-right:-.375em}.tag.is-white{background-color:#fff;color:#0a0a0a}.tag.is-black{background-color:#0a0a0a;color:#fff}.tag.is-light{background-color:#fff;color:#363636}.tag.is-dark{background-color:#363636;color:#f5f5f5}.tag.is-primary{background-color:#00d1b2;color:#fff}.tag.is-info{background-color:#3273dc;color:#fff}.tag.is-success{background-color:#23d160;color:#fff}.tag.is-warning{background-color:#ffdd57;color:rgba(0,0,0,.7)}.tag.is-danger{background-color:#ff3860;color:#fff}.tag.is-large{font-size:1.25rem}.tag.is-delete{margin-left:1px;padding:0;position:relative;width:2em}.tag.is-delete:after,.tag.is-delete:before{background-color:currentColor;content:"";display:block;left:50%;position:absolute;top:50%;-webkit-transform:translateX(-50%) translateY(-50%) rotate(45deg);transform:translateX(-50%) translateY(-50%) rotate(45deg);-webkit-transform-origin:center center;transform-origin:center center}.tag.is-delete:before{height:1px;width:50%}.tag.is-delete:after{height:50%;width:1px}.tag.is-delete:focus,.tag.is-delete:hover{background-color:#e8e8e8}.tag.is-delete:active{background-color:#dbdbdb}.tag.is-rounded{border-radius:290486px}
</style>
<script>
    
</script>
<script>
var isComposing=false;
document.addEventListener('DOMContentLoaded',function(){
    var statDiv = document.createElement("div");
    statDiv.className="field is-grouped";
    statDiv.innerHTML='<span class="tag">统计：</span><div class="control"><div class="tags has-addons"><span class="tag is-light" id="words-stat">0</span> <span class="tag is-danger">个文字</span></div></div><div class="control"><div class="tags has-addons"><span class="tag is-light" id="pics-stat">0</span> <span class="tag is-info">张图片</span></div></div>';
    document.querySelector('#tab-advance').appendChild(statDiv);
    document.querySelector('#wmd-editarea textarea').addEventListener('keyup',handleStat);
    document.querySelector('#wmd-editarea textarea').addEventListener('compositionstart',function(){isComposing=true;});
    document.querySelector('#wmd-editarea textarea').addEventListener('compositionend',function(){isComposing=false;});
});
function handleStat(){
    if(!isComposing){
        document.querySelector('#words-stat').innerHTML=document.querySelector('#wmd-preview').textContent.length;
        document.querySelector('#pics-stat').innerHTML=document.querySelector('#wmd-preview').querySelectorAll('img').length;
    }
}
</script>
<?php
    }
}
?>

<?php

function themeConfig($form) {
    $bgURL = new Typecho_Widget_Helper_Form_Element_Text('bgURL', NULL, NULL, _t('站点背景图片地址'), _t('在这里填入一个图片 URL 地址, 作为背景图片'));
    $form->addInput($bgURL);
    $logoURL = new Typecho_Widget_Helper_Form_Element_Text('logoURL', NULL, NULL, _t('站点Logo地址'), _t('在这里填入一个图片 URL 地址, 作为Logo头像。留空自动使用文章作者头像'));
    $form->addInput($logoURL);
    $SNSHTML = new Typecho_Widget_Helper_Form_Element_Textarea('SNSHTML', NULL, NULL, _t('SNS链接设置'), _t('编辑此处HTML即可修改作者信息下面的社交网络内容，不知道怎么写？<a href="https://github.com/Archeb/Candy-Rebirth">【参考这里】</a>'));
    $form->addInput($SNSHTML);
    $siteCreate = new Typecho_Widget_Helper_Form_Element_Text('siteCreate', NULL, NULL, _t('站点成立年份'), _t('方便Copyright显示'));
    $form->addInput($siteCreate);
    $lazyLoad = new Typecho_Widget_Helper_Form_Element_Text('lazyLoad', NULL, NULL, _t('图片懒加载占位图'), _t('默认是阿卡林呢'));
    $form->addInput($lazyLoad);
    $firstScreen = new Typecho_Widget_Helper_Form_Element_Radio('firstScreen', 
    array('showIndex' => _t('显示首页(Explore Me)'),
    'showArchive' => _t('显示文章列表')),
    'showArchive', _t('首屏显示选项'));
    $form->addInput($firstScreen);
    
    $wrapperLoaction = new Typecho_Widget_Helper_Form_Element_Radio('wrapperLoaction', 
    array('placeLeft' => _t('居左'),
    'placeMiddle' => _t('居中'),
    'placeRight' => _t('居右')),
    'placeLeft', _t('文章内页位置'));
    $form->addInput($wrapperLoaction);
    
    $navColor = new Typecho_Widget_Helper_Form_Element_Radio('navColor', 
    array('dark' => _t('暗色'),
    'bright' => _t('亮色')),
    'dark', _t('导航栏颜色风格'),'请根据背景图色调选择');
    $form->addInput($navColor);
}

function themeFields($layout) {
    ?>
    <style>
    #custom-field input{
        width:100%;
    }
    </style>
    <?php
    $previewImage = new Typecho_Widget_Helper_Form_Element_Text('previewImage', NULL, NULL, "文章封面图", "在此填入一个图片地址以显示文章封面图，留空不显示");
    $layout->addItem($previewImage);
}

function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div class="a-comment">
        <div class="comment-element" id="<?php $comments->theId(); ?>">
            <div class="comment-container">
                <div class="comment-author-avatar">
                    <a target="_blank" href="<?php echo $comments->url; ?>"><?php
                    $mail=$comments->mail;
                    if($mail==""){
                        $mail="nomail@nomail.nomail";
                    }
                    $mail = explode("@",$mail); 
                    if($mail[1]=="use.qq.avatar"){
                        echo '<img class="avatar" src="https://q2.qlogo.cn/headimg_dl? bs='.$mail[0].'&dst_uin='.$mail[0].'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="55px" height="55px">';
                    }else{
                        //直接用原生头像函数获取
                        $comments->gravatar('55', '');
                    }
                    ?></a>
                </div>
                <div class="comment-author-info">
                    <div class="comment-meta">
                        <span class="comment-author-name"><?php echo $comments->author(); ?></span>
                        <a class="comment-time"><?php echo time_elapsed_string($comments->date->format('Y-m-d H:i:s')) ?>前<span class="detail-time">&nbsp;·&nbsp;<?php echo $comments->date->format('Y-m-d H:i'); ?></span></a>
                    </div>
                    <div class="comment-content">
                        <?php $comments->content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <a class="comment-reply" onclick="TypechoComment.reply('<?php $comments->theId(); ?>', <?php echo explode("-",$comments->theId)[1]; ?>);"><span class="mdi mdi-reply"></span></a> 
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php }

function isMobile() {
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
  if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
    return true;
  }
  // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
  if (isset($_SERVER['HTTP_VIA'])) {
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  }
  // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel',
    'lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi',
    'openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
    // 从HTTP_USER_AGENT中查找手机浏览器的关键字
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
      return true;
    }
  }
  // 协议法，因为有可能不准确，放到最后判断
  if (isset ($_SERVER['HTTP_ACCEPT'])) {
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') ===
    false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    }
  }
  return false;
}

function time_elapsed_string($datetime, $full = false) {
    $tz=new DateTimeZone('Asia/Shanghai');
    $now = new DateTime('@'.time(),$tz);
    $ago = new DateTime($datetime,$tz);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => '年',
        'm' => '月',
        'w' => '周',
        'd' => '天',
        'h' => '小时',
        'i' => '分钟',
        's' => '秒',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : '';
}
?> 