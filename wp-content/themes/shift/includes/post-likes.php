<?php
class StagLikes{
    function __construct(){
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
        add_action('wp_ajax_stag-likes', array(&$this, 'ajax_callback'));
        add_action('wp_ajax_nopriv_stag-likes', array(&$this, 'ajax_callback'));
    }

    function enqueue_scripts(){
        wp_localize_script('script', 'stag_likes', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
    }

    function setup_likes($post_id){
        if(!is_numeric($post_id)) return;
        add_post_meta($post_id, '_stag_likes', '0', true);
    }

    function like_this($post_id, $action = 'get'){
        if(!is_numeric($post_id)) return;

        switch($action){
            case "get":
            $likes = get_post_meta($post_id, '_stag_likes', true);
            if(!$likes){
                $likes = 0;
                add_post_meta($post_id, '_stag_likes', $likes, true);
            }
            return '<i class="icon icon-heart"></i> <i class="stag-likes-count">'.$likes.'</i>';
            break;

            case "update":
            $likes = get_post_meta($post_id, '_stag_likes', true);
            if( isset($_COOKIE['stag_likes_'. $post_id]) ) return $likes;
            $likes++;
            update_post_meta($post_id, '_stag_likes', $likes);
            setcookie('stag_likes_'.$post_id, $post_id, time()*20, '/');
            return '<i class="icon icon-heart"></i> <i class="stag-likes-count">'.$likes.'</i>';
            break;
        }
    }

    function do_like(){
        global $post;
        $output = $this->like_this($post->ID);

        $class = 'stag-likes';
        $title = __('Like this', 'stag');
        if(isset($_COOKIE['stag_likes_'.$post->ID])){
            $class = 'stag-likes active';
            $title = __('You already like this', 'stag');
        }
        return '<a href="#" class="'.$class.'" title="'.$title.'" id="stag-likes-'.$post->ID.'">'.$output.'</a>';
    }

    function ajax_callback($post_id){
        if(isset($_POST['likes_id'])){
            $post_id = str_replace('stag-likes-', '', $_POST['likes_id']);
            echo $this->like_this($post_id, 'update');
        }else{
            $post_id = str_replace('stag-likes-', '', $_POST['post_id']);
            echo $this->like_this($post_id, 'get');
        }
        exit;
    }

}

global $stag_likes;
$stag_likes = new StagLikes();

function stag_likes(){
    global $stag_likes;
    echo $stag_likes->do_like();
}