<div class="form-group">
    <label for="{{$input}}">{{ucfirst($input)}}</label>
    <textarea class="form-control @error($input) is-invalid @enderror" required id="{{$input}}"
              name="{{$input}}" rows="{{$rows??5}}"
              placeholder="{{ucfirst($input)}}...">{{ old($input) ?? $default ?? ''}}</textarea>
    @error($input)
    <div class="invalid-feedback">{{$message}}</div> @enderror
</div>
