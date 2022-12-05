<?php


//
//
//if (!function_exists('get_token')) {
//    function get_token()
//    {
//        $prams = [
//            'grant_type' => 'client_credentials',
//            'client_id' => get_client_id(),
//            'client_secret' => get_client_secret(),
//            'scope' => 'InvoicingAPI'
//        ];
//
//        $res = Http::post('https://id.preprod.eta.gov.eg/connect/token', $prams);
//        if ($res->status() == 200) {
//            return $res->access_token;
//        } else {
//            return null;
//        }
//    }
//}

if (!function_exists('upload_image')) {
    function upload_image($image)
    {
            $imagename = Time() . "-" . $image->getClientOriginalName();
            $dirname = "photos/posts/";
            $image->storePubliclyAs($dirname, $imagename, 'public');
            return $imagename;
    }
}


