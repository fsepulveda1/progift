<div class="col-lg-3 order-lg-first">
    <div class="side-custom-menu">
        <h2>CATEGORÍAS</h2>

        <div class="side-menu-body">
            <ul>
                <li><a href="/destacados">Destacados</a></li>
                @php
                    $categories = App\Category::where('estado',1)->where('parent_id',null)->orderBy('orden', 'ASC')->get();
                @endphp
                @foreach($categories as $category)

                    <li>
                        @if(! count($category->children))
                            <a href="/categoria/{{$category['slug']}}">
                                {{ $category->nombre }}
                            </a>
                        @else
                            <a class="align-items-center" data-toggle="collapse" href="#submenu-{{ $category->id }}" role="button" aria-expanded="false" aria-controls="submenu-{{ $category->id }}">
                                <small class="fas fa-plus mr-3"></small>
                                <small class="fas fa-minus mr-3"></small>
                                {{ $category->nombre }}
                            </a>
                        @endif
                        @if(count($category->children))
                            @php($class_submenu = '')
                            @foreach($category->children as $child)
                                @if(Request::route('id') == $child->slug)
                                    @php($class_submenu = 'show')
                                @endif
                            @endforeach
                            <div class="collapse {{ $class_submenu }}" id="submenu-{{ $category->id }}">
                                <ul class="mb-0">
                                    @foreach($category->children as $child)
                                        <li>
                                            <a class="pl-5" href="/categoria/{{ $child->slug }}">
                                                {{ $child->nombre }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div><!-- End .side-menu-body -->
    </div><!-- End .side-custom-menu -->
</div><!-- End .col-lg-3 -->
