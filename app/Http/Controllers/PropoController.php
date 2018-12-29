<?php

namespace Propo\Http\Controllers;

use Illuminate\Http\Request;
use Propo\Client;
use Propo\Product;
use Propo\Proposal;
use NahidulHasan\Html2pdf\Facades\Pdf;




class PropoController extends Controller
{

    public function index(){
        $propos= Proposal::orderBy('created_at','desc')->get();

        return view('propos.app', ['propos' => $propos]);
    }

    public function new(){
        $products= Product::all();
        $clients= Client::orderBy('created_at','desc')->get();

        return view('propos.new',['products' => $products, 'clients'=> $clients]);
    }

    public function store(Request $request){

        $propo= new Proposal();
        $propo->offer_validity= $request->get('offer_validity');
        $propo->way_to_pay= $request->get('way_to_pay');
        $propo->place_delivery= $request->get('place_delivery');
        $propo->currency= $request->get('currency');
        $propo->total= $request->get('total');
        $propo->user_id= $request->get('user_id');
        $propo->client_id= $request->get('client_id');
        $propo->contact_id= $request->get('contact_id');
        $propo->address_id= $request->get('address_id');

        $propo->save();


        $propo->products()->detach();
        $propo->products()->attach($request->get('products'));

        return 'ok';

    }


    public function view(Proposal $propo) {



      /*  $document =  Pdf::generatePdf(view('propos.pdf', ['propo' => $propo]));

        dd($document);*/


       return view('propos.pdf',['propo' => $propo]);
    }


}
