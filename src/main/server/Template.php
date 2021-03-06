<?php

class Template {

    static function render($tpl_file, $vars = array(), $include_globals = false) {

        if (!file_exists($tpl_file) || is_dir($tpl_file)) { return '404'; }

        extract($vars);

        if ($include_globals) extract($GLOBALS, EXTR_SKIP);

        ob_start();

        require($tpl_file);

        $applied_template = ob_get_contents();
        ob_end_clean();

        return $applied_template;
    }

}