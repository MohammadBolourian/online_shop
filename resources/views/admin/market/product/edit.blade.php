@extends('admin.layout.master')
@section('head-tag')
    <title> ویرایش کردن کالا</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.product.index')}}> محصولات</a></li>
    <li class="breadcrumb-item active">ویرایش کردن کالا </li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن کالا</h5>
        <br>
        <div id="attributes" data-attributes="{{ json_encode(\App\Models\Market\Attribute::all()->pluck('name')) }}"></div>
        <form class="form-group row " action="{{ route('admin.market.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
           <div class="col-6 mt-5">
               <label>نام کالا:</label>
               <input name="title" type="text" class="form-control " value="{{ old('title',$product->title) }}">
               @error('title')
               <span class=" bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
               @enderror
           </div>

            <div class="col-6 mt-5">
                <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی ها</label>
                <select class="form-control" name="categories[]" id="categories" multiple>
                    @foreach(\App\Models\Market\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id , $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('categories')
                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                @enderror
            </div>


            <div class="col-6 mt-5">
                <label>قیمت کالا:</label>
                <input name="price" type="text" class="form-control " value="{{ old('price',$product->price) }}">
                @error('price')
                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                @enderror
            </div>
            <div class="col-6 mt-5">
                <label>موجودی کالا:</label>
                <input name="inventory" type="text" class="form-control " value="{{ old('inventory',$product->inventory) }}">
                @error('inventory')
                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                @enderror
            </div>

            <section class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">تصویر </label>
                    <input type="file" name="image" class="form-control form-control-sm">
                </div>
                @error('image')
                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                @enderror
            </section>

            <section class="col-12 mt-5">
                <div class="form-group">
                    <label for="">توضیحات</label>
                    <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">
                      {{ old('description',$product->description) }}
                    </textarea>
                </div>
            </section>

            <section class="col-12 border-top border-bottom py-3 mb-3">

                <h6>ویژگی محصول</h6>
                <hr>
                <div id="attribute_section">
                    @foreach($product->attributes as $attribute)
                        <div class="row" id="attribute-{{ $loop->index }}">
                            <div class="col-5">
                                <div class="form-group">
                                    <label>عنوان ویژگی</label>
                                    <select name="attributes[{{ $loop->index }}][name]" onchange="changeAttributeValues(event, {{ $loop->index }});" class="attribute-select form-control">
                                        <option value="">انتخاب کنید</option>
                                        @foreach(\App\Models\Market\Attribute::all() as $attr)
                                            <option value="{{ $attr->name }}" {{ $attr->name ==  $attribute->name ? 'selected' : '' }}>{{ $attr->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label>مقدار ویژگی</label>
                                    <select name="attributes[{{ $loop->index }}][value]" class="attribute-select form-control">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($attribute->values as $value)
                                            <option value="{{ $value->value }}" {{ $value->id  === $attribute->pivot->value_id ? 'selected' : '' }}>{{ $value->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <label >اقدامات</label>
                                <div>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-{{ $loop->index }}').remove()">حذف</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-sm btn-primary" type="button" id="add_product_attribute">ویژگی جدید</button>



            </section>
            <div class="mt-5 mr-4">
                <button class="btn btn-outline-success ml-3">افزودن</button>
                <a href="{{route('admin.market.product.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
            </div>
        </form>

    </div>
    @endsection
@section('script')

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $('#categories').select2({
            'placeholder' : 'دسته بندی مورد نظر را انتخاب کنید'
        })


        let changeAttributeValues = (event , id) => {
            let valueBox = $(`select[name='attributes[${id}][value]']`);


            //
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json'
                }
            })
            //
            $.ajax({
                type : 'POST',
                url : '/admin/attribute/values',
                data : JSON.stringify({
                    name : event.target.value
                }),
                success : function(res) {
                    valueBox.html(`
                            <option value="" selected>انتخاب کنید</option>
                            ${
                        res.data.map(function (item) {
                            return `<option value="${item}">${item}</option>`
                        })
                    }
                        `);
                }
            });
        }

        let createNewAttr = ({ attributes , id }) => {

            return `
                    <div class="row" id="attribute-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ویژگی</label>
                                 <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class="attribute-select form-control">
                                    <option value="">انتخاب کنید</option>
                                    ${
                attributes.map(function(item) {
                    return `<option value="${item}">${item}</option>`
                })
            }
                                 </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                 <label>مقدار ویژگی</label>
                                 <select name="attributes[${id}][value]" class="attribute-select form-control">
                                        <option value="">انتخاب کنید</option>
                                 </select>
                            </div>
                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
        }

        $('#add_product_attribute').click(function() {
            let attributesSection = $('#attribute_section');
            let id = attributesSection.children().length;

            let attributes = $('#attributes').data('attributes');

            attributesSection.append(
                createNewAttr({
                    attributes,
                    id
                })
            );

            $('.attribute-select').select2({ tags : true });
        });
        $('.attribute-select').select2({ tags : true });
    </script>
@endsection
