<div class="modal fade" id="modaldownload" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">{{__('Download SubTasks')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('download') }}" method="get">
                    <div class="form-group">
                        <label for="user_id">Select User:</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary mt-2">Download Subtasks</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
