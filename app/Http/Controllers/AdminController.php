<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Card;
use App\Deck;
use App\UserDeckCard;
use Auth;

class AdminController extends Controller
{
    //
    public function index(){
    	$cards = Card::all();
    	$decks = Deck::all();
    	return view('admin.dashboard')->with(['decks' => $decks, 'cards' => $cards]);
    }

    public function deck(){
   
    	$decks = Deck::all();
    	return view('admin.deck')->with(['decks' => $decks]);
    }

    public function add_deck(Request $request){
    	$check_deck = Deck::where('deck_name', $request->deck_name)->get();
    	if($check_deck->count() > 0){
    		echo 'Deck exists!';
    	}else{
    		$deck = new Deck();
    		$deck->deck_name = $request->deck_name;
    		$deck->save();

    		if($deck){
    			echo "Deck created!";
    		}else{
    			echo "Creation failed. Try again!";
    		}
    	}
    }

    public function update_deck(Request $request, $id){
    	$check_deck = Deck::where('deck_name', $request->deck_name)->where('id','<>',$id)->get();
    	if($check_deck->count() > 0){
 			echo "Deck Exists!";
    	}
    	else{
    		$deck = Deck::findOrFail($id);
	    	$deck->deck_name = $request->deck_name;
			$deck->save();
			if($deck){
	    			echo "Deck updated!";
	    		}else{
	    			echo "Update failed. Try again!";
	    		}
    	}
    }

    public function delete_deck($id){
    	$deck = DB::table('decks')->where('id',$id)->delete();
        if($deck){
                echo "Deck has been deleted!";
            }else{
                echo "Try Again!";
            }
    }

    public function card(){
    	$cards = Card::all();
    	return view('admin.card')->with(['cards' => $cards]);
    }

    public function add_card(Request $request){
    	$check_card = Card::where('card_name', $request->card_name)->get();
    	if($check_card->count() > 0){
    		echo 'Card exists!';
    	}else{
    		$card = new Card();
    		$card->card_name = $request->card_name;
    		$card->skill = $request->card_skill;
    		$card->strength = $request->card_strength;
    		$card->defense = $request->card_defense;
    		$card->save();

    		if($card){
    			echo "Card created!";
    		}else{
    			echo "Creation failed. Try again!";
    		}
    	}
    }

    public function update_card(Request $request, $id){
    	$check_card = Card::where('card_name', $request->card_name)->where('id','<>',$id)->get();
    	if($check_card->count() > 0){
 			echo "card Exists!";
    	}
    	else{
    		$card = Card::findOrFail($id);
	    	$card->card_name = $request->card_name;
	    	$card->skill = $request->card_skill;
	    	$card->strength = $request->card_strength;
			$card->defense = $request->card_defense;
			$card->save();
			if($card){
	    			echo "Card updated!";
	    		}else{
	    			echo "Update failed. Try again!";
	    		}
    	}
    }

    public function delete_card($id){
    	$card = DB::table('cards')->where('id',$id)->delete();
        if($card){
                echo "Card has been deleted!";
            }else{
                echo "Try Again!";
            }
    }

    

}
