<?php
$user_twitter = get_the_author_meta('user_twitter');
$user_facebook = get_the_author_meta('user_facebook');
$user_googleplus = get_the_author_meta('user_googleplus');
$user_linkedin = get_the_author_meta('user_linkedin');
if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : ?>

<div id="author-bio">

<div id="author-avatar">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
</div>

<div id="author-description">

<div class="atop">
<h2><?php printf( __( 'About %s', TEMPLATE_DOMAIN ), get_the_author() ); ?></h2>
<div id="author-link">
<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', TEMPLATE_DOMAIN ), get_the_author() ); ?>
</a>
</div>
</div>

<?php if ( !$user_twitter && !$user_facebook && !$user_googleplus && !$user_linkedin ): ?>
<?php else: ?>
<div class="acenter">

<?php if($user_twitter): ?>
<p class="user-twitter"><a title="<?php printf( __( 'View %s Twitter Profile', TEMPLATE_DOMAIN ), get_the_author() ); ?>" href="<?php echo stripcslashes($user_twitter); ?>">&nbsp;</a></p>
<?php endif; ?>

<?php if($user_facebook): ?>
<p class="user-facebook"><a title="<?php printf( __( 'View %s Facebook Profile', TEMPLATE_DOMAIN ), get_the_author() ); ?>" href="<?php echo stripcslashes($user_facebook); ?>">&nbsp;</a></p>
<?php endif; ?>

<?php if($user_googleplus): ?>
<p class="user-googleplus"><a title="<?php printf( __( 'View %s Google+ Profile', TEMPLATE_DOMAIN ), get_the_author() ); ?>" href="<?php echo stripcslashes($user_googleplus); ?>">&nbsp;</a></p>
<?php endif; ?>

<?php if($user_linkedin): ?>
<p class="user-linkedin"><a title="<?php printf( __( 'View %s Linkedin Profile', TEMPLATE_DOMAIN ), get_the_author() ); ?>" href="<?php echo stripcslashes($user_linkedin); ?>">&nbsp;</a></p>
<?php endif; ?>

</div>
<?php endif; ?>

<div class="abottom">
<?php the_author_meta( 'description' ); ?>
</div>

</div>

</div>
<?php endif; ?>