<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;


class ImportController extends Controller
{
    public function importXML(Request $request)
    {
        $xmlContent = file_get_contents($request->file('file'));
        $xml = new SimpleXMLElement($xmlContent);

        foreach ($xml->contact as $contact) {
            Contact::create([
                'name' => (string) $contact->name,
                'phone' => (string) $contact->phone,
            ]);
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully');
    }
}
