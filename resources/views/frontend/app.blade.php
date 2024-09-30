<!DOCTYPE html>
<html lang="en">
    @include('frontend.partials.head')
    
    <style>
    
    html {
        width: 100%;
        overflow-x: hidden;
    }
    
        .fixed-cart-bottom1 {
    position: fixed;
    bottom: 2rem;
    right: 4px;
    background: #eda56a;
    border-radius: 50px;
    height: 60px;
    width: 60px;
    cursor: pointer;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5s;
    z-index: 9999;
    border : #0f134f;
}

.fixed-cart-bottom1:hover {
    position: fixed;
    bottom: 2rem;
    right: 4px;
    background: #eda56a;
    border-radius: 50px;
    height: 60px;
    width: 60px;
    cursor: pointer;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5s;
    z-index: 9999;
    border : #0f134f;
}

.pcb-container {
        border: 1px solid #c3c8eb;
        max-width: 950px;
        margin: 0 auto;
        background: #fff;
    }

    .pcb-container .c-item {
        display: flex;
        padding: 15px 10px;
        flex: 0 0 auto;
        border-bottom: 1px solid #eee;
    }
    .pcb-container.c-item .img {
        background: var(--s-s-bg);
        border-radius: 3px;
        overflow: hidden;
        width: 60px;
        height: 60px;
        text-align: center;
        flex: 0 0 60px;
    }
    
    .pcb-head {
        background: #f9f9fc;
        border-bottom: 1px solid #c3c8eb;
        padding: 20px;
        display: flex;
    }
    .pcb-head .startech-logo {
    flex: 0 0 auto;
    display: flex;
    justify-content: center;
}
.pcb-head .actions {
    flex: 1 1 auto;
    padding-top: 0;
}

.pcb-head .actions .all-actions {
    display: flex;
    float: right;
}

.pcb-head .actions .action {
    display: inline-block;
    text-align: center;
    padding: 0 15px;
    background: none;
    border: none;
    color: var(--s-primary);
    height: auto;
    line-height: normal;
    font-weight: normal;
    border-right: 1px solid rgba(0, 0, 0, .1);
    outline: none;
}

.actions i {
    height: 24px;
    width: 24px;
}
.actions i {
    display: inline-block;
    line-height: 1;
    letter-spacing: normal;
    white-space: nowrap;
}

.pcb-head .action .action-text {
    display: block;
    white-space: nowrap;
    font-size: 12px;
    color: #666;
    padding-top: 2px;
    min-width: 40px;
}

.pcb-inner-content {
    margin: 25px auto;
    max-width: 800px;
}

.pcb-top-content {
    display: flex;
    margin: 0 0 30px;
}

.pcb-top-content>div {
    flex: 1 1 50%;
}

.pcb-top-content h1 {
    font-size: 15px;
    font-weight: bold;
    line-height: 18px;
    color: var(--s-secondary);
    margin: 23px 0;
}

.pcb-top-content .checkbox-inline {
    color: #808996;
    font-size: 13px;
}
.checkbox-inline input {
    margin-right: 5px;
    position: relative;
    top: 3px;
}

.pcb-top-content .right {
    text-align: right;
}

.pcb-top-content>div {
    flex: 1 1 50%;
}

.pcb-top-content .total-amount {
    display: inline-block;
    border: 1px dashed var(--s-primary);
    padding: 8px 0;
    margin-left: 10px;
    min-width: 140px;
    border-radius: 7px;
    text-align: center;
    color: #808996;
    position: relative;
}

.pcb-top-content .total-amount .amount {
    font-size: 18px;
    color: #111;
    padding-bottom: 3px;
}

.pcb-top-content .total-amount .items {
    font-size: 11px;
    font-weight: bold;
}

.betaa {
    top: 5px;
    right: 8px;
    position: absolute;
    color: var(--s-secondary);
    font-weight: bolder;
    font-size: 10px;
}

.pcb-top-content .total-amount.t-price {
    border: 1px solid var(--s-secondary);
    color: #fff;
    background: #00712D;
}

