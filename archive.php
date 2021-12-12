<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <main class="container">
                <h1><?php single_cat_title(); ?></h1> 

                <?php if (have_posts()): while (have_posts()): the_post() ?>
                    <article class="row p-2">
                        <div class="col-md-4">
                        <?php /* post thumbnail öne çıkan görsel için*/ ?>
                        <?php if(has_post_thumbnail()):?>
                            <img src="<?php the_post_thumbnail_url('small');?>" class="img-fluid img-fluid-dz rounded">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <a class="m-2 d-block" href="<?php the_permalink(); ?>"><h2 class="h3"><?php the_title(); ?></h2></a>
                            <div class="small text-muted text-end"><time datetime="<?php the_time('Y-m-d\TG:i'); ?>" class=""><?php the_time('D, d.m.Y')?> </time></div>
                            <?php /*özet için */?>
                            <?php the_excerpt(); ?>
                            <a class="mb-5 d-block" href="<?php the_permalink(); ?>">Devamını Oku...</a>
                        </div>

                    </article>
                <?php endwhile; endif; ?>

            </main>
        </div>
        <aside class="col-md-3">
                <?php get_sidebar("sidebar_1");?>

        </aside>
    </div>


<?php get_footer(); ?>