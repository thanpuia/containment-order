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
                        <th>Status</th>
                        <th>Date of Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index=>$order)
                    <tr onclick="showOnRight('{{$order}}')">    
                        <td>{{$index+1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{Str::limit($order->address,10)}}</td>
                        <td>
                        <?php                
                         $statusName="";
                            if($order->status==1)
                                $statusName="Ordered";
                            else if($order->status==2)
                                $statusName="Processing";
                            else if($order->status==3)
                                $statusName="Delivered";
                        ?>
                        {{$statusName}}</td>
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
                    <h4 class="card-text" id="status"></h4>

                    <a  onclick="status44()" class="card-link">Status</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>
     var orderId;
    var status;
    function showOnRight(name){
        var orderObj = JSON.parse(name);
        orderId = orderObj.id;
        status = orderObj.status;

        document.getElementById("name").innerHTML =orderObj.name +", "+orderObj.contact;
        document.getElementById("address").innerHTML =orderObj.address;
        document.getElementById("items").innerHTML =orderObj.items;
        var statusName;
        if(orderObj.status==1)
            statusName="Ordered";
        else if(orderObj.status==2)
            statusName="Processing";
        else if(orderObj.status==3)
            statusName="Delivered";
        document.getElementById("status").innerHTML =statusName;

    }

    function status44(){
             //1=ordered.2=processing .3=delivered
        if(status==1)
            status=2;
        else if(status==2)
            status=3;
        else if(status==3)
            status=1;
        $.ajax({
                type: "POST",
                url: "{{ route('admin.status') }}",
                data: {  '_token': '{{ csrf_token() }}','id':orderId,'status':status},
                dataType: 'json',
                success: function(response) {
                            console.log("success");
                            var statusName;
                            if(response.status==1)
                                statusName="Ordered";
                            if(response.status==2)
                                statusName="Processing";
                            if(response.status==3)
                                statusName="Delivered";
                            document.getElementById("status").innerHTML =statusName;
                        },
                    error: function(response) {
                        console.log(response);
                    }
                });
        
        
    }
         
       

</script>
 
</x-xlayout>