<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
    }

    public function SaveContact(Request $request)
    {
        Contact::insert([

            'name'        => $request->name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'subject'     => $request->subject?? "",
            'message'     => $request->message?? "",
            'created_at'  => Carbon::now('Asia/Kolkata'),

        ]);
        return redirect()->back()->with('message','Form submitted successfully');
    }

    public function AllContact()
    {
        $contacts = Contact::where('is_deleted','<>',1)->get();
        return view('backend.contact.all_contact', compact('contacts'));
    }

    public function ViewContact(Request $request)
    {
        $id             = $request->id;
        $contact_is     = Contact::findOrFail($id);
        $is_viewed      = $contact_is->is_viewed;

        if($is_viewed=='0'){
            Contact::where('id', $id)->update([
                'is_viewed'    => '1',
            ]);
        }
        $contact   = Contact::findOrFail($id);
        return view('backend.contact.view_contact', compact('contact'));
    }

    public function DeleteContact($id)
    {
        Contact::findOrFail($id)->update([
            'is_deleted'     => 1,
        ]);
        $contact   = Contact::findOrFail($id);
        return view('backend.contact.view_contact', compact('contact'));
    }

    public function UpdateContact(Request $request)
    {
        $id        = $request->id;
        $followup  = $request->followup;

        // if ($followup==1) {

            Contact::findOrFail($id)->update([
                'followup'      => $followup ?? 0,
                'show_followup' => $request->show_followup ?? 0,

            ]);
        // }
        return redirect()->route('contact.all')->with('error', 'contact Updated' );
    }

    public function AboutUs()
    {
        return view('frontend.about_us');
    }

    public function PrivacyPolicy()
    {
        return view('frontend.privacy_policy');
    }

    public function TermsandCondiotions()
    {
        return view('frontend.terms_and_conditions');
    }

    public function FssaiLicence()
    {
        return view('frontend.fssai_licence');
    }
}
