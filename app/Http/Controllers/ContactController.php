<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view("mail.contact_form");
    }


    public function mailDashboard(Request $request)
    {
        // dd($request);
        $mails = Contact::all();
        return view("mail.mail", compact("mails"));
    }

    public function filter(Request $request)
    {

        $filtredPriority = $request->priority;
        $sortedDate = $request->dateSort;

        $query = Contact::query();


        if ($filtredPriority != "all") {
            $query->where("priority", $filtredPriority);
        }


        if ($sortedDate == "latestFirst") {
            $query->orderBy("created_at", "desc");
        } else {
            $query->orderBy("created_at", "asc");
        }

        $mails = $query->get();


        return view("mail.mail", compact("mails"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|starts_with:+212",
            "message" => "required",
            "priority" => "required|in:high,medium,low",
        ]);
        // dd($request);
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
            "priority" => $request->priority,
        ]);

        return redirect()->route("contact.mail");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //

        // dd($request);
        $contact->update([
            "read" => $request->read  ? true : false
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return back();
    }
}
