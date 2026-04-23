<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function index()
    {
        $messages = Contact::latest()->get();
        return view('messages', compact('messages'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create($data);
        return back()->with('success', 'Message envoyé avec succès !');
    }

  
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update($data);
        return back()->with('success', 'Le message a été corrigé !');
    }


    public function markAsRead(Contact $contact)
    {
        $contact->update(['status' => 'Lu']);
        return back()->with('success', 'Statut mis à jour.');
    }

   
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message supprimé.');
    }
}