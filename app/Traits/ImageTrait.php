<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {

        if( $request->hasFile( $fieldname ) ) {

            $imageName = uniqid() . $request->file($fieldname)->getClientOriginalName();

            $request->file($fieldname)->move(public_path($directory), $imageName);
            
            return $imageName;

        }

        return null;

    }

}