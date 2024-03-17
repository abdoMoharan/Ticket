<div class="modal fade" id="sub_type{{ $item->id }}" tabindex="-1" aria-labelledby="sub_type"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sub_type">Change Type tickes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.tickets.change_status')}}" method="post">
                @csrf
                <input type="hidden" name="ticket_id" id="" value="{{ $item->id }}">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="sub_type">Status Tickes</label>
                        <select name="sub_type" id="sub_type" class="form-control">
                            <option value="Open">Open</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Closed">Closed</option>
                        </select>
                        @error('sub_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
