<?php
/*
* Template Name: Contact
*/

$nameError = __( 'Please enter your name.', 'stag' );
$emailError = __( 'Please enter your email address.', 'stag' );
$emailInvalidError = __( 'You entered an invalid email address.', 'stag' );
$commentError = __( 'Please enter a message.', 'stag' );

$errorMessages = array();

if(isset($_POST['submitted'])){
    if(trim($_POST['contactName']) === '') {
        $errorMessages['nameError'] = $nameError;
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if(trim($_POST['email']) === '')  {
        $errorMessages['emailError'] = $emailError;
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $errorMessages['emailInvalidError'] = $emailInvalidError;
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if(trim($_POST['comments']) === '') {
        $errorMessages['commentError'] = $commentError;
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if(!isset($hasError)) {
        $emailTo = stag_get_option('general_contact_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = '[Contact Form] From '.$name;

        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments \n\n";
        $body .= 'Site: '.get_bloginfo('name');

        $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<?php get_header(); ?>

<!-- BEGIN #primary.hfeed -->
<div id="primary" class='hfeed'>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php stag_page_before(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php stag_page_start(); ?>
            <div class="hentry-inner">
                <h2 class="entry-title"><?php the_title(); ?></h2>

                <div class="entry-content clearfix">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php stag_page_end(); ?>
        </article>
        <?php stag_page_after(); ?>
        <div id="contact-form">
            <div class="inner">
                <i class="icon icon-triangle"></i>
                <h3 class="section-title"><?php _e('Send a Direct Message', 'stag'); ?><span class="section-description"><?php _e('I will get back to you soon', 'stag') ?></span></h3>

                <?php if(isset($emailSent) && $emailSent == true) { ?>

                    <div class="stag-alert green">
                        <p><?php _e('Thanks, your email was sent successfully.', 'stag') ?></p>
                    </div>

                <?php } else { ?>

                <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

                    <div class="grids">
                        <p class="grid-6">
                            <label for="contactName"><?php _e('Your Name', 'stag') ?></label>
                            <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>">
                        </p>

                        <p class="grid-6">
                            <label for="email"><?php _e('Your Email', 'stag') ?><span>*Will not be published</span></label>
                            <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </p>
                    </div>

                    <p>
                        <label for="commentsText"><?php _e('Your Message', 'stag') ?></label>
                        <textarea rows="8" name="comments" id="commentsText" ><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                    </p>

                    <p class="buttons">
                        <input type="submit" id="submitted" class="accent-background" name="submitted" value="<?php _e('Send Message', 'stag') ?>">
                    </p>

                </form>

                <?php } ?>

            </div>
        </div>

    <?php endwhile; ?>

    <?php endif; ?>

<!-- END #primary.hfeed -->
</div>

<?php get_footer() ?>