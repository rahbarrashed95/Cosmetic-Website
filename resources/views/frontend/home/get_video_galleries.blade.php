
<div class="bg-gradient container-fluid" style="background: #F3F3F3 !important;margin-bottom: 10px;">
    <div class="col-12 product-header">
        <div class="section_title text-light">
            <a href="" style="color: #218A41;"> <h2 class="p-1 m-0 prodCatcus" style="text-align:center">
               <span style="width: auto;color: #000;"><strong>Discover Our Videos</strong></span></h2> 
            </a>
        </div>
    </div>
</div>
    
<div class="container-fluid">
        <div class="">
            <div class="owl-carousel slider_gallery_product"> 
                @foreach ($product_videos as $key => $video)
                <div class="product-item" style="border: none;">
                    <div class="" style="padding: 10px;">
                            <a class="primary_img" href="#" onclick="openVideoLink('{{ $video->video_title }}'); return false;">
        <!-- Optionally, display a thumbnail or title if needed -->
        {{ $video->video_url }}
    </a>
                    </div>
                    <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 10%;background: none;">
                        <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                            
                        </div>
                        <div class="rounded-0 p-2 d-flex justify-content-between">
         					
     					    
                            <a href=""
                                   style=" color: white;font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 2%;padding: 4%;"
                                   class="btn btn-sm btn-warning semi"
                                   data-price=""
                                   data-productid=""
                                   data-url="{{ route('front.cart.store') }}">
                                   sDGsdgsdgsd
                            </a>
                            
                                
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
   
<!-- Product Sliders Start  -->

<script>
    function openVideoLink(url) {
    // Open the video link in a new tab
    window.open(url, '_blank');
}
</script>