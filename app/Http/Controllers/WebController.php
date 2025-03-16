<?php

namespace App\Http\Controllers;

use App\Filament\Resources\CommunicationFormResource\Pages\ManageCommunicationForms;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\NewsletterFormRequest;
use App\Http\Requests\SampleFormPostRequest;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormSubmitted;
use App\Mail\HrFormSubmitted;
use App\Mail\ServiceFormSubmitted;
use App\Mail\YedekFormSubmitted;
use App\Models\Address;
use App\Models\Application;
use App\Models\Article;
use App\Models\Campaign;
use App\Models\Document;
use App\Models\LegalPage;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Supplier;
use Artesaos\SEOTools\SEOTools;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

use App\Mail\SampleFormMail;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\CommunicationForm;
use App\Models\CommunicationMessage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class WebController extends BaseController
{
    use SEOToolsTrait;
    use AuthorizesRequests, ValidatesRequests;

    public function home(): View
    {
        SEOTools::webPage(__('Taşın Otomotiv - Ana Sayfa'), __('Our company, which started its commercial activities in 1985, aimed to develop and expand in other sectors by adopting a successful working principle in the future. With its years of experience in the spare parts sector, it works with the aim of providing the best service to its customers in a way that dominates the needs of the market.'));

        $slides = Slide::published()->orderBy('position', 'asc')->get();
        $campaigns = Campaign::published()->orderBy('position', 'asc')->get();

        return view('home', compact('slides', 'campaigns'));
    }

    public function residential(): View
    {
        SEOTools::webPage(__('Taşın Otomotiv - Ana Sayfa'), __('Our company, which started its commercial activities in 1985, aimed to develop and expand in other sectors by adopting a successful working principle in the future. With its years of experience in the spare parts sector, it works with the aim of providing the best service to its customers in a way that dominates the needs of the market.'));

        $slides = Slide::published()->orderBy('position', 'asc')->get();
        

        return view('residential', compact('slides'));
    }

    public function aboutUs(): View
    {
        SEOTools::webPage(__(key: 'Taşın Otomotiv - Hakkımızda'), __(''));

        return view('about_us');
    }

    public function humanResources(): View
    {
        SEOTools::webPage(__(key: 'Taşın Otomotiv - İnsan Kaynakları'), __(''));

        return view('human_resources');
    }

    public function environmentPolicy(): View
    {
        SEOTools::webPage(__('Taşın Otomotiv - Çevre Politikası'));
        return view('environment_policy');
    }

    public function contact(): View
    {
        $addresses = Address::all();

        SEOTools::webPage(__('Taşın Otomotiv - İletişim'), __(key: ''));

        return view('contact', compact('addresses'));
    }

    public function worksIndex(): View
    {
        SEOTools::webPage(__('Taşın Otomotiv - Kampanya'), __('Kampanyalarımıza göz atın ve fırsatları kaçırmayın!'));

        $works = Campaign::where('is_published', true)
            ->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('publish_until', '>=', now())->orWhereNull('publish_until');
            })
            ->orderBy('publish_at', 'desc')
            ->get();

        return view('works/index', compact('works'));
    }

    public function worksDetail($slug): View
    {
        $campaign = Campaign::where('slug->' . app()->getLocale(), $slug)
            ->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('publish_until', '>=', now())->orWhereNull('publish_until');
            })
            ->firstOrFail();

        $campaigns = Campaign::where('is_published', true)
            ->where('id', '!=', $campaign->id)
            ->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('publish_until', '>=', now())->orWhereNull('publish_until');
            })
            ->limit(5)
            ->get();

        // Eğer caption null ise, boş bir string olarak set et
        $description = $campaign->caption ?? '';

        SEOTools::webPage($campaign->title, $description);

        return view('campaigns/details', compact('campaign', 'campaigns'));
    }

    public function legalPage($slug): View
    {
        $legalPages = LegalPage::all();
        $legalPageDetail = LegalPage::where('slug->' . app()->getLocale(), $slug)->firstOrFail();
        SEOTools::webPage($legalPageDetail->title, $legalPageDetail->description);
        return view('legal-page', compact('legalPageDetail', 'legalPages'));
    }

    public function saveServiceForm(Request $request)
    {
        $validated = $request->validate([
             'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $serviceForm = CommunicationForm::where('key', 'service_form')->first();

        $mail = new ServiceFormSubmitted($validated);

        Mail::to($serviceForm->send_to)->cc($serviceForm->cc_to)->bcc($serviceForm->bcc_to)->send($mail);

        // Create a new mail instance

        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $serviceForm->id]);

        return back()->with('success', __('Mesajınız başarıyla iletildi.'));
    }

    public function saveSparePartForm(Request $request)
    {
        $validated = $request->validate([
             'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $yedekForm = CommunicationForm::where('key', 'spare_part_form')->first();

        $mail = new YedekFormSubmitted($validated);

        try {
            Mail::to($yedekForm->send_to)->cc($yedekForm->cc_to)->bcc($yedekForm->bcc_to)->send($mail);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Mail gönderme hatası: ' . $e->getMessage()]);
        }

        // Create a new mail instance

        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $yedekForm->id]);

        return back()->with('success', __('Mesajınız başarıyla iletildi.'));
    }

    public function saveHrForm(Request $request)
    {
        $validated = $request->validate([
            // 'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
            
        ]);

        $hrForm = CommunicationForm::where('key', 'hr_form')->first();

        $mail = new HrFormSubmitted($validated);

        try {
            Mail::to($hrForm->send_to)->cc($hrForm->cc_to)->bcc($hrForm->bcc_to)->send($mail);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Mail gönderme hatası: ' . $e->getMessage()]);
        }

        // Create a new mail instance

        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $hrForm->id]);

        return back()->with('success', __('Mesajınız başarıyla iletildi.'));
    }


    public function saveContactForm(Request $request)
    {
        $validated = $request->validate([
             'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $contactForm = CommunicationForm::where('key', 'contact_form')->first();

        $mail = new ContactFormSubmitted($validated);

        try {
            Mail::to($contactForm->send_to)->cc($contactForm->cc_to)->bcc($contactForm->bcc_to)->send($mail);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Mail gönderme hatası: ' . $e->getMessage()]);
        }

        // Create a new mail instance

        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $contactForm->id]);

        return back()->with('success', __('Mesajınız başarıyla iletildi.'));
    }


    public function contactMail(ContactFormRequest $request): RedirectResponse
    {
        $validated = $request->validate([
             'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $form = CommunicationForm::where('key', 'contact_form')->first();

        // Create a new mail instance
        $mail = new ContactFormMail($form, $request);

        // Send the email
        Mail::to($form->send_to)->cc($form->cc_to)->bcc($form->bcc_to)->send($mail);
        // Create a record in the database with raw html content
        CommunicationMessage::create(['body' => $mail->render(), 'communication_form_id' => $form->id]);

        return back()->with('success', __('Mesajınız başarıyla iletildi.'));
    }
}
