<aside>
    <h3>Search</h3>
    <?php get_search_form(); ?>
    
    <div class="filters">
        <h3>Recent Posts</h3>
        <ul>
            <?php
                $args = array( 'numberposts' => '5' );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                }
            ?>
        </ul>
    </div>
    <div class="filters">
        <h3>Categories</h3>
        <ul>
            <?php wp_list_categories('orderby=name&title_li='); ?>
        </ul>
    </div>
    <div class="filters">
        <h3>Archives</h3>
        <ul>
            <?php wp_get_archives('type=monthly&limit=12'); ?>
        </ul>
    </div>
    <div class="filters tags">
        <h3>Tags</h3>
            <?php
            wp_tag_cloud('smallest=16&largest=16&unit=px&number=45&&orderby=count&order=RAND');
            ?>
    </div>
    
</aside>