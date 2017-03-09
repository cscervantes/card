@extends('layouts.admin-layout')


@section('content')
<div class="container">
	<h3>Admin dashboard</h3>
	<div class="col-md-6">
		@if($decks->count() > 0)
			<small class="pull-right">Total of {{ $decks->count() }} decks</small>
			<br>
			@foreach($decks as $deck)
			<div class="panel panel-default">
				<div class="panel-heading">{{ $deck->deck_name }}</div>
				<div class="panel-body">
					<small>
					<span class="pull-left">Created: {{ Carbon\Carbon::createFromTimeStamp(strtotime($deck->created_at))->diffForHumans() }}</span> <span class="pull-right">Updated: {{ Carbon\Carbon::createFromTimeStamp(strtotime($deck->updated_at))->diffForHumans() }}</span>
					</small>
				</div>
			</div>
			@endforeach
		@else
		<h3>No Deck Entry</h3>
		@endif
	</div>
	<div class="col-md-6">
		@if($cards->count() > 0)
			<small class="pull-right">Total of {{ $cards->count() }} cards</small>
			<br>
			@foreach($cards as $card)
			<div class="panel panel-default">
				<div class="panel-heading">{{ $card->card_name }}</div>
				<div class="panel-body">
					@if($card->skill == '' || $card->skill == null )
					<p>Skill: N/A</p>
					@else
					<p>Skill: {{ $card->skill }}</p>
					@endif
					<p>Strength: {{ $card->strength }}</p>
					<p>Defense: {{ $card->defense }}</p>
					<hr>
					<small>
					<span class="pull-left">Created: {{ Carbon\Carbon::createFromTimeStamp(strtotime($card->created_at))->diffForHumans() }}</span> <span class="pull-right">Updated: {{ Carbon\Carbon::createFromTimeStamp(strtotime($card->updated_at))->diffForHumans() }}</span>
					</small>
				</div>
			</div>
			@endforeach
		@else
		<h3>No Card Entry</h3>
		@endif
	</div>
</div>
@endsection