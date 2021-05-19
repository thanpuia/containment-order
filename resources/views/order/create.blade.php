<x-xlayout>

<form action="/order" method="POST">
@csrf
    <input type="hidden"  name="base" value="1">
    <input type="hidden"  name="status" value="1">

    <label for="name" class="form-label">Hming</label>
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <input type="text" class="form-control" name="name" id="name">
    

    <label for="contact" class="form-label">Phone number</label>
    @if ($errors->has('contact'))
        <span class="text-danger">{{ $errors->first('contact') }}</span>
    @endif
    <input type="text" class="form-control" name="contact" id="contact">
  

    <label for="address" class="form-label">Address</label>
    @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
    <input type="text" class="form-control" name="address" id="address">
    

    <label for="items" class="form-label">Items</label> 
    @if ($errors->has('items'))
        <span class="text-danger">{{ $errors->first('items') }}</span>
    @endif
    <textarea name="items" class="form-control" id="items" cols="30" rows="10"></textarea>
   

    <input type="submit" value="submit">

</form>

</x-xlayout>
