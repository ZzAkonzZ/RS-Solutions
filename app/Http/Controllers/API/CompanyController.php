<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Registration;

class CompanyController extends Controller
{
    public function store(CompanyRequest $request)
    {
        $certificate = $request->certificate;
        $certificate_path = $certificate->storeAs('public', $certificate->getClientOriginalName());
        
        if($request->validated())
        {
            Company::create([
                'company_name' => $request->company_name,
                'address' => $request->address,
                'post_index' => $request->post_index,
                'company_phone' => $request->company_phone,
                'email' => $request->email,
                'bin' => $request->bin,
                'iik' => $request->iik,
                'bank_name' => $request->bank_name,
                'bik' => $request->bik,
                'ceo_name' => $request->ceo_name,
                'responsible_person' => $request->responsible_person,
                'responsible_person_phone' => $request->responsible_person_phone,
                'responsible_person_email' => $request->responsible_person_email,
                'domen' => $request->domen,
                'certificate' => $certificate_path
            ]);

            Mail::to('alisherhairolla@gmail.com')->send(new Registration($request->all(), $certificate_path));
        }

        return response('Company stored', 200);
    }

    /*
    ** Only for demonstrating
    */
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
