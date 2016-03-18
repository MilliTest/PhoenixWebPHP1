@extend("Masters\\master-no-jumbotron.razr.php")

@block('topblock')
<div id="shop-filters-wrapper">
    <div class="container">
        <section id="section-filters">
            <h1>Shop</h1>
        </section>
    </div>
</div>
@endblock

@block('contentblock')
<section id="section-details">
    <div class="details-block">
         <img src="/imgs/products/@( $product.thumbnail ).jpg" alt="@( $product.name )" />
    </div>
    <div class="details-block">
        <h1>@( $product.name )</h1>
        <p id="price">$ @( $product.price )</p>
        <p>Category: @( $product.category )</p>
        <p>Collection: @( $product.collection )</p>
        <p>
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
        </p>
        <div id="form-add-to-cart">
            <form name="add-to-cart" id="add-to-cart" method="post" action="/shop/details/@( $product.id )">
                <input type="hidden" value="@( $product.id )" />
                <label>
                    Qty
                    <input type="text" name="qty" id="qty" value="1" />
                </label>
                <button type="submit">Add To Cart</button>
            </form>
        </div>
    </div>
</section>
@endblock