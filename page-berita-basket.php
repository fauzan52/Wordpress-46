<?php get_header(); ?>
<?php
$PrimaryPost = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'cat'            => 4,
));
?>
<?php if ($PrimaryPost->have_posts()) : ?>
<?php while ($PrimaryPost->have_posts()) :
$PrimaryPost->the_post(); ?>
<main>
    <div class="app-card-primary">
        <div class="app-card-primary__container">
            <div class="app-card-primary__images">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image-post">
                </a>
                <div class="app-card-primary__background">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 15, ' ...'); ?></a>
                    </h3>
                    <!--                    <p class="card-text">--><?php //echo wp_trim_words(get_the_content(), 60, ' ...'); ?><!--</p>-->
                </div>
            </div>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <div class="flex">
        <?php
        $SecondaryPost = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'offset'         => 1,
            'cat'            => 4,
            'order'          => 'meta_value',
            'meta_query'     => array(
                'key'     => 'entry_views',
                'compare' => "=",
            )));
        ?>
        <?php if ($SecondaryPost->have_posts()) : ?>
        <?php while ($SecondaryPost->have_posts()) : $SecondaryPost->the_post(); ?>
            <div class="app-card-secondary">
                <div class="app-card-secondary__container">
                    <div class="app-card-secondary__images">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image-post">
                        </a>
                    </div>
                    <div class="app-card-secondary__box">
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ' ...'); ?></a>
                        </h3>
                        <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, ' ...'); ?></p>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php endif; ?>
    <?php endif; ?>

    <?php
    $AllPost = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 999,
        'offset'         => 4,
        'cat'            => 4
    ));
    ?>
    <?php if ($AllPost->have_posts()) : ?>
        <?php while ($AllPost->have_posts()) : $AllPost->the_post(); ?>
            <div class="app-card-allpost">
                <div class="app-card-allpost__images">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image-post">
                    </a>
                </div>
                <div class="app-card-allpost__box">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ' ...'); ?></a>
                    </h3>
                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, ' ...'); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="clear">
        <?php get_footer(); ?>
    </div>