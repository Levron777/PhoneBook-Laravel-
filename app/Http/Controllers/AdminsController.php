<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Contact;
use DB;

// The main controller for displaying from the database a table of all contacts with pagination 
// (for authorized users with the ability to edit, add and delete contacts)

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // The output of all contacts from the database to the table with grouping and pagination

    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('firstName')->paginate(3);

        return view('admin.admins', [
            'title' => 'PhoneBook',
            'contacts' => $contacts,
        ]);
    }

    // Saving data entered in the input field by the administrator in the database 
    // (with validation)

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstNameInput' => 'required|max:255',
            'secondNameInput' => 'required|max:255',
            'positionInput' => 'required|max:255',
            'phoneNumberInput' => 'required|max:255',
            'noteInput' => 'required|max:255',
        ]);

        $contact = new Contact;

        $contact->firstName = $request->input('firstNameInput');
        $contact->secondName = $request->input('secondNameInput');
        $contact->position = $request->input('positionInput');
        $contact->phoneNumber = $request->input('phoneNumberInput');
        $contact->note = $request->input('noteInput');
        $contact->save();

        return redirect('admins');
    }

    // Method for redirecting to the edit page of the selected field from the contact table

    public function edit($id)
    {
        $contact = App\Contact::find($id);

        return view('admin.edit', [
            'contact' => $contact,
        ]);
    }

    // Method for saving edited data entered by the administrator (with validation)

    public function update(Request $request, $id)
    {
        $contact = App\Contact::find($id);

        $this->validate($request, [
            'firstNameInput' => 'required|max:255',
            'secondNameInput' => 'required|max:255',
            'positionInput' => 'required|max:255',
            'phoneNumberInput' => 'required|max:255',
            'noteInput' => 'required|max:255',
        ]);

        $contact->firstName = $request->input('firstNameInput');
        $contact->secondName = $request->input('secondNameInput');
        $contact->position = $request->input('positionInput');
        $contact->phoneNumber = $request->input('phoneNumberInput');
        $contact->note = $request->input('noteInput');
        $contact->save();

        return redirect('admins');
    }

    // Method to delete the selected row from the contact table

    public function delete(Request $request, $id)
    {
        $contact = App\Contact::where('id', $id)->delete();

        return redirect('admins');
    }
}
