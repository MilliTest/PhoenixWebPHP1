@extend("Masters\\master.razr.php")

@block('contentblock')
<section id="section-filters">
    <h1>Everything</h1>
</section>
<section id="section-shop">
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
</section>
@endblock