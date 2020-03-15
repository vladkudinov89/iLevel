
@csrf

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input
            type="text"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full
 @if($errors->has('name')) error @endif"
            name="name"
            placeholder="Category Title"
            required
            value="@if(old('name')){{old('name')}}@endif"
           >
    </div>

    @if($errors->has('name'))
        <div class="alert alert-danger w-50">{{$errors->first('name')}}</div>
    @endif
</div>


<div class="field mb-6">
    <div class="control">
        <button type="submit" class="btn btn-primary">Save</button>

        <a href="/" class="text-default">Cancel</a>
    </div>
</div>
