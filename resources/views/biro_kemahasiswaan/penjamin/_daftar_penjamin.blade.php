<div id="search-results">
    <div class="table-wrapper card bs-gray-100 fw-bold">
        <table class="table table-responsive card-list-table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Telfon</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjamins as $penjamin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penjamin->username }}</td>
                        <td>{{ $penjamin->nama }}</td>
                        <td>{{ $penjamin->nomor_telp }}</td>
                        <td>{{ $penjamin->role }}</td>
                        <td>
                            <a href="/biro/penjamin/{{ $penjamin->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/biro/penjamin/{{ $penjamin->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>                               
    </div>
</div>