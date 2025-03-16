<?php

namespace App\Http\Controllers;

use App\Filament\Resources\CommunicationFormResource\Pages\ManageCommunicationForms;
use App\Http\Requests\SampleFormPostRequest;
use App\Mail\SampleFormMail;
use App\Models\CommunicationForm;
use App\Models\CommunicationMessage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class SampleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sampleForm(): View
    {
        return view('samples.sample-form')->with(['formKey' => 'sample_form']);
    }

    public function sampleFormPost(SampleFormPostRequest $request): RedirectResponse
    {
        $form = CommunicationForm::where('key', 'sample_form')->first();

        // Create a new mail instance
        $mail = new SampleFormMail($form, $request);
        // Send the email
        Mail::to($form->send_to)->cc($form->cc_to)->bcc($form->bcc_to)->send($mail);
        // Create a record in the database with raw html content
        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $form->id]);

        return back()->with('success', 'Form Submitted Successfully');
    }
}