.pcb-top-content .total-amount {
    display: inline-block;
    border: 1px dashed var(--s-primary);
    padding: 8px 0;
    margin-left: 10px;
    min-width: 140px;
    border-radius: 7px;
    text-align: center;
    color: #808996;
    position: relative;
}

.pcb-top-content .total-amount.t-price .amount {
    color: #fff;
}

.pcb-top-content .total-amount .amount {
    font-size: 18px;
    color: #111;
    padding-bottom: 3px;
}

.pcb-top-content .total-amount .items {
    font-size: 11px;
    font-weight: bold;
}

.pcb-content .content-label {
    background: #808996;
    color: #fff;
    line-height: 20px;
    padding: 0 10px;
    font-size: 12px;
    font-weight: bold;
}

.pcb-content .c-item {
    display: flex;
    padding: 15px 10px;
    flex: 0 0 auto;
    border-bottom: 1px solid #eee;
}

.pcb-content .c-item .img {
    background: var(--s-s-bg);
    border-radius: 3px;
    overflow: hidden;
    width: 60px;
    height: 60px;
    text-align: center;
    flex: 0 0 60px;
}

.pcb-content .c-item .img-ico {
    background: url(https://www.startech.com.bd/catalog/view/theme/starship/images/cpu.svg) no-repeat center;
    width: 60px;
    height: 60px;
    display: block;
}

.pcb-content .c-item .details {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 50px 0 20px;
}

.c-item.blank .details .component-name {
    color: #666;
}

.c-item .details .component-name {
    font-size: 12px;
    color: var(--s-secondary);
    font-weight: bold;
    padding-bottom: 7px;
}

.c-item .details .component-name .mark {
    margin-left: 5px;
    background: #808996;
    color: #fff;
    padding: 1px 4px;
    border-radius: 2px;
    font-weight: normal;
}

.c-item.blank .details .product-name {
    background: #f2f3f4;
    min-height: 12px;
    max-width: 80%;
    margin-top: 4px;
}

.c-item .details .product-name {
    line-height: 15px;
}

.c-item .item-price {
    flex: 0 0 100px;
    margin: 10px 0;
    padding-right: 20px;
    display: flex;
    align-items: center;
    border-right: 1px solid #eee;
}

.c-item.blank .item-price:after {
    content: "";
    display: block;
    min-height: 12px;
    background: #f2f3f4;
    width: 100%;
}

.c-item .actions {
    flex: 0 0 110px;
    text-align: right;
    padding-top: 8px;
}

.st-outline {
    background: #3749BB;
    color: var(--s-secondary);
}

.build .btn {
    background: var(--s-secondary);
    display: inline-block;
    border: 2px solid var(--s-secondary);
    padding: 0 20px;
    margin: 0;
    height: 42px;
    line-height: 38px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    border-radius: 4px;
    outline: none;
    text-align: center;
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    transition: all 300ms linear;
}

.pcb {
    padding: 30px 0;
}

.alt-price {
    flex: 0 0 100px;
    margin: 10px 0;
    padding-right: 20px;
    display: flex;
    align-items: center;
    border-right: 1px solid #eee;
}

.alt-actions {
    flex: 0 0 110px;
    text-align: center;
    padding-top: 18px;
}

.alt-actions i {
    font-size: 20px;
}

    .accordion-button:not(.collapsed) {
        color: #000 !important;
        background-color: #fff !important;
        box-shadow: inset 0 calc(-1* var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
    }
    
    .accordion-button:not(.collapsed)::after {
        background-image: var(--bs-accordion-btn-icon);
        transform: var(--bs-accordion-btn-icon-transform);
    }


    </style>
<body>
    
    @include('frontend.partials.header')
    @php $cart = session()->get('cart', []); @endphp
    <a href="{{ route('front.checkout.index') }}" 
    class="btn pmd-btn-fab pmd-ripple-effect btn-primary fixed-cart-bottom1"
    type="button"> @if($cart !== null) <span style="color: white;position: absolute;top: 4px;right: 17px;">{{ count($cart) }}</span>  @endif<i class="fa fa-shopping-bag"></i></a>
   
    @yield('content')
    @include('frontend.partials.footer')
    
