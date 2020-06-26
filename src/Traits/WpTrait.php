<?php

namespace nlib\Wordpress\Traits;

trait WpTrait {

    public function get_language() : string {
        return function_exists('icl_object_id') && defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE ?? '' : get_bloginfo('language');
    }

    public function get_current_user_email() : string {
        return !empty(($User = wp_get_current_user())->data) ? $User->data->user_email : '';
    }
}