<?php 

/**
 *  
 *  Set of function for develop apps
 *  PlinXS Framework
 *  
 */

/**
 * Print of the send variable formatted and
 * other relevant information 
 */
if(!function_exists('dd')){
    function dd($var, $with_type)
    {
        echo '<pre style="
            font-family: Lucida ;
            border-radius: 5px;
            background: #ececec;
            padding: 50px;
            font-size: 14px;
            width: 80%;
            margin: 50px auto">' ;

        echo '<div style="font-weight: bolder">' . 
                titles('orange', 'Variable enviada', $var, $with_type) . '
            </div>';

        curr_dir();
        curr_file();

        titles('green', '$_GET', $_GET, $with_type);
        titles('gray', '$_POST', $_POST, $with_type);
        titles('purple', '$_SERVER', $_SERVER, $with_type);

        echo '</pre>';

        exit();
    }

}

/**
 *
 * Select of type print
 * 
 */
if(!function_exists('print_array_by')){
    function print_array_by($var, $with_type)
    {
        if(isset($with_type) && $with_type == 1){
            var_dump($var);
        } else {
            print_r($var);
        }
    }
}

/**
 *
 * Current directory
 * 
 */
if(!function_exists('curr_dir')){
    function curr_dir()
    {
        echo '<hr>Directorio actual: ' . __dir__ . '';
    }
}

/**
 *
 * Current file
 * 
 */
if(!function_exists('curr_file')){
    function curr_file()
    {
        echo '<hr>Archivo actual: ' . __FILE__ ;
    }
}


if(!function_exists('titles')){
    function titles($color, $text, $var, $with_type)
    {
        echo '<hr>';
        echo "<p style=\"
                color: {$color}; 
                font-weight: bolder;
                font-size: 30px;
                margin: 0px !important;
                text-align: center;\">
            {$text}</p>";
        echo "<p style=\"
                color: {$color}; \">Existen " . count($var) . " elementos en la variable</p>";
        print_array_by($var, $with_type);
    }
}