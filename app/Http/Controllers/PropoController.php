<?php

namespace Propo\Http\Controllers;

use Illuminate\Http\Request;
use Propo\Client;
use Propo\Product;
use Propo\Proposal;


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
        $propo->url= $request->get('client_id').date("H").date("i").date("s").date("j").date("n").date("Y");
        $propo->user_id= $request->get('user_id');
        $propo->client_id= $request->get('client_id');
        $propo->contact_id= $request->get('contact_id');
        $propo->address_id= $request->get('address_id');

        $propo->save();


        $propo->products()->detach();
        $propo->products()->attach($request->get('products'));

        //Mail::to($propo->contact->email)->send(new App\Mail\Proposal($propo));

        return 'ok';

    }


    public function view(Proposal $propo) {



      /*  $document =  Pdf::generatePdf(view('propos.pdf', ['propo' => $propo]));

        dd($document);*/


       return view('propos.pdf',['propo' => $propo]);
    }

    public function showPropo($url){

      $propo= Proposal::where('url', '=', $url)->first();
      if(isset($propo)){
           return view('propos.pdf',['propo' => $propo]);
      }
      else {
        return abort(404);
      }

    }


    public function filter(Request $request) {

        $filter= $request->get('filter');

        if(strlen($filter)===0){
            $propos= Proposal::orderBy('created_at','desc')->limit(15)->get();

        }
        else{
            $propos= Proposal::where("id" , '=', $request->get('filter'))->get();

        }

        return view('propos.app', ['propos' => $propos]);


    }



}
