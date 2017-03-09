<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Card;
use App\Deck;
use App\User;
use App\UserDeck;
use Auth;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->deck)
        {
            $user_current = UserDeck::with('deck')->where('user_id', Auth::user()->id)->where('deck_id', $request->deck)->orderBy('created_at', 'DESC')->first();

            $user_deck = UserDeck::with('deck')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

            $array = [];

            foreach($user_deck as $d){

                $array[] = $d->deck;

            }

            $ud = array_unique($array);

            return view('home')->with(['user_decks' => $ud, 'user_current' =>$user_current]);

        }else{

            $user_current = UserDeck::with('deck')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();

            $user_deck = UserDeck::with('deck')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

            $array = [];

            foreach($user_deck as $d){

                $array[] = $d->deck;

            }

            $ud = array_unique($array);

            return view('home')->with(['user_decks' => $ud, 'user_current' =>$user_current]);
            //return $user_deck;

        }
        

    }

    public function create_deck_card(Request $request){

        $message = [];

        $deck_id = $request->deck_id;

        $card_id = array($request->first_card, $request->second_card, $request->third_card);

            foreach($card_id as $cid){

                if($cid === '0' ){

                    continue;

                }else{

                    $check_record2 = UserDeck::where('user_id', Auth::user()->id)->where('deck_id', $deck_id)->where('card_id',$cid)->count();

                    if($check_record2 > 0){

                        $message[] = 'You already owned that deck and card. Try again!';

                    }else{

                        $check_record = UserDeck::where('user_id', Auth::user()->id)->where('deck_id', $deck_id)->count();

                        if($check_record >= 3){

                            $message[] = 'Deck only contains of 3 cards!';

                        }else{

                            $user_deck = new UserDeck();

                            $user_deck->user_id = Auth::user()->id;

                            $user_deck->deck_id = $deck_id;

                            $user_deck->card_id = $cid;

                            $user_deck->save();

                            if($user_deck){

                                $message[] = 'Saved!';

                            }else{

                                $message[] = 'Failed!';

                            }

                        }

                    }

                }

            }

        $rm =  array_unique($message);

        foreach($rm as $m){

            echo $m;
        }

    }

    public function show_deck_card($user_id, $deck_id){

        $user_deck_cards = UserDeck::with('card')->where('user_id', $user_id)->where('deck_id', $deck_id)->get();

        // return Response::json(array($user_deck_cards), 200, [],  JSON_PRETTY_PRINT);
        //return $user_deck_cards;
        // return $user_deck_cards;

        // foreach($user_deck_cards as $val)
        // {
        //     // echo $val->card;
        //     foreach($val->card as $udc){
        //         echo $udc->card_name;
        //     }
        // }
        return $user_deck_cards;

    }

    public function purchase(){

        $user_decks = UserDeck::with('deck')->where('user_id', Auth::user()->id)->get();

        $array = [];

        foreach($user_decks as $d){

            $array[] = $d->deck;

        }

        $ud = array_unique($array);

        $decks = Deck::all();

        $cards =  Card::all();

        return view('purchase.index')->with(['cards' => $cards,'decks' => $decks, 'user_decks' => $user_decks, 'uds' => $ud]);

    }

    // public function purchase_deck($user_id, $deck_id){

    //     $user_decks = UserDeckCard::with('deck')->where('user_id', $user_id)->where('deck_id', $deck_id)->get();

    //     $cards = Card::all();

    //     return view('purchase.card')->with(['cards' => $cards, 'user_id' => $user_id, 'deck_id'=> $deck_id, 'user_decks' => $user_decks]);
    // }

    // public function purchased_deck(Request $request, $user_id, $deck_id)
    // {
    //     $message = [];

    //     $check_record = UserDeckCard::where('user_id', $user_id)->where('deck_id', $deck_id)->count();

    //     if($check_record >= 3){

    //         $message[] = 'Deck can only contain maximum of 3 cards!';

    //     }else{

    //         foreach($request->hid as $card_id)

    //         {
    //             $check_record = UserDeckCard::where('user_id', $user_id)->where('deck_id', $deck_id)->where('card_id' ,$card_id)->get();

    //             if($check_record->count() > 0)

    //             {
    //                 $message[] = "Data exists";

    //             }else{

    //                 $user_deck_card = new UserDeckCard();

    //                 $user_deck_card->user_id = $user_id;

    //                 $user_deck_card->deck_id = $deck_id;

    //                 $user_deck_card->card_id = $card_id;

    //                 $user_deck_card->save();

    //                 if($user_deck_card){

    //                     $message[] = "Purchased Successful";
    //                 }
    //                 else{

    //                     $message[] = "Purchased Failed. Try Again";
    //                 }
    //             }
    //         }
    //     }

    //     $rm =  array_unique($message);

    //     foreach($rm as $m){

    //         echo $m;
    //     }
    // }
}
