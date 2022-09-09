<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Helpers\LinkItem;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Feature;
use App\Models\Page;
use App\Models\SpecificationType;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class SellTradeController extends Controller
{
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $page = Page::where('id', 5)->withTranslation($locale)->firstOrFail();
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addItem(new LinkItem($page->getTranslatedAttribute('name'), route('sell-trade'), LinkItem::STATUS_INACTIVE));
        return view('sell-trade', compact('breadcrumbs', 'page'));
    }

    public function store(Request $request)
    {
        // $captchaKey = $request->input('captcha_key', '');
        $data = $request->validate([
            // 'captcha_key' => 'required',
            // 'captcha' => 'required|captcha_api:' . $captchaKey . ',flat',
            'licence_plate_number' => 'nullable|max:191',
            'car_registered_place' => 'nullable|max:191',
            'vin' => 'nullable|max:191',
            'zip_code' => 'nullable|max:191',
        ]);

        $telegram_chat_id = config('services.telegram.chat_id');

        // send telegram
        $telegramMessage = view('telegram.admin.sell-trade', compact('data'))->render();
        $telegramService = new TelegramService();
        $telegramService->sendMessage($telegram_chat_id, $telegramMessage, 'HTML');

        // // send email
        // Mail::to(setting('contact.email'))->send(new ContactMail($contact, $car));

        // return redirect()->route('home', ['#contact-form'])->withSuccess(__('home.contact_message_success'));

        $data = [
            'message' => __('main.form.contact_form_success'),
        ];

        return response()->json($data);
    }
}
