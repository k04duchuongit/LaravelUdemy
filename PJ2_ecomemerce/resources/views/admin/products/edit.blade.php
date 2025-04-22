<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4 class="pt-3 pb-3">DashBroad</h4>
            <div class="card">

                <div class="card-header d-flex justify-content-between">

                    <h5 class="m-1">Edit product</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <img src="{{asset($product->image)  }}" alt="" style="width:100px !important;">
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Image</label>
                            <x-text-input type="file" name="image"></x-text-input>
                        </div>
                        <div>
                            <h5 class="my-3">Image Lis</h3>
                                @foreach ($images as $image)
                                <img src="{{asset($image)  }}" alt="" style="width:100px !important;">    
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Images</label>
                            <x-text-input type="file" name="images[]" multiple></x-text-input>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Name</label>
                            <x-text-input type="text" name="name" value="{{ $product->name }}"></x-text-input>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <x-text-input type="text" name="price" value="{{ $product->price }}"></x-text-input>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Colors</label>
                            <x-select-input name="colors[]" id="color" multiple>
                                <option value="">Select</option>
                                <option value="red" @selected(in_array('red',$colors))>Red</option>
                                <option value="blue"  @selected(in_array('blue',$colors))>Blue</option>
                                <option value="green" @selected(in_array('green',$colors))>Green</option>
                            </x-select-input>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Short Description</label>
                            <x-text-input type="text" name="short_description"
                                value="{{ $product->short_description }}"></x-text-input>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">SKU</label>
                            <x-text-input type="text" name="sku" value="{{ $product->sku }}"></x-text-input>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Qty</label>
                            <x-text-input type="number" name="qty" value="{{ $product->qty }}"></x-text-input>
                        </div>

                        <div class="form-group">
                            <label for="" class="mt-3">Desc</label>
                            <textarea name="description" id="editor" cols="30" rows="10">{!! $product->description !!}</textarea>
                        </div>
                        <x-primary-button>Submit</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            tinymce.init({
                selector: 'textarea#editor',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
    @endpush
</x-app-layout>
