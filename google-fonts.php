<?php 
include("lib/converter.php");

if( isset( $_POST['content']) ) { 

$cssContent = $_POST['content'];

$arr_css = explode("}", $cssContent);

$output = '';
foreach($arr_css as $key => $str) {
    
    $re = '/url\((.*)\) /m';
    preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

    if( isset($matches[0]) && isset($matches[0][1]) ) {
        $fontUrl = $matches[0][1];
        $base64 = base64DataUri($fontUrl);
        $str = str_replace($fontUrl,$base64,$str);
    }

    $value = $str . "}";
    $output .= $value;
}

?>
<textarea type="text" name="content" style="width:100%;height:100%;"><?php echo $output; ?></textarea>
<br><a href="google-fonts.php">Back</a>
<?php } else { ?>
<form method="POST">
    <textarea type="text" name="content" style="width:50%;height:200px;"></textarea><br />
    <input type="submit" value="Submit" />
</form>
<?php } ?>