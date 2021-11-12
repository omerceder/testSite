<?php

// Hide admin bar for user 'wp-test'
add_action('after_setup_theme', 'remove_admin_bar');
  function remove_admin_bar() {
    if (wp_get_current_user()->user_login == 'wp-test' ) {
      show_admin_bar(false);
    }
}
