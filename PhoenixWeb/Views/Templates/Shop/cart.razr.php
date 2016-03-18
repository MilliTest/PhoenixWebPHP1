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

                    </td>
                    <td>
                        @( $item.name )
                    </td>
                    <td>
                        $ @( $item.price )
                    </td>
                    <td>
                        <input type="text" name="qty" update="qty" value="@( $item.qty )" />
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
</section>
@endblock