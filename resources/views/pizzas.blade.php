@extends("layout.layout")
@section("content")
<div class="container">
    @if(Session("delete"))
    <div class="alert alert-danger mt-4">
    {{ Session("delete") }}
    </div>
    @endif
  <table class="table table-hover mt-5">
{{-- <h1>{{ $pizzadatas[1]['username'] }}</h1> --}}
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">UserName</th>
      <th scope="col">Pizza Name</th>
      <th scope="col">Toppings</th>
      <th scope="col">Sauce</th>
      <th scope="col">Price</th>
      <th scope="col">Edit Order</th>
      <th scope="col">Order Complete</th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $pizzadatas as $pizza)
    <tr>
    {{-- pizza->id also ok when Pizza::all()--}}
      <th scope="row">{{ $pizza->id }}</th>
      <td>{{ $pizza['username'] }}</td> 
      <td>{{ $pizza['pizzaname'] }}</td> 
      <td>{{ $pizza['topping'] }}</td>
      <td>{{ $pizza['sauce'] }}</td>
      <td>{{ $pizza['price'] }}$</td>
      <td><a class="btn btn-sm btn-warning" href="{{ route('edit',$pizza->id) }}">Edit Order</a></td>
      <td><a class="btn btn-sm btn-success" href="{{ route('delete',$pizza->id) }}">Order Complete</a></td>
      {{-- url("/pizzas/$pizza->id") 2 ways  --}} 
    </tr>
   @endforeach 
  </tbody>

</table>

<!-- Button trigger modal -->
{{-- <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <!-- username -->
           <div class="md-form mt-4">
            <input type="text" id="materialRegisterFormEmail" class="form-control" name="">
            <label for="materialRegisterFormEmail">User Name</label>
        </div>
        <!-- Pizza name -->
        <div class="md-form mt-4">
            <input type="text" id="materialRegisterFormEmail" class="form-control" name="">
            <label for="materialRegisterFormEmail">Pizza Name</label>
        </div>

        <!-- topping -->
        <div class="md-form mt-4">
            <input type="text" id="materialRegisterFormEmail" class="form-control" name="">
            <label for="materialRegisterFormEmail">Toppings</label>
           
        </div>

        <!-- Sauce -->
        <div class="md-form mt-4">
            <input type="text" id="materialRegisterFormEmail" class="form-control" name="">
            <label for="materialRegisterFormEmail">Sauce</label>
        </div>

        <!-- Price -->
        <div class="md-form mt-4">
            <input type="text" id="materialRegisterFormEmail" class="form-control" name="">
            <label for="materialRegisterFormEmail">Price</label>
        </div>
       
      <div class="modal-footer d-flex justify-content-center">
        <a class="btn indigo white-text" href="">Update</a>
      </div>
    </div>
  </div>
</div> --}}

<!-- Modal -->
</div>
@endsection
