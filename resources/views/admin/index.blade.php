<x-xlayout>

<div class="container">
    <div class="row">
        <div class="col-7">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date of Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index=>$order)
                    <tr onclick="showOnRight('{{$order}}')">    
                        <td>{{$index+1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{Str::limit($order->address,10)}}</td>
                        <td>{{Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMM YYYY, h:mm a')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title" id="name"></h5>
                    <h6 class="card-subtitle mb-2 text-muted" id="address"></h6>
                    <p class="card-text" id="items">   </p>
                    <a href="#" class="card-link">Status</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function showOnRight(name){
        var orderObj = JSON.parse(name);
        document.getElementById("name").innerHTML =orderObj.name +", "+orderObj.contact;
        document.getElementById("address").innerHTML =orderObj.address;
        document.getElementById("items").innerHTML =orderObj.items;

    }
</script>
 


</x-xlayout>