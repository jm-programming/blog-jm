@if(Session::has('message'))
	<div class="alert alert-success" id="Success">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    {{ session::get('message') }}
	</div>
@endif 