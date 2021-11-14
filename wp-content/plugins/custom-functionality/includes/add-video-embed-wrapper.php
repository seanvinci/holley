<?php
/*  Add responsive container to embeds
/* ------------------------------------ */ 
function alx_embed_html( $html ) {
  return '<div class="video">'.$html.'</div>';
}
add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 ); ?>