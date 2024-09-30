@foreach ($retrieve_data as $index => $product)
    <tr>
        <td>
            <a target="_blank" href="{{ route('front.product.single_product',[$product->slug]) }}">
                {{ $product->name }} <br>
                {!! $product->short_description !!}
            </a>
        </td>
        <td>Upcoming</td>
        <td>{{ $product->price }}</td>
        
        <td>
            <?php
                $product_price = $product->price;
                $wholesale_discount = $product->wholesell_price_discount;
                $wholesale_price = ($product_price * $wholesale_discount) / 100;
                echo $wholesale_price;
            ?>
        </td>
        
        <td> <img class="" src="{{ asset('uploads/custom-images/'.$product->thumb_image) }}" alt="" width="100px" height="100px"></td>
    </tr>
@endforeach