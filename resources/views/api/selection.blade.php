<div class="form-group">
    <label for="api">API</label>
    <select class="form-control " aria-label="Select parameter parent" id="api" name="api">
        <option selected>Select an API</option>
        @foreach($apis as $api)
            <option value="{{$api->id}}">{{$api->name}}</option>
        @endforeach
        @error('api')
        <div class="invalid-feedback">{{$message}}</div> @enderror
    </select>
</div>
