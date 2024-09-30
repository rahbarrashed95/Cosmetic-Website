<h3>Order No : {{ $order->order_id }}</h3>
<h3>Your Order Is Now: 
    @if($order->order_status == '0')
        Pending
    @elseif($order->order_status == '1')   
        Processing
    @elseif($order->order_status == '2')   
        Courier
    @elseif($order->order_status == '3')   
        Complete
    @elseif($order->order_status == '4')   
        Cancelled
    @elseif($order->order_status == '5')   
        On Hold
    @elseif($order->order_status == '6')   
        Return
    @else
    
    @endif
</h3>