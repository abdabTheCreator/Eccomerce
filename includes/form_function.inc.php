<?php
//CREATES PRIVATE FORM STRUCTURE
function create_form_input($name, $type, $placeholder, $errors = array()){
    $value = false;
    if(isset($_POST[$name])){
        $value = $_POST[$name];
    }
    if($value && get_magic_quotes_gpc()){
        $value = stripslashes($value);
    }

    if($type == 'text' || $type == 'password' || $type == 'email' || $type == 'submit'){
        echo '<input type="'.$type.'" name="' .$name.'" id="'.$name.'"placeholder="'.$placeholder.'"/>';
    }else if($type == 'option'){
        
    }
    if(array_key_exists($name, $errors)){
        echo'<div class="input_error">'.$errors[$name].'</div>';
    }
}



?>