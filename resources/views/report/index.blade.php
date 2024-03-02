@extends('layout')
  
@section('content')
    <div class="container">
        <div id="message">
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row" >
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="col col-sm-3">Report</div>
                        <!-- <div class="col col-sm-3 form-group">
                            <input type="date" id="tg_awal" class="form-control" name="tg_awal" placeholder="Tanggal Awal" >
                        </div>
                        <div class="col col-sm-3 form-group">
                            <input type="date" id="tg_akhir" class="form-control" name="tg_akhir" placeholder="Tanggal Awal" >
                        </div>
                        <div class="col col-sm-3">
                            <button type="submit" class="btn btn-success btn-sm float-end">Filter</button>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="sample_data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NO TRX KEMBALI</th>
                                <th scope="col">NO TRX PINJAM</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Nama Pengguna</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($data)
                        <?php $no = 0; ?>
                            @foreach($data as $row)
                            <?php $no++ ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$row->no_transaksi_kembali}}</td>
                                <td>{{$row->no_transaksi_pinjam}}</td>
                                <td>{{$row->anggota->nm_anggota}}</td>
                                <td>{{$row->tg_pinjam}}</td>
                                <td>{{$row->tg_kembali}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->denda}}</td>
                                <td>{{$row->pengguna->nm_anggota}}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">No Data</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <button type="button" onclick="window.print()" class="btn btn-primary btn-sm float-end">Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function printPDF() {
        // Buat request ke server untuk menghasilkan PDF
        fetch('{{ route('report.pdf') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                tg_awal: document.getElementById('tg_awal').value,
                tg_akhir: document.getElementById('tg_akhir').value
            })
        })
        .then(response => response.blob())
        .then(blob => {
            // Hasilkan URL dari blob
            const url = URL.createObjectURL(blob);
            
            // Buka URL dalam window baru
            const newWindow = window.open(url, '_blank');
            
            // Tunggu 2 detik untuk memastikan URL sudah terbuka
            setTimeout(() => {
                // Cetak window baru
                newWindow.print();
            }, 2000);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
