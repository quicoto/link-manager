<?php

function RemoveAddMediaButtonsForNonAdmins(){
  remove_action( 'media_buttons', 'media_buttons' );
}
add_action('admin_head', 'RemoveAddMediaButtonsForNonAdmins');