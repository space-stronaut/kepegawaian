<!DOCTYPE html>
<html>
<head>
	<title>Laporan Hasil Kinerja Dapur</title>
</head>
<body>

	<div class="container">
		<center>
			<h4>Outstanding Request Report</h4>
            <p>Generated : {{now()}}</p>
            <p>Period : {{ $awal }} - {{$akhir}}</p>
		</center>
		
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Sub Kategori</th>
                    <th>Product</th>
					<th>Cabang</th>
                    <th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dapurs as $s)
				<tr>
					<td>
						{{$s->sub}}
					</td>
                    <td>
                        {{$s->nama}}
                    </td>
					<td>
						{{$s->nama_cabang}}
					</td>
                    <td>
                        {{$s->jumlah}}
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>