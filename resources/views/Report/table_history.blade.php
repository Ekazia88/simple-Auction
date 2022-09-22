<table id="dataTable" class="table table-bordered" cellspacing="0">
    <thead>
       
        <tr>
            <th>No</th>
            <th>Name Product</th>
            <th>Bidder</th>
            <th>Phone</th>
            <th>Bid</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($historyx as $i => $it)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$it->namep}}</td>
            <td>{{$it->name}}</td>
            <td>{{$it->telp}}</td>
            <td>{{$it->bid}}</td>
            <td>{{$it->auction_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>