<x-xlayout>

Status: (delivered or pdening)<br>
Name: {{$order->name}}<br>
Address: {{$order->address}}<br>
Items: {{$order->items}}<br>

<a href='/order/{{$order->id}}/edit'>Update</a>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        I paih bo duh tak tak em?
      </div>
      <div class="modal-footer">
      <form action="/order/{{$order->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" title="Delete">Delete</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

</x-xlayout>