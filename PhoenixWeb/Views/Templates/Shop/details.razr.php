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
        <p id="price">@( $product.price )</p>
        <p>Category: @( $product.category )</p>
        <p>Collection: @( $product.collection )</p>
    </div>
</section>
@endblock