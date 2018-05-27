<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->footer(); ?>
</body>
</html>
<?php
    $echo = ob_get_contents();
    ob_clean();
    $placeholder = $this->options->themeUrl."/img/Akkarin.jpg";
    if(!empty($this->options->lazyLoad)) {
      $placeholder = $this->options->lazyLoad;
    }
    $preg = "/<img (.*)src(.*) \/>/i";
    $replaced = '<img class="lazyload" \\1src="'.$placeholder.'" data-src\\2 />';
    print preg_replace($preg, $replaced, $echo);
    ob_end_flush();
?>