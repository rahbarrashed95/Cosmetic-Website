<h4 style="color: #000;font-weight: 700;">{{ $title }}</h4>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Total Amount</th>
        
        <th>Status</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
     @forelse($orders as $order)
   
      <tr>
        <td>{{$order->order_id}}</td>
        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('j M Y / H:i:s') }}</td>
        <td>{{$order->total_amount}}</td>
        <td> 
            @php $s = $order->order_status; @endphp
            @if($s == 0)
            <p style="color:yellow;background:blue; text-align:center; border-radius: 5px;padding: 6px;font-weight:bold;">Pending</p>                                                
            @elseif($s == 1)
            <p style="color:yellow;background:blue; text-align:center; border-radius: 5px;padding: 6px;font-weight:bold"> Progress </p>
                                                            
            @elseif($s == 2)
            <p style="color:yellow;background:blue; text-align:center; border-radius: 5px;padding: 6px;font-weight:bold"> Delivered </p>
                                                            
            @elseif($s == 3)
            <p style="color:yellow;background:blue; text-align:center; border-radius: 5px;padding: 6px;font-weight:bold"> Completed </p> 
                                                            
            @elseif($s == 4)
            <p style="color:yellow;background:blue; text-align:center; border-radius: 5px;padding: 6px;font-weight:bold"> Declined </p> 
            
            @endif
        </td>
        <td> 
            <a href="{{ route('front.order.show', [$order->id] ) }}" class="view-details-btn btn btn-success btn-sm">
                <span class="text">View Details</span>
            </a>
            <a href="{{ route('front.print_my_invoice',[$order->id])}}" class="btn btn-warning btn-sm" id="print_invoice">Print Invoice</a>
        </td>
      </tr>
      @empty
    <div>
        <strong class="text-danger text-center">No orders are available!</strong>
    </div>
    @endforelse
    </tbody>
  </table>
  </div>
  
  <script>
      $(document).on('click', 'a#print_invoice', function(e){
        e.preventDefault();
        
        var url = $(this).attr('href');
    
        $.ajax({
           type:'GET',
           url,
           data:{},
           success:function(res){
               if(res.status==true){
                   var myWindow = window.open("", "_blank");
  				   myWindow.document.write(res.view);
            }else if(res.status==false){
                toastr.error(res.msg);
            }
           }
        });

    });
  </script>
  
  