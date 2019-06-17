<?php
/**
 * Template part for displaying posts
 */

?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blogger">
    <div class="category">
      <a href="<?php echo esc_url( get_permalink() ); ?>"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></a>
    </div>
    <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
    <div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
    <div class="post-image">
        <?php
          if ( ! is_single() ) {

            // If not a single post, highlight the video file.
            if ( ! empty( $video ) ) {
              foreach ( $video as $video_html ) {
                echo '<div class="entry-video">';
                  echo $video_html;
                echo '</div>';
              }
            };

          };
        ?>
    </div>
    <div class="text">
        <?php the_excerpt();?>
      </div>
      <a class="post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Continue Reading....','multipurpose-ecommerce' ); ?></a>
  </div>
</div>

