<form action="{{ route('password.update') }}" method="POST" class="form form--login row">
    @csrf
    @method('POST')
    <div class="form-group col-lg-12">
        <label>Old Password</label>
        <input id="current_password" name="current_password" type="password" autocomplete="current-password">
        @error('current_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-12">
        <label>New Password</label>
        <input id="password" name="password" type="password" autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-12">
        <label>Repeat New Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-style-1 w-100">Change Password</button>
    </div>
</form>