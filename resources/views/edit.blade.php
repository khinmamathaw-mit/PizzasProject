@extends('layout.layout')
@section("content")
    {{-- <center>
    <div class="container mt-4">
        <h1 class="grey-text mt-4 text-center d-inline">Welcome From Pizza project</h1>
        <img src="{{asset('images/pizza.jpg')}}" alt="" width="300px" height="150px" class="img-responsive mt-3">

    @if(Session('success'))
    <div class="alert alert-success mt-4">
         {{ Session('success') }}
    </div>
    @endif
    </div>
</center> --}}



    <!-- Material form register -->
<div class="container">
<div class="card mt-5">

    <h5 class="card-header indigo white-text text-center py-4">
        <strong>Pizza Edit Form</strong>
    </h5> 

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" action={{ route('update',$PizzaEdit->id) }} method="post">
                @csrf
                <!-- username -->

            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="username" 
                value="{{$PizzaEdit->username}}">
                <label for="materialRegisterFormEmail">User Name</label>
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Pizza name -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="pizzaname" 
                value="{{$PizzaEdit->pizzaname}}">
                <label for="materialRegisterFormEmail">Pizza Name</label>
                 @error('pizzaname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- topping -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="topping" 
                value="{{$PizzaEdit->topping}}">
                <label for="materialRegisterFormEmail">Toppings</label>
                 @error('topping')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
               
            </div>

            <!-- Sauce -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="sauce" 
                value="{{$PizzaEdit->sauce}}">
                <label for="materialRegisterFormEmail">Sauce</label>
                 @error('sauce')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="price" 
                value="{{$PizzaEdit->price}}">
                <label for="materialRegisterFormEmail">Price</label>
                 @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

          

            <!-- Order button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
</div>
</div>
@endsection