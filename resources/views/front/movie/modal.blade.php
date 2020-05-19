<div class="modal fade" id="location-selector" data-backdrop="{{ Session::has('location') ? '' : 'static' }}" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalization</h5>
                <button type="button" class="close {{ Session::has('location') ? '' : 'd-none' }}" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="location" class="sr-only">Location</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="1" selected>Please select a location</option>
                    @if (isset($branches))
                        @foreach ($branches as $row)
                            <option value="{{ $row->id }}">{{ $row->address }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary {{ Session::has('location') ? '' : 'd-none' }}" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-primary" href="{{ route('location', ['branch' => $row->id]) }}">Check Out</a>
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