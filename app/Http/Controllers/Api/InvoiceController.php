<?php

namespace App\Http\Controllers\Api;

use Greenter\See;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Greenter\Ws\Services\SunatEndpoints;

class InvoiceController extends Controller
{
    public function send(Request $request) {

        $company = Company::where('user_id', auth()->id())->firstOrFail();

        $certificate = Storage::get($company->cert_path);

        return $certificate;

        $see = new See();
        $see->setCertificate(file_get_contents(__DIR__.'/certificate.pem'));
        $see->setService(SunatEndpoints::FE_BETA);
        $see->setClaveSOL('20000000001', 'MODDATOS', 'moddatos');

        //return $see;
    }
}
