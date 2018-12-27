<?php

namespace Propo\Http\Controllers;


use Illuminate\Http\Request;
use Propo\Client;
use Propo\Contact;
use Propo\Department;

class ClientController extends Controller
{
    public function index() {
        $clients= Client::orderBy('created_at','desc')->paginate(15);
        return view('clients.app', ['clients' => $clients]);
    }

    public function new() {

        $departments =  Department::all();

        return view('clients.new' , ['departments' => $departments]);

    }

    public function store(Request $request) {

        $client = new Client();
        $client->description = $request->get('description');
        $client->document = $request->get('document');
        $client->type_document = $request->get('type_document');
        $client->state = 1;
        $client->user_id = 1;
        $client->save();


        foreach ($request->get('contacts') as $contact ) {

            $client->contacts()->create($contact);

         }

        foreach ($request->get('addresses') as $address){

            $client->addresses()->create($address);

        }

        return 'ok';


    }

    public function getContacts(Client $client) {

        return $client->contacts()->get();

    }

    public function getAddresses(Client $client) {

        return $client->addresses()->get();

    }

    public function edit(Client $client) {

    }

    public function update(Client $client, Request $request) {

    }


}
