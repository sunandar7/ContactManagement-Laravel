<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::paginate(5);
        return view('contact.index', ['contacts' => $contacts]);
    }

    public function create() {
        return view('contact.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone_number' => 'required'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);

        if($contact) {
            return redirect()->route('contact.index')->with('success', 'Contact Created Successfully');
        } else {
            return redirect()->route('contact.index')->with('error', 'Unable to create contact');
        }
    }

    public function show($id) {
        $contact = Contact::findOrFail($id);

        return view('contact.show', ['contact' => $contact]);
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);

        return view('contact.edit', ['contact' => $contact]);
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);

        if($contact){
            $this->validate($request, [
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('contacts','email')->ignore($id)
                ],
                'phone_number' => 'required'
            ]);

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->save();
            
            return redirect()->route('contact.index')->with('success', 'Contact Updated Successfully');
        } else {
            return redirect()->route('contact.index')->with('error', 'Unable to update contact');
        }
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);

        if($contact) {
            $contact->is_delete = true;
            $contact->save();
            $contact->delete();

            return redirect()->route('contact.index')->with('success', 'Contact Deleted Successfully');
        } else {
            return redirect()->route('contact.index')->with('error', 'Unable to delete contact');
        }
    }
}
