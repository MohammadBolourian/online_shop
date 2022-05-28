@foreach($categories as $cate)
        <a class="d-flex mt-3" href="/category/{{$cate->id}}">
            {{ $cate->name }}
        </a>
@endforeach
