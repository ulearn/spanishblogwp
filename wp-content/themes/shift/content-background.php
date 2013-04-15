<?php

$op_meta = get_post_meta(get_the_ID(), '_stag_custom_background_opacity', true);
$pattern = get_post_meta(get_the_ID(), '_stag_custom_pattern', true);

if( $op_meta == '' ){
    $opacity = 5;
}else{
    if(is_numeric($op_meta)){
        $opacity = $op_meta;
    }else{
        $opacity = 5;
    }
}

$opacity = intval($opacity)/100;

if($pattern != ''){

?>

<span class="custom-background" style="filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $op_meta; ?>); opacity: <?php echo $opacity; ?>"></span>

<?php

}elseif(get_post_meta(get_the_ID(), '_stag_custom_background', true) != ''){

?>

    <span class="custom-background" id="custom-background-<?php echo get_the_ID(); ?>" style="filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo $op_meta; ?>); opacity: <?php echo $opacity; ?>"></span>

    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#custom-background-<?php echo get_the_ID(); ?>').backstretch(['<?php echo get_post_meta(get_the_ID(), '_stag_custom_background', true); ?>']);
    });
    </script>

    <?php
}
?>