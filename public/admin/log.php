<section>
    <ul>
        <?php foreach($files = $this->getParameter('files') as $file) :

            $url = add_query_arg( array(
                'action' => 'show_content_log',
                'log' => $file,
                'TB_iframe' => 'true',
                'width' => '940',
                'height' => '880',
            ), admin_url( 'admin.php' ) );

            echo '<li><a href="' . $url . '" class="thickbox">' . $file . '</a></li>';
        endforeach; ?>
    </ul>
</section>