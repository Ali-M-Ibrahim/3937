<h1>All customers</h1>

<table>
    <tr>
        <th>Id</th>
        <th>first name</th>
        <th>last name</th>
        <th>dob</th>
    </tr>

@foreach($data as $cust)
    <tr>
        <td>{{$cust->id}}  </td>
        <td>{{$cust->first_name}}  </td>
        <td>{{$cust->last_name}}</td>
        <td>{{$cust->dob}}</td>
    </tr>
    @endforeach
</table>

