@csrf

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Name Product</label>

    <div class="control">
        <input
            type="text"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full
 @if($errors->has('name')) error @endif"
            name="name"
            placeholder="Product Title"
            required
            value="@if(old('name')){{old('name')}}@else{{ $product['product_name'] ?? ""  }}@endif"
        >
    </div>

    @if($errors->has('name'))
        <div class="alert alert-danger w-50">{{$errors->first('name')}}</div>
    @endif
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Price Product</label>

    <div class="control">
        <input
            type="number"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full
 @if($errors->has('price')) error @endif"
            name="price"
            placeholder="Product Price"
            required
            value="@if(old('price')){{old('price')}}@else{{ $product['product_price'] ?? ""  }}@endif"
        >
    </div>

    @if($errors->has('price'))
        <div class="alert alert-danger w-50">{{$errors->first('price')}}</div>
    @endif
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Amount Product</label>

    <div class="control">
        <input
            type="number"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full
 @if($errors->has('amount')) error @endif"
            name="amount"
            placeholder="Product Amount"
            required
            value="@if(old('amount')){{old('amount')}}@else{{ $product['product_amount'] ?? ""  }}@endif"
        >
    </div>

    @if($errors->has('amount'))
        <div class="alert alert-danger w-50">{{$errors->first('amount')}}</div>
    @endif
</div>


<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Product Category</label>
    <div class="control">

        <select name="categories[]" multiple="multiple" id="categories">

            @foreach($categories as $key => $category)

                <option value='{{ $category['category_id'] }}'

                        @foreach($product['product_categories'] ?? [] as $product_category)

                        @if ($product_category['id'] ==  $category['category_id'])
                        selected="selected"
                         @endif

                    @endforeach

                >{{ $category['category_name'] }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="field mb-6">
    <div class="control">
        <button type="submit" class="btn btn-primary">Save Product</button>

        <a href="/" class="text-default">Cancel</a>
    </div>
</div>
