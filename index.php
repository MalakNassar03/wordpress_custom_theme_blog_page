<!--this will show the blogs-->


<?php

get_header();
?>


<article class="content px-3 py-5 p-md-5">
    <?php
    if (have_posts()){
        while (have_posts()){
            the_post();
            get_template_part('template-parts/content', 'archive');
        }
    }




    ?>
<!--to get the number thingy -->
    <?php
    the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => '« Previous',
            'next_text' => 'Next »',
    ));
    ?>

</article>




<?php
get_footer()

?>
