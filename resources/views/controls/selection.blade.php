<div class="form-group">
    @error($input)
        <label for="{{$input}}" class="text-danger">{{$message}}</label>
    @else
        <label for="{{$input}}">{{$title}}</label>
    @enderror
    <select class="form-control @error($input) is-invalid @enderror" aria-label="Select {{strtolower($title)}}" id="{{$input}}" name="{{$input}}">
        <option selected disabled>Select {{strtolower($title)}}</option>
        @foreach($items as $id=>$name)
            <option value="{{$id}}">{{sprintf('# %s  -  %s', $id  ,$name)}}</option>
        @endforeach
    </select>
</div>
