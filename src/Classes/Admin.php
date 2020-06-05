<?php

namespace nlib\Wordpress\Classes;

use nlib\Path\Classes\Path;
use nlib\View\Traits\ViewTrait;
use nlib\Wordpress\Interfaces\AdminInterface;

Class Admin implements AdminInterface {

    use ViewTrait;

    private $_title = 'log';

    public function active_wp_admin_log(string $title) : void {
        $this->_title = $title;
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action( 'admin_action_show_content_log', [$this, 'show_content_log'] );
    }

    #region Admin
    
    public function add_admin_menu() : void {

        $title = __($this->_title);
        add_menu_page(
            $title,
            $title,
            'activate_plugins',
            sanitize_title($title),
            [$this, 'show_page_log']
        );

        // $subtitle = 'Log';
        // add_submenu_page(
        //     $stitle,
        //     $subtitle,
        //     $subtitle,
        //     'activate_plugins',
        //     sanitize_title($subtitle),
        //     [$this, 'show_page_log']
        // );
    }

    public function show_page_log() : void {
        
        $files = scandir($log = Path::i()->getLog());
        // $var = Path::i()->getVar();$log = Path::i()->getLog();
        
        // var_dump($var, substr(sprintf('%o', fileperms($var)), -4));
        // var_dump($log, substr(sprintf('%o', fileperms($log)), -4));
        
        // var_dump($files);

        unset($files[0]);
        unset($files[1]);
        unset($files[2]);
        
        add_thickbox();

        Path::i('wpa')->init(dirname(dirname(__DIR__)));        
        echo $this->View('admin/log')->setI('wpa')->render(['files' => $files]);
    }

    public function show_content_log() : void {
        
        if(array_key_exists($key = 'log', $request = $_REQUEST))
            if(file_exists($file = Path::i()->getLog() . $request[$key]))
                echo(file_get_contents($file));
    }

    #endregion
}