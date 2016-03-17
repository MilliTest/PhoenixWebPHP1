@extend("Masters\\master.razr.php")

@block('contentblock')
<section id="section-top-sellers">
    <h1>Top sellers</h1>
    <ul>
        @foreach($products as $product)
        <li>
            <div>
                <img src="/imgs/products/@( $product.thumbnail ).jpg" alt="@( $product.name )" />
                <p></p>
                <p>@( $product.name )</p>
                <p>@( $product.price )</p>
            </div>
        </li>
        @endforeach
    </ul>
</section>
@endblock