@extends('layouts.admin-layout')


@section('content')
<div class="container">
	<h1 class="text-center">Create New Card</h1>
	<div class="col-md-12">
		<form>
			<div class="form-group">
				<label for="card_name">Card Name</label>
				<input type="text" name="card_name" id="card_name" class="form-control" required="required" autofocus="autofocus">
			</div>
			<div class="form-group">
				<label for="card_skill">Card Skill</label>
				<input type="text" name="card_skill" id="card_skill" class="form-control">
			</div>
			<div class="form-group">
				<label for="card_strength">Card Strength</label>
				<input type="text" name="card_strength" id="card_strength" class="form-control" pattern="\d*"  maxlength="9">
			</div>
			<div class="form-group">
				<label for="card_defense">Card Defense</label>
				<input type="text" name="card_defense" id="card_defense" class="form-control" pattern="\d*"  maxlength="9">
			</div>
			<div class="form-group">
				<input type="button" name="btnAddCard" value="Submit" id="btnAddCard" class="btn btn-flat">
			</div>
		</form>
	</div>
</div>
<hr>
<div class="container">
	@if($cards->count() > 0 )
		@foreach($cards as $card)
		<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>{{ $card->card_name }}</strong>
			<a class="badge" data-toggle="modal" data-target="#myCard{{ $card->id}}">Edit</a>
			<!-- Modal -->
			<div id="myCard{{$card->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			  	<form>
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit <em>{{ $card->card_name }}</em></h4>
			      </div>
			      <div class="modal-body">
			        	
			        	<div class="form-group" style="display: none;">
							<label for="ucard_name">Card Name</label>
							<input type="text" name="card_name" id="ucard_id" value="{{ $card->id }}" class="form-control" required="required" autofocus="autofocus">
						</div>
						<div class="form-group">
							<label for="ucard_name">Card Name</label>
							<input type="text" name="card_name" id="ucard_name" value="{{ $card->card_name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="ucard_skill">Card Skill</label>
							<input type="text" name="card_skill" id="ucard_skill" value="{{ $card->skill }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="ucard_strength">Card Strength</label>
							<input type="text" name="card_strength" id="ucard_strength" value="{{ $card->defense }}" class="form-control" pattern="\d*" maxlength="9">
						</div>
						<div class="form-group">
							<label for="ucard_defense">Card Defense</label>
							<input type="text" name="card_defense" id="ucard_defense" value="{{ $card->strength }}" class="form-control" pattern="\d*" maxlength="9">
						</div>
					
			      </div>
			      <div class="modal-footer">
			        <input type="button" name="btnAddCard" value="Update" id="btnUpdateCard" class="btn btn-flat">
			      </div>
			    </div>
			    </form>

			  </div>
			</div>
			<!-- End of Modal -->
			<input type="hidden" name="text" value="{{$card->id}}" id="onDelete{{$card->id}}">
			<a class="badge" id="deleteCard{{$card->id}}">Delete</a>
			</div>
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
		</div>
		@endforeach
	@else
	<h1 class="alert alert-success">No entry</h1>	
	@endif
</div>
@endsection