<div class="card">
    <div class="card-body">

        <form id="notificationForm">
            <div class="mb-3">
                <label for="notificationForm__user" class="form-label">User</label>
                <select name="user_id" id="notificationForm__user" class="form-select">
                    <option value="0" selected>Common notification</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="notificationForm__message" class="form-label">Message</label>
                <textarea class="form-control" id="notificationForm__message" rows="3"></textarea>
                <span id="notificationForm__message__err" class="text-danger error-text"></span>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>

    </div>
</div>
