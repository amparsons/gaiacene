<?php get_header(); ?>
<div class="blog">
    <div class="wrapper-footer">
        <section>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            	<h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <ul class="social-icons">
                    <li>Share post: </li>
                    <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=http://www.gaiacene.com"><img src="<?php bloginfo('template_directory'); ?>/img/twitter-footer-icon.png" alt="Gaiacene"/></a></li>
                    <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.gaiacene.com&title=<?php the_title(); ?>&summary=Check out this post from Gaiacene&source=gaiacene.com"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin-footer-icon.png" alt="Gaiacene"/></a></li>
                </ul>
            <?php endwhile; endif; ?>
        </section>
        
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
