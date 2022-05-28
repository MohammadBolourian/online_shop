
    @foreach($categories as $cate)
        <li class="sar-shakhe  ">
            <a class="db mt-3 mb-3" href="/category/{{$cate->id}}">
                {{ $cate->name }}
            </a>

            @if($cate->child->count())
                <div class="zir-shakhe">
                @include('home.layout.child2-category' , [ 'categories' => $cate->child])
                </div>
            @endif
        </li>
    @endforeach

