<header class="header-bottom">
    <div class="cd-dropdown-wrapper ">
        <a class="cd-dropdown-trigger btn mx-2" href="#0">Search</a>
        <nav class="cd-dropdown ">
            <h2 class="wdqdqdqd">Title</h2>
            <a class="cd-close" href="#0" >Close</a>
            <ul class="cd-dropdown-content">

                <li class="cd-divider ">Categories</li>



                @foreach ($categories as $category)
                    <li class="has-children">

                        <a >{{ $category->name }}</a>

                        <ul class="cd-secondary-dropdown is-hidden">
                            <li class="go-back"><a href="#0">Menu</a></li>
                            <li class="see-all"><a href="{{ route('categories.viewCategory' , $category) }}" >See More</a></li>
                            @foreach ($category->subCategories->slice(0, 4)  as $subCategory )
                                <li class="has-children">

                                    <a >{{ $subCategory->name }}</a>

                                    <ul class="is-hidden">
                                        <li class="go-back"><a href="#0">Clothing</a></li>
                                        <li class="see-all"><a href="{{ route('subCategories.viewSubCategory' , $subCategory) }}">See More</a></li>

                                        @foreach ($subCategory->products->slice(0, 5) as $product )
                                            <li><a href="{{ route('products.index' , $product->id) }}" >{{ $product->name }}</a></li>
                                        @endforeach

                                    </ul>

                                </li>
                            @endforeach



                        </ul> <!-- .cd-secondary-dropdown -->

                    </li> <!-- .has-children -->
                @endforeach


                <li class="cd-divider">Divider</li>

                <li><a >Page 1</a></li>


            </ul> <!-- .cd-dropdown-content -->
        </nav> <!-- .cd-dropdown -->
    </div> <!-- .cd-dropdown-wrapper -->
</header>
