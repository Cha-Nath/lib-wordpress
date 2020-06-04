<?php

namespace nlib\Wordpress\Interfaces;

interface AdminInterface {

    /**
     *
     * @return void
     */
    public function active_wp_admin_log() : void;
    
    /**
     *
     * @return void
     */
    public function add_admin_menu() : void;

    /**
     *
     * @return void
     */
    public function show_page_log() : void;

    /**
     *
     * @return void
     */
    public function show_content_log() : void;
}