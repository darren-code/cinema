<div class="modal fade" id="location-selector" data-backdrop="{{ Session::has('location') ? '' : 'static' }}" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Location</h5>
                <button type="button" class="close {{ Session::has('location') ? '' : 'd-none' }}" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (isset($branches))
                    @foreach ($branches as $row)
                        <a type="button" class="btn btn-primary" href="{{ route('movie', ['branch' => $row->id]) }}">{{ $row->location }}</a>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary {{ Session::has('location') ? '' : 'd-none' }}" data-dismiss="modal">Cancel</button>
                {{-- <a type="button" class="btn btn-primary" href="{{ route('movie', ['branch' => $row->id]) }}">Check Out</a> --}}
            </div>
        </div>
    </div>
</div>

@if (!Session::has('location'))
<script>
    $(document).ready(() => {
        $('#location-selector').modal();
    });
</script>
@endif