<div class="form-group">
    <label for="{{$input}}">{{ucfirst($input)}}</label>
    <input {{$attrs??''}} type="{{$type??'text'}}"
           class="form-control {{$style??''}} @error($input) is-invalid @enderror" required
           id="{{$input}}"
           name="{{$input}}"
           placeholder="{{ucfirst($input)}}" value="{{ old($input) ?? $default ?? ''}}">
    @error($input)
    <div class="invalid-feedback">{{$message}}</div> @enderror
</div>
