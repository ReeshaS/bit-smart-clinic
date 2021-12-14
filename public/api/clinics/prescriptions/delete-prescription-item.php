<?php

declare( strict_types=1 );

use App\Core\Http\Auth;
use App\Core\Http\JSONResponse;
use App\Core\Http\Request;
use App\Models\PrescriptionItem;

require_once "../../../../bootstrap.php";

try {

    /*
     * Authenticate for incoming auth key
     * if no valid key is present, will return 401
     * */
    Auth::authenticate();


    $fields = [
        "id" => Request::getAsInteger( "id", true ),
    ];


    $object = PrescriptionItem::build( $fields );

    $result = $object->delete();

    if ( $result ) {
        JSONResponse::validResponse( "Deleted" );
        return;
    }

} catch ( Exception $exception ) {
    JSONResponse::exceptionResponse( $exception );
}