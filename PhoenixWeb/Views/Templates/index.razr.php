@extend("Masters\\master.razr.php")

@block('contentblock')
<section id="section-top-sellers">
    <h1>Top sellers</h1>
    <ul>
        @foreach($products as $product)
        <li>
            <div>
                <img src="/imgs/products/@( $product.thumbnail ).jpg" alt="@( $product.name )" />
            </div>
        </li>
        @endforeach
    </ul>
</section>
@endblock