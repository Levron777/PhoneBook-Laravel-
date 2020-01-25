<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

// The main controller for outputting from the database table all contacts with pagination 
// (for unauthorized users with minimal functionality)

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('firstName')->paginate(5);

        return view('contacts.main', [
            'title' => 'PhoneBook',
            'contacts' => $contacts
        ]);
    }
}
