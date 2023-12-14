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

    <section class="pt-5">
        <div class="container align-center">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('create-role') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">All Users</label>
                                <select name="user" id="" required class="form-control">
                                    <option disabled selected> Select Users</option>
                                    @foreach ($user as $value1)
                                        <option value="{{ $value1->id }}">{{ $value1->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Check</th>
                                            <th scope="col">Blade Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permission as $value2)
                                        <tr>
                                            <th scope="row">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                        <input type="checkbox" name="role[]" aria-label="Checkbox for following text input" value="{{$value2->id}}">
                                                      </div>
                                                    </div>
                                                    {{-- <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{$value2->blade_name}}"> --}}
                                                  </div>
                                            </th>
                                            <td>{{$value2->blade_name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                <th scope="col">Data</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row"><h5>User Name : {{ $user->name }}</h5>
                                    <ul>
                                    @foreach ($user->blade as $permission)

                                        <li>Permissions : {{ $permission }}</li>
                                    @endforeach
                                   </ul>
                                </td>
                                <td>Test</td>
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
