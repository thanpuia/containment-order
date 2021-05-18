<x-xlayout>



<table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Item</th>
            <th>Date of Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $index=>$order)
        <tr onclick="window.location='{{ $order->id }}';">    
            <td>{{$index+1}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td> {{Str::limit( $order->items,15)}}</td>
            <td>{{Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMM YYYY, h:mm a')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-xlayout>