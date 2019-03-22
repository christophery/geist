<?php

$categories = get_the_category();

?>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <article class="post-full
            <?php if ( has_post_thumbnail() == false ) { ?>
                no-image
            <?php } ?>
        ">

            <header class="post-full-header">
                <section class="post-full-meta">
                    <time class="post-full-meta-date" datetime="<?php echo get_the_date('F d, Y'); ?>"><?php echo get_the_date('F d, Y'); ?></time>
                    <?php
                    foreach($categories as $category){
                        echo '<span class="date-divider">/</span>';
                        echo '<a href="{{url}}">';
                        echo $category->name . ' ';
                        echo '</a>';
                    }
                    ?>
                </section>
                <h1 class="post-full-title"><?php echo get_the_title();?></h1>
            </header>

            <?php if ( has_post_thumbnail() ) { ?>
            <figure class="post-full-image">
                <?php the_post_thumbnail('medium_large',array('class' => 'feature_image')); ?>
            </figure>
            <?php } ?>

            <section class="post-full-content">
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </section>

            <footer class="post-full-footer">
                <?php get_template_part('template-parts/byline-single'); ?>
            </footer>

            <section class="post-full-comments">
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </section>

        </article>

    </div>
</main>

<!-- {{!-- Links to Previous/Next posts --}} -->
<!-- <aside class="read-next outer">
    <div class="inner">
        <div class="read-next-feed">
            {{#if primary_tag}}
            {{#get "posts" filter="tags:{{primary_tag.slug}}+id:-{{id}}" limit="3" as |related_posts|}}
                {{#if related_posts}}
                <article class="read-next-card"
                    {{#if ../primary_tag.feature_image}}
                        style="background-image: url({{img_url ../primary_tag.feature_image size="m"}})"
                    {{else}}
                        {{#if @site.cover_image}}
                            style="background-image: url({{img_url @site.cover_image size="m"}})"{{/if}}
                    {{/if}}
                >
                    <header class="read-next-card-header">
                        <small class="read-next-card-header-sitetitle">&mdash; {{@site.title}} &mdash;</small>
                        {{#../primary_tag}}
                        <h3 class="read-next-card-header-title"><a href="{{url}}">{{name}}</a></h3>
                        {{/../primary_tag}}
                    </header>
                    <div class="read-next-divider">{{> "icons/infinity"}}</div>
                    <div class="read-next-card-content">
                        <ul>
                            {{#foreach related_posts}}
                            <li><a href="{{url}}">{{title}}</a></li>
                            {{/foreach}}
                        </ul>
                    </div>
                    <footer class="read-next-card-footer">
                        <a href="{{#../primary_tag}}{{url}}{{/../primary_tag}}">{{plural meta.pagination.total empty='No posts' singular='% post' plural='See all % posts'}} →</a>
                    </footer>
                </article>
                {{/if}}
            {{/get}}
            {{/if}}

            {{!-- If there's a next post, display it using the same markup included from - partials/post-card.hbs --}}
            {{#next_post}}
                {{> "post-card"}}
            {{/next_post}}

            {{!-- If there's a previous post, display it using the same markup included from - partials/post-card.hbs --}}
            {{#prev_post}}
                {{> "post-card"}}
            {{/prev_post}}

        </div>
    </div>
</aside> -->

<!-- {{!-- Floating header which appears on-scroll, included from includes/floating-header.hbs --}} -->
<?php get_template_part('template-parts/floating-header'); ?>