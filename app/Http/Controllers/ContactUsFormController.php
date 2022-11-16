<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;

class ContactUsFormController extends Controller
{
    public function createForm()
    {
        return view('landing.home-page.home');
    }

    public function ContactUsForm(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ],
        [],
        $this->getAttributes()
        )->validate();

        try {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            Alert::success(
                'Pesan Terkirim',
                'Semua pesan yang masuk akan ditanggapi sesuai antrean dan kebutuhan, terima kasih.',
                // trans('inbox.alert.create.message.success'),
            );

            // Send mail to admin
            Mail::send('landing.home-page.contactMail', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_query' => $request->get('message'),
            ), function($message) use ($request){
                $message->from($request->email);
                $message->to('guidofamula@gmail.com', 'Guido Famula')->subject($request->get('email'));
            });
            return redirect()->route('landing.home-contact');

        } catch (\Throwable $th) {
            Alert::error(
                'Kirim Pesan Gagal',
                // 'Terjadi kesalahan saat menyimpan pesan', (['error' => $th->getMessage()]),
                //trans('inbox.alert.create.title'),
                trans('inbox.alert.create.message.error', ['error' => $th->getMessage()]),
            );
            return redirect()->route('landing.home-contact')->withInput($request->all());
        }
    }

    private function getAttributes()
    {
        return [
            'title' => trans('tags.form_control.input.title.attribute'),
            'slug' => trans('tags.form_control.input.slug.attribute'),
        ];
    }
}
