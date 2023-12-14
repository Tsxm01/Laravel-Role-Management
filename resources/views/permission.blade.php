<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/267595d03a.js"></script>

</head>

<body>


    @include('layouts.sidebar')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Permission</li>
        </ol>
      </nav>

    <section  class="pt-5">
        <div class="container align-center">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('create-permission') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Blade name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4"
                                    placeholder="Blade name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Blade File Name</label>
                                <input type="text" name="file_name" class="form-control" id="inputPassword4"
                                    placeholder="Blade File Name">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Add in</button>
                        @if (session('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('success_delete'))
                            <div class="alert alert-danger">
                                {{ session('success_delete') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Blade Name</th>
                                <th scope="col">Blade File Name</th>
                                 <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $value)
                                <tr>
                                    <th scope="row">{{ $value->id }}</th>
                                    <td>{{ $value->blade_name }}</td>
                                    <td>{{ $value->blade_file_name   }}</td>
                                     <td><a href="javascript: void(0)" data-toggle="modal"
                                            data-target="#exampleModal{{ $value->id }}"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        &nbsp;
                                        <a href="{{ url('delete-permission'.'/'. $value->id) }}"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>


                                    </td>

                                    <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                        {{ $value->id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('edit-permission') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Blade name</label>
                                                                <input type="text" hidden name="id" value="{{ $value->id }}">
                                                                <input type="text" name="name" class="form-control" id="inputEmail4"
                                                                    placeholder="Blade name" value="{{ $value->blade_name }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputPassword4">Blade File Name</label>
                                                                <input type="text" name="file_name" class="form-control" id="inputPassword4"
                                                                    placeholder="Blade File Name" value="{{$value->blade_file_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>



</body>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>
