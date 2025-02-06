<form action="{{ route('profile.update') }}" method="post" class="form form--login row">
@csrf
@method('patch')
    <div class="form-group col-lg-6">
        <label>@lang('title.First Name')</label>
        <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required autocomplete="name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if(Auth::user()->surname)
        <div class="form-group col-lg-6">
            <label>@lang('title.Last Name')</label>
            <input id="surname" type="text" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="surname">
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
    <div class="form-group col-lg-6">
        <label>@lang('title.Email')</label>
        <input id="email" name="email" type="email" value="{{ Auth::user()->email }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if(Auth::user()->date)
        <div class="form-group col-lg-6">
            <label>@lang('title.Date of birth')</label>
            <input id="date" type="date" name="date" value="{{ Auth::user()->date }}">
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
    <div class="col-lg-12">
        <button type="submit" class="btn btn-style-1 w-100">@lang('title.Edit')</button>
    </div>
</form>