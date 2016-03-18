@extend("Masters\\master-no-jumbotron.razr.php")

@block('topblock')
<div id="shop-filters-wrapper">
    <div class="container">
        <section id="section-filters">
            <h1>Cart</h1>
        </section>
    </div>
</div>
@endblock

@block('contentblock')
<section id="section-details">
    <table id="table-cart">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @if( !empty($cart) )
                @foreach($cart as $item)
                <tr>
                    <td>
                        <a href="/shop/details/@( $item.id )"><img src="/imgs/products/@( $item.thumbnail ).jpg" alt="@( $item.name )" /></a>
                    </td>
                    <td>
                        @( $item.name )
                    </td>
                    <td>
                        $ @( $item.price )
                    </td>
                    <td>
                        <input type="text" name="qty" value="@( $item.qty )" autocomplete="off" />
                        <input type="hidden" name="id" value="@( $item.id )" /> 
                        <a href="#" class="update-btn">Update</a>
                    </td>
                    <td>
                        $ @( number_format($item.price * $item.qty, 2) )
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="5">No items are currently in your cart.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div>
        @if( !empty($cart) )
        <button type="button">Checkout</button>
        @endif
    </div>
</section>
@endblock