@extends('layouts.app')

@section('content')
<div class="container">
    <?php
    // $test = ['a','b','c','d','e'];
    // foreach($test as $t){
    //     if($t === 'b'){
    //         continue;
    //     }else if($t === 'd'){
    //         continue;
    //     }else{
    //         echo $t;
    //     }
    // }
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Create and Customize your Deck</div>

                <div class="panel-body">
                    
                    @if($user_decks->count() > 0)
                        <div class="col-md-12">
                            @foreach($uds as $ud)
                                @foreach($ud as $u)
                                <div class="col-md-3">
                                    <div class="panel">
                                        <h3>{{$u->deck_name}}</h3>
                                        <input type="hidden" id="user_id{{Auth::user()->id}}" value="{{Auth::user()->id}}">
                                        <input type="hidden" id="deck_id{{$u->id}}" value="{{$u->id}}">
                                        <a class="badge" id="showDeckID{{$u->id}}" data-toggle="modal" data-target="#myModal{{$u->id}}">View</a>
                                
                                        <!-- Modal -->
                                        <div id="myModal{{$u->id}}" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{$u->deck_name}}</h4>
                                              </div>
                                              <div class="modal-body" id="deckInfo{{$u->id}}">
                                                    <!--Output from ajax here-->
                                              </div>
                                              <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div> -->
                                            </div>

                                          </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <h4 class="pull-right">Add more...</h4>
                            <br>
                            <br>
                            <form>
                                <div class="form-group">
                                    <label for="deck">Select Deck:</label>
                                    <select id="deck" name="deck" class="form-control ">
                                    <option value="0" selected="selected">--Select Deck--</option>
                                        @foreach($decks as $deck)
                                        <option value="{{$deck->id}}">{{$deck->deck_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="first_card">Select First Card:</label>
                                    <select id="first_card" name="first_card" class="form-control ">
                                    <option value="0" selected="selected">--Select card--</option>
                                        @foreach($cards as $card)
                                        <option value="{{$card->id}}">{{$card->card_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="second_card">Select Second Card:</label>
                                    <select id="second_card" name="second_card" class="form-control ">
                                    <option value="0" selected="selected">--Select card--</option>
                                        @foreach($cards as $card)
                                        <option value="{{$card->id}}">{{$card->card_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="third_card">Select Third Card:</label>
                                    <select id="third_card" name="third_card" class="form-control ">
                                    <option value="0" selected="selected">--Select card--</option>
                                        @foreach($cards as $card)
                                        <option value="{{$card->id}}">{{$card->card_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="button" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-default pull-right">
                                </div>
                            </form>
                        </div>
                    @else
                        <h4 class="pull-right">Customize and Create your Deck</h4>
                        <br>
                        <br>
                        <form>
                            <div class="form-group">
                                <label for="deck">Select Deck:</label>
                                <select id="deck" name="deck" class="form-control ">
                                <option value="0" selected="selected">--Select Deck--</option>
                                    @foreach($decks as $deck)
                                    <option value="{{$deck->id}}">{{$deck->deck_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="first_card">Select First Card:</label>
                                <select id="first_card" name="first_card" class="form-control ">
                                <option value="0" selected="selected">--Select card--</option>
                                    @foreach($cards as $card)
                                    <option value="{{$card->id}}">{{$card->card_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="second_card">Select Second Card:</label>
                                <select id="second_card" name="second_card" class="form-control ">
                                <option value="0" selected="selected">--Select card--</option>
                                    @foreach($cards as $card)
                                    <option value="{{$card->id}}">{{$card->card_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="third_card">Select Third Card:</label>
                                <select id="third_card" name="third_card" class="form-control ">
                                <option value="0" selected="selected">--Select card--</option>
                                    @foreach($cards as $card)
                                    <option value="{{$card->id}}">{{$card->card_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="button" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
