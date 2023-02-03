<div class="col">
    <div class="card">
        <div class="card-header">Data Pemakaian</div>
        <div class="card-body">
            <table class="datatables" width="100%">
                <thead>
                    <tr>
                        <th>No Pelanggan</th>
                        <th>Nama</th>
                        <th>Pemakaian</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $p)
                        <tr>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->meter }}</td>
                            <td>{{ $p->total }}</td>
                            <td>{{ $p->status }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.datatables').DataTable();
    });
</script>