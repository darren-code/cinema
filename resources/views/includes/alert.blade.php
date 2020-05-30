@if(count($errors) > 0)
    <div class="row alert-area" style="z-index: 5">
        <div class="col-md-6 offset-md-3 alert-itself">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endif
@if(Session::has('message'))
<div class="row alert-area" style="z-index: 5">
    <div class="col-md-6 offset-md-3 alert-itself">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif