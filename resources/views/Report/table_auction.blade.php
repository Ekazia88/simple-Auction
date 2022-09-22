<table id="dataTable" class="table table-bordered" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>First Bid</th>
            <th>Last Bid</th>
            <th>Winner</th>
            <th>Officer</th>
            <th>Date Bid</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($auction as $i => $u)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$u->namep}}</td>
            <td>{{$u->first_bid}}</td>
            <td>{{$u->last_bid}}</td>
            <td>{{$u->Full_name}}</td>
            <td>{{$u->Full_nameo}}</td>
            <td>{{$u->date_bid_end}}</td>
            <td>{{$u->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>