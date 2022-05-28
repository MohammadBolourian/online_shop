
<style>
    .first{
        display: flex;
    }
    .db{
        color: #00b4c9;
        display: none;

    }
    .first:hover .db {
        display: block !important;
    }
    a {
        text-decoration: none;
        color: black;
    }
    a:hover {
        text-decoration: none;
        color: dimgray;
    }

</style>

    @foreach($categories as $cate)
        <ul class="first subnav-content2 ">
            <a href="/category/{{$cate->id}}">
            {{ $cate->name }}
            </a>
            @if($cate->child->count())
                <div class="submenu2 db">
                @include('home.layout.child-category' , [ 'categories' => $cate->child])
                </div>
            @endif
        </ul>
    @endforeach



{{--<ul class="first subnav-content2 ">--}}
{{--<a  href="#menu1">لورم--}}
{{--</a>--}}
{{--    <div class="submenu2 db">--}}
{{--        <li class="sar-shakhe  ">--}}
{{--            <a class="db" href="#menu2">لورم--}}
{{--            </a>--}}
{{--            <div class="zir-shakhe  ">--}}
{{--                <a href="#menu3">33--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </li>--}}
{{--    </div>--}}
{{--</ul>--}}
