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
    </table>
    <pre>
        @( print_r($cart) )
    </pre>
</section>
@endblock