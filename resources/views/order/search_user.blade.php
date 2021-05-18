<x-xlayout>

    <form action="/order/mo" method="post">
    @csrf
    <label for="contact" class="form-label">Phone number</label>
    @if ($errors->has('contact'))
        <span class="text-danger">{{ $errors->first('contact') }}</span>
    @endif
    <input type="text" class="form-control" name="contact" id="contact">
  
  <input type="submit" value="submit">
    </form>
</x-xlayout>