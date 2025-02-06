
@if(session('success'))
	<div class="alert alert-success" id="success">
		{{ session('success') }}
	</div>
@endif


@if(session('error'))
	<div class="alert alert-danger" id="error">
		{{ session('error') }}
	</div>
@endif

@if(session('status'))
	<div class="alert alert-success" id="status">
		{{ session('status') }}
	</div>
@endif

<div class="alert alert-success" id="success"></div>
<div class="alert alert-danger" id="error"></div>