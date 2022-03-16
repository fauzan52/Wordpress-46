<?php
global $fauzanredux;
get_header('');
?>
<div class="container">
    <?php
    if (have_posts()) :
    if (is_search() || is_archive() || is_tax() || is_tag()) :?>
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>
    <?php endif; ?>
        <div class="row">
                <?php
                if (is_home()):
                    get_template_part('template-parts/content', 'adv-top');
                    get_template_part('template-parts/content', 'top-primary');
                    get_template_part('template-parts/content', 'top-secondary');
                    get_template_part('template-parts/content', 'right');
                    get_template_part('template-parts/content', 'adv-middle');
                    get_template_part('template-parts/content', 'middle');
                endif;
                ?>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 col-sm-12">
            <?php get_template_part('sidebar'); ?>
            <div class="mySticky">
                <aside class="widget-area">
                    <?php
                    dynamic_sidebar('sticky-right');
                    ?>
                </aside>
            </div>
        </div>

<?php endif; ?>
<?php
get_template_part('template-parts/content', 'bottom');
?>

<?php
get_footer();
?>
</main>