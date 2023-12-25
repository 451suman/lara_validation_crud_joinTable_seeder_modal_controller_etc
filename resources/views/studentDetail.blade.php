<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <center><h1>All Student data</h1>
        
    @if(session('success'))
    <div class="alert alert-success" >
        {{ session('success') }}
        </div>
    @endif
</center>
<a href="/add" class="btn btn-success">Add Students</a>
<a href="/join" class="btn btn-success">join cities N Students</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.n</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">City</th>
                <th scope="col">Addres</th>
               
                <th scope="col">View</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->age }}</td>
                    <td>{{ $d->city }}</td>
                    <td>{{ $d->address }}</td>
                 
                    <td><a href="{{ route('singlestudent', $d->id) }}" class="btn" style="background: #1906ea56"">view</a></td>
                    <td><a href="{{route('updatepage',$d->id)}}" class="btn" style="background: rgba(19, 199, 244, 0.449)">Edit</a></td>
                    <td><a href="{{route('deletestudent',$d->id)}}" class="btn" style="background: #ff0404a4">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
    {{$data->links()}}
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
