
<?php
/*$jsonObj = json_decode( $_POST[ 'submit' ] );
echo 'jsonObj=[' . $jsonObj->key1 . ']';*/

$jsonObj = json_decode( $_POST[ 'submit' ] );
//echo 'jsonObj=[' . $jsonObj[ 0 ]->items[ 0 ] . ']';

// Array size
$arrSize = count ( $jsonObj[ 0 ]->items );

// String content
$jsonContent = '{"items":[';
// Build the content file
for ( $i = 0; $i < $arrSize; $i++ ) {
    $jsonContent .= $jsonObj[ 0 ]->items[ $i ];
    if ( $i < $arrSize - 1 ) {
        $jsonContent .= ',';
    }
}
$jsonContent .= ']}';


// Write file
if ( !$jsonfile = fopen( 'pb.json', 'w' ) ) {
    echo "No se puede abrir el archivo, contactar con su administrador (verificar permisos)";
    exit;
} else {
    echo "Archivo guardado satisfactoriamente";
}
fwrite( $jsonfile, $jsonContent );
fclose( $jsonfile );

?>
