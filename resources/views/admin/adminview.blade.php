@extends('template')

@section('content')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Input Data
    </button>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Administrator</th>
                <th>Username</th>
                <th>Admin Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $dataadmin)

            <tr>
                <td>{{$dataadmin->admin_nama}}</td>
                <td>{{$dataadmin->admin_username}}</td>
                <td>{{$dataadmin->admin_level}}</td>
                <td>
                    <a href="{{route('adminedit', $dataadmin->admin_id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('admindelete', $dataadmin->admin_id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

    


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Administrator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('adminadd')}}">
                @csrf
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label for="">Level</label>
                  <select name="level" class="form-control">
                      <option value="">Pilih Level</option>
                      <option value="1">Super Administrator</option>
                      <option value="2">Administrator</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection