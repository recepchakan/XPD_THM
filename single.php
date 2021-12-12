<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="container col-md-9">
            <article class="pt-5">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <picture>
                <?php /* post thumbnail öne çıkan görsel için*/ ?>
                    <?php if(has_post_thumbnail()):?>
                        <img src="<?php the_post_thumbnail_url('large');?>" class="img-fluid">
                        <?php endif; ?>
                </picture>    
                <section>
                    <?php if (have_posts()): while (have_posts()): the_post() ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </section>               
            </article> 
        </div>
        <div class="col-md-3 mt-4 pt-4">
            <?php dynamic_sidebar( 'page-sidebar' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

