@extends('layouts.admin-layout')


@section('content')
<div class="container">
	<h1 class="text-center">Create New Deck</h1>
	<div class="col-md-12">
		<form>
			<div class="form-group">
				<label for="deck_name">Deck Name</label>
				<input type="text" name="deck_name" id="deck_name" class="form-control" required="required" autofocus="autofocus">
			</div>
			<div class="form-group">
				<input type="button" name="btnAddDeck" value="Submit" id="btnAddDeck" class="btn btn-flat">
			</div>
		</form>
	</div>
</div>
<hr>
<div class="container">
	@if($decks->count() > 0 )
		@foreach($decks as $deck)
		<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>{{ $deck->deck_name }}</strong>
			<a class="badge" data-toggle="modal" data-target="#myDeck{{ $deck->id}}">Edit</a>
			<!-- Modal -->
			<div id="myDeck{{$deck->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			  	<form>
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit <em>{{ $deck->deck_name }}</em></h4>
			      </div>
			      <div class="modal-body">
			        	
			        	<div class="form-group" style="display: none;">
							<label for="udeck_name">Deck ID</label>
							<input type="text" name="udeck_id" id="udeck_id" value="{{ $deck->id }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="udeck_name">Deck Name</label>
							<input type="text" name="udeck_name" id="udeck_name" value="{{ $deck->deck_name }}" class="form-control" required="required" autofocus="autofocus">
						</div>
					
			      </div>
			      <div class="modal-footer">
			        <input type="button" name="btnUpdateDeck" value="Update" id="btnUpdateDeck" class="btn btn-flat">
			      </div>
			    </div>
			    </form>

			  </div>
			</div>
			<!-- End of Modal -->
			<input type="hidden" name="text" value="{{$deck->id}}" id="onDelete{{$deck->id}}">
			<a class="badge" id="deleteDeck{{$deck->id}}">Delete</a>
			</div>
			<div class="panel-body">
				<small>
				<span class="pull-left">Created: {{ Carbon\Carbon::createFromTimeStamp(strtotime($deck->created_at))->diffForHumans() }}</span> <span class="pull-right">Updated: {{ Carbon\Carbon::createFromTimeStamp(strtotime($deck->updated_at))->diffForHumans() }}</span>
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