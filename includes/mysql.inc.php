<?php 
//DATABASE CONNECTION AND INPUT VALIDATION.
DEFINE ('DB_USER', '');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', '');
DEFINE ('DB_NAME', '');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, 'utf8');

function Escape_data($data , $conn){
    if(get_magic_quotes_gpc()){
        $data = stripslashes($data);
    }
    return mysqli_real_escape_string($conn, trim($data));
}  
function selectAllData($conn, $userDetails){
    $sqlSelect = mysqli_prepare($conn,"SELECT * FROM user_account WHERE email = ?");
    mysqli_stmt_bind_param($sqlSelect, 's', $userDetails);
    mysqli_stmt_execute($sqlSelect);
    $result = $sqlSelect->get_result();
    $r = mysqli_num_rows($result);
    if($r != 0){
        $r = mysqli_fetch_assoc($result);
    }else{
        $r = 0;
    }
    return $r;
    mysqli_stmt_close($sqlSelect);
}






?>
