<?php

get_header();

?>
<main class="container">
    <?php

    while( have_posts() )
    {
        the_post();

        ?>
        <article id="post-<?php the_ID(); ?>">
            <div class="singlePost-head">
                <?php the_post_thumbnail( 'large-thumbnail' ) ?>

                <div class="singlePost-title">
                    <h1><?php the_title() ?></h1>

                    <div class="singlePost-metadata">
                        <div class="author">
                            <div>Author:</div>
                            <?php the_author_posts_link(); ?>
                        </div>

                        <div class="published">
                            <div>Published on:</div>
                            <time datetime="<?= get_the_date('c') ?>"><?php the_date() ?></time>
                        </div>

                        <div class="category">
                            <div>Category:</div>
                            <?= get_the_category_list( ', ', 'single' ) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="singlePost-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php

        // Previous/next post navigation.
        the_post_navigation(
            [
                'next_text' =>
                    '<span class="screen-reader-text">' . esc_html__( 'Next post' ) . '</span>'.
                    '<span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Next post' ) . '</span>'.
                    '<span class="nav-title">%title</span>',
                'prev_text' =>
                    '<span class="screen-reader-text">' . esc_html__( 'Previous post' ) . '</span>'.
                    '<span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Previous post' ) . '</span>'.
                    '<span class="nav-title">%title</span>',
            ]
        );

        // If comments are open or there is at least one comment, load up the comment template.
        if( comments_open() || get_comments_number() )
        {
            echo( '<div class="comments-area">' );

            comments_template();

            echo( '</div>' );
        }
    }

    ?>
</main>
<?php

get_footer();