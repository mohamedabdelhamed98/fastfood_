@extends('layouts.main')

@section('content')
</div>
<section class="book_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2 style="color:#ffbe33;">
        Checkout
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form id="checkout_form" method="POST" action="{{route('place_order')}}">
            @csrf
            <div>
              <input type="text" class="form-control" placeholder="Your Name" name="name" />
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Phone Number" name="phone" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Your Email"name="email" />
            </div>
            <div>
              <input type="text" class="form-control" placeholder="City" name="city"/>
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Address" name="address"/>
            </div>

            @if(Session::has('total'))
            @if(Session::get('total')!= null)
            <div class="form-group checkout-btn-container">
              <p style="color:#ffbe33;">Total amount: ${{Session::get('total')}}</p>
                <input type="submit" class="btn" id="checkout-btn" name="checkout-btn" value="checkout" style="background:#ffbe33;" >
            </div>
            @endif
            @endif
          </form>
        </div>
      </div>

    </div>
  </div>
</section>



@endsection
