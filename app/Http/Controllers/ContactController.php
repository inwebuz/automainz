<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Helpers\LinkItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Contact;
use App\Models\Page;
use App\Helpers\Helper;
use App\Mail\ContactMail;
use App\Models\Car;
use App\Services\TelegramService;

class ContactController extends Controller
{
    /**
     * Show contacts page
     */
    public function index()
    {
        $locale = app()->getLocale();
        $page = Page::where('id', 2)->withTranslation($locale)->firstOrFail(); // contacts page
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addItem(new LinkItem(__('main.nav.contacts'), route('contacts'), LinkItem::STATUS_INACTIVE));
        $address = Helper::staticText('contact_address', 300)->description ?? '';
        return view('contacts', compact('breadcrumbs', 'page', 'address'));
    }

    /**
     * Send contact email
     *
     * @return json
     */
    public function send(Request $request)
    {
        // $captchaKey = $request->input('captcha_key', '');
        $data = $request->validate([
            // 'captcha_key' => 'required',
            // 'captcha' => 'required|captcha_api:' . $captchaKey . ',flat',
            'name' => 'required',
            // 'email' => 'required',
            'phone' => 'required',
            'message' => '',
            'type' => '',
        ]);

        $telegram_chat_id = config('services.telegram.chat_id');
        if (empty($data['type']) || !array_key_exists($data['type'], Contact::types())) {
            $data['type'] = Contact::TYPE_CONTACT;
        }

        // save to database
        $contact = Contact::create($data);
        $contact->type = $data['type'];
        $contact->info = '';

        $car = null;

        if (isset($request->car_id)) {
            $car = Car::find((int)$request->car_id);
            if ($car) {
                $contact->info = '<a href="' . $car->url . '" target="_blank" >' . $car->full_name . '</a>';
            }
        }
        $contact->save();

        // send telegram
        $telegramMessage = view('telegram.admin.contact', compact('contact', 'car'))->render();
        $telegramService = new TelegramService();
        $telegramService->sendMessage($telegram_chat_id, $telegramMessage, 'HTML');

        // send email
        Mail::to(setting('contact.email'))->send(new ContactMail($contact, $car));

        // return redirect()->route('home', ['#contact-form'])->withSuccess(__('home.contact_message_success'));

        $data = [
            'message' => __('main.form.contact_form_success'),
        ];

        return response()->json($data);
    }
}
