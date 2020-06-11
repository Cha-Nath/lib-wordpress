<?php

namespace nlib\Wordpress\Interfaces;

interface AdminInterface {

    /**
     *
     * @param string $title
     * @return void
     */
    public function active_wp_admin_log(string $title) : void;
    
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