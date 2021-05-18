<x-xlayout>

<form action="/order/{{$order->id}}" method="POST">
@csrf
@method('PATCH')
    <label for="name" class="form-label">Hming</label>
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <input type="text" class="form-control" name="name" id="name" value={{$order->name}}>
    

    <label for="contact" class="form-label">Phone number</label>
    @if ($errors->has('contact'))
        <span class="text-danger">{{ $errors->first('contact') }}</span>
    @endif
    <input type="text" class="form-control" name="contact" id="contact" value={{$order->contact}}>
  

    <label for="address" class="form-label">Address</label>
    @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
    <input type="text" class="form-control" name="address" id="address" value={{$order->address}}>
    

    <label for="items" class="form-label">Items</label> 
    @if ($errors->has('items'))
        <span class="text-danger">{{ $errors->first('items') }}</span>
    @endif
    <textarea name="items" class="form-control" id="items" cols="30" rows="10">{{$order->items}}</textarea>
   

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        I siam tha duh tak tak em?
      </div>
      <div class="modal-footer">
      <input type="submit" value="Update">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

    <a href="javascript:history.back()">Go Back</a>

</form>

</x-xlayout>
