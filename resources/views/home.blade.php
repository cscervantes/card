@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($user_current) > 0 )
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h5>~My Current Deck~</h5></div>

                <div class="panel-body">
                    
                    <div class="col-md-6">
                        <?php $strength = []; $defense = []; $skills = ''; ?>
                        @foreach($user_current->deck as $cur_deck)
                            <h1><span class="glyphicon glyphicon-book"></span> {{$cur_deck->deck_name}}</h1>
                            <?php $deck_cards = App\UserDeck::with('card')->where('user_id', Auth::user()->id)->where('deck_id', $cur_deck->id)->get();?>
                            @foreach($deck_cards as $dc)
                                @foreach($dc->card as $udc)
                                <h5 class="badge alert-primary">Card: {{$udc->card_name}}</h5>
                                <p>
                                <span class="badge alert-info"><i class="glyphicon glyphicon-fire"></i> Skill:
                                @if($udc->skill == null)
                                {{ 'No skill' }}
                                @endif 
                                {{$udc->skill}}
                                </span>
                                </p>
                                <?php $strength[] = $udc->strength; $defense[] = $udc->defense; $skills[] = $udc->skill; ?>
                                <p>
                                <span class="badge alert-danger"><i class="glyphicon glyphicon-heart"></i> Strength:
                                Strength: {{$udc->strength}}
                                </span>
                                </p>
                                <p>
                                <span class="badge alert-warning"><i class="glyphicon glyphicon-heart-empty"></i> Defense:
                                Defense: {{$udc->defense}}
                                </span>
                                </p>
                                @endforeach
                                <br>
                            @endforeach

                        @endforeach


                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-danger text-center">
                        <small>Total Strength</small>
                        <h2><i class="glyphicon glyphicon-heart"></i> <?= array_sum($strength); ?></h2>
                        </div>
                        <div class="panel panel-warning text-center">
                        <small>Total Defense</small>
                        <h2><i class="glyphicon glyphicon-heart-empty"></i> <?= array_sum($defense); ?></h2>
                        </div>
                        <div class="panel panel-info text-center">
                        <small>Skills</small>
                        @foreach($skills as $skill)
                            @if($skill == null)
                                @continue
                            @else
                            <h4><i class="glyphicon glyphicon-fire"></i> {{$skill}},</h4>
                            @endif
                        @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <form>
                            <div class="panel-heading">

                                <label for="current_deck"><span class="label label-info">Change Deck</span></label>
                                <select id="selectDeck" name="deck" class="form-control">
                                    @foreach($user_decks as $user_deck)
                                    @foreach($user_deck as $ud)
                                        <option value="{{$ud->id}}">{{$ud->deck_name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="panel-body">
                                <input type="submit" name="btnSubmit" value="Change" class="btn btn-info">
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @else
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You dont have any decks and cards. <a href="{{ route('purchase') }}">Create now</a>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection
