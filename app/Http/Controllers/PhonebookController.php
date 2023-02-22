<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class PhonebookController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $contacts = Contact::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();

        } else{
            $contacts = Contact::all();
        }
        

        return view('welcome', 
        [
            'contacts' => $contacts,
            'search' => $search
        ]);

    }

    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isvalid()){

            $request_image = $request->image;

            $extension = $request_image->extension();

            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request_image->move(public_path('imgs/contacts'), $image_name);

            $contact->image = $image_name;

        }

        $contact->save();

        return redirect('/')->with('menssage', "Contato adicionado com sucesso!");

    }

    public function show($id){

        $contact = Contact::findOrFail($id)->toJson();
        echo $contact;
        // return view('contact.show', ['contact' => $contact]);
    }

    public function destroy($id){

        Contact::findOrFail($id)->delete();

        return redirect('/');
    }

    public function edit($id){

        $contact = Contact::findOrFail($id);

        return view('contact.edit', ['contact'=>$contact]);
    }

    public function update(Request $request){

        
        Contact::findOrFail($request->id)->update($request->all());

        if($request->hasFile('image') && $request->file('image')->isvalid()){


            $request_image = $request->image;

            $extension = $request_image->extension();

            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request_image->move(public_path('imgs/contacts'), $image_name);

            $image = $image_name;


            Contact::findOrFail($request->id)->update([
                'image' => $image
            ]);
        }

        return redirect('/');
    }

}