@extend("Masters\\master.razr.php")

@block('topblock')
<div id="shop-filters-wrapper">
    <div class="container">
        <section id="section-filters">
            <h1>@( $search )</h1>
            <div>
                <select id="dd-category">
                    <option value="">CATEGORY</option>
                    @foreach( $categories as $category )
                        @if( mb_strtolower($search) !== "everything" && mb_strtolower($search) === mb_strtolower($category) )
                        <option value="@( $category )" selected="selected">@( $category )</option>
                        @else
                        <option value="@( $category )">@( $category )</option>
                        @endif
                    @endforeach
                </select>
                <select id="dd-collection">
                    <option value="">COLLECTIONS</option>
                    @foreach( $collections as $collection )
                        <option value="@( $collection )">@( $collection )</option>
                    @endforeach
                </select>
            </div>
        </section>
    </div>
</div>
@endblock

@block('contentblock')
<section id="section-shop">
    @if( isset($products) && !empty($products) )
    <ul>
        @foreach($products as $product)
        <li>
            <div>
                <a href="/shop/details/@( $product.id )">
                    <img src="/imgs/products/@( $product.thumbnail ).jpg" alt="@( $product.name )" />
                </a>
                @if( $product.reviews > 0 )
                <p>
                    @set( $counter = $product.stars )
                    @while( $counter > 0 )
                        <i class="fa fa-star highlight"></i>
                        @set( $counter-- )
                    @endwhile
                    @set( $counter = (5 - $product.stars))
                    @while( $counter > 0 )
                        <i class="fa fa-star"></i>    
                        @set( $counter-- )
                    @endwhile
                    <span>(@( $product.reviews ))</span>
                </p>
                @else
                <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span>(0)</span>
                </p>
                @endif
                <p class="product-name">@( $product.name )</p>
                <p>@( $product.price )</p>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p>No results found.</p>
    @endif
</section>
@endblock