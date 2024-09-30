<style>

    body {
        font-family: "Trebuchet MS",sans-serif;
    }

    .wrapper {
        width: 794px;
        margin: 0 auto;
    }
    .top-area {
        /*display: flex;*/
        justify-content: center;
        text-align: center;
        margin: 20px 0;
    }
    table {
        width: 100%;
        max-width: 99%;
        border-collapse: collapse;
    }
    .component-info {
        background: #EF4A26;
        color: #fff;
        border: 1px solid #EF4A26;
    }
    table>tbody>tr>td {
        padding: 12px;
        border-right: 1px solid #333;
    }
    tr.details {
    border: 1px solid #333;
}
table>tbody>tr>td {
    padding: 12px;
    border-right: 1px solid #333;
}

.logo {
    margin-right: 20px;
}

.logo img {
   
}

@media print {
    
    .component-info {
        background: #EF4A26 !important;
        color: #fff !important;;
        border: 1px solid #EF4A26 !important;;
    }
   
}

</style>

@php 
    $cart = cartPcItems();
@endphp

<div class="wrapper">
    <div class="top-area">
        <div class="logo">
            <a href="https://www.startech.com.bd/">
                <img src="{{ asset(siteInfo()->logo) }}" alt="Star Tech Ltd " style="width: 30%;">
            </a>
        </div>
        <div class="company-info">
            <h1>{{ siteInfo()->site_name }}</h1>
            <div class="address">
                <p><strong>Phone: </strong>{{ footerInfo()->phone }}, <strong>Email:</strong>{{ footerInfo()->email }}</p>
                <a href="https://dotmaxbd.com" style="color: #000;text-decoration: none;" target="_blank">www.dotmaxbd.com</a>
                <p class="web">{{ footerInfo()->address }}</p>
            </div>
            <h1 style="width: 30%;margin: 0 auto;border: 1px solid #000;padding: 10px;">Quotation</h1>
        </div>
    </div>

    <div class="all-printed-component">
        <table>
            <tbody><tr class="component-info">
                <td class="component-name"><b>Component</b></td>
                <td class="product-name"><b>Product Name</b></td>
                <td class="price"><b>Price</b></td>
            </tr>
            @foreach($cart as $item)
                <tr class="details">
                    <td class="component">{{ $item['category_name'] }}</td>
                    <td class="name">{{ $item['name'] }}</td>
                    <td class="price"><div class="price">{{ $item['price'] }} ৳</div></td>
                </tr>
            @endforeach
            <tr class="details total-amount">
                <td colspan="2" class="amount-label"><b>Total:
                
                <?php
                
                    $number = cartPcTotalAmount()['total'];
                    $number=(int)$number;
                    $total_paid_words = convertNumberToWords($number); 
                    $total_paid_words = ucwords($total_paid_words);
                    ?>
                        <strong>
                            <?php  
                                echo $total_paid_words.' Taka Only';
                            ?>
                        </strong>
                    <?php
    			 ?>
                
                
                </b></td>
                <td class="amount">{{ cartPcTotalAmount()['total'] }} ৳</td>
            </tr>
        </tbody></table>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        window.print();
    };
</script>