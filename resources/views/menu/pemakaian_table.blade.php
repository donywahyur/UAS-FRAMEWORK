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
                            <td>
                                @if($p->status == 0)
                                    <input type="text" class="form-control" value="{{ $p->meter ?? 0 }}">
                                @else
                                    {{ $p->meter }}
                                @endif
                            </td>
                            <td>{{ $p->total ?? 0 }}</td>
                            <td>
                                @if($p->status == 0 && $p->meter != 0)
                                    <a href="./pemakaian/bayar/{{ $p->id }}" class="btn btn-primary">Bayar</a>
                                @elseif($p->status == 0 && $p->meter == 0)
                                    <span class="badge badge-warning">Belum Input Meter</span>
                                @else
                                    <span class="badge badge-success">Lunas</span>
                                @endif
                            </td>

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