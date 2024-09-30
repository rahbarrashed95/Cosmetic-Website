
<style>
    .child-list {
        padding: 0;
        width: 100%;
        margin: 0 0 15px;
        background: #fff;
    }
    .child-list a {
        display: inline-block;
        line-height: 34px;
        padding: 0 14px;
        color: #111;
        border: 1px solid #ddd;
        border-radius: 30px;
        margin: 0 5px 5px 0;
        font-size: 13px;
        font-weight: normal;
    }
    .child-list a:hover {
        background: #0f134f;
        border: 1px solid var(--s-secondary);
        color: #fff;
        text-decoration: none;
    }
</style>

<div class="c-intro" style="margin-bottom: 10px;">
    <div class="card" style="width: 100%;">
        <div class="card-body text-center">
            <!--<h1>Desktop PC Price in Bangladesh (BD)</h1>-->
            <p>
                {!! $short_description !!}
              </p>    
            <div class="child-list">
                
                @foreach($sub_cat as $data)
                    <a href="{{ route('front.subcategory', [
                                            'type'=>'childcategory', 
                                            'slug'=> $data->slug 
                                        ] ) }}">{{ $data->name }}</a>
                @endforeach
                
            </div>
        </div>
    </div>
</div>