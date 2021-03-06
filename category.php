<?php get_header(); ?>
<div id="content" class="row">
    <div class="span9">
        <?php the_post(); ?>
        <h1 class="page-title"><?php _e( 'Category Archives for', 'gavd' ) ?> <span><?php single_cat_title() ?></span></h1>
        <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
        <?php rewind_posts(); ?>
        <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
        <div id="nav-above" class="navigation">
            <p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'gavd' )) ?></p>
            <p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'gavd' )) ?></p>
        </div>
    <?php } ?>
    <?php while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'gavd'), the_title_attribute('echo=0') ); ?>" rel="bookmark">

                    <?php
if ( has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
                <?php the_title(); ?></a></h2>
                <div class="entry-meta">
                    <span class="meta-prep meta-prep-author"><?php _e('By ', 'gavd'); ?></span>
                    <span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'gavd' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                    <span class="meta-sep"> | </span>
                    <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'gavd'); ?></span>
                    <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                </div>
                <div class="entry-summary">
                  <?php the_excerpt( __( 'continue reading <span class="meta-nav">&raquo;</span>', 'gavd' )  ); ?>
                </div>
                <div class="entry-utility">
                    <?php if ( $gavd_cats = gavd_cats(', ') ) : // ?>
                    <span class="cat-links"><?php printf( __( 'Also posted in %s', 'gavd' ), $gavd_cats ) ?></span>
                    <?php endif ?>
                    <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'gavd' ) . '</span>', ", ", "</span>\n" ) ?>
                </div>
            </div>
    <?php endwhile; ?>
    <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
    <div id="nav-below" class="navigation">
        <p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'gavd' )) ?></p>
        <p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'gavd' )) ?></p>
    </div>
    <?php } ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>