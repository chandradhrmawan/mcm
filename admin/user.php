<h2>data user</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Nama 
			</th>
			<th>
				Username
			</th>
			<th>
				Email
			</th>
			<th>
				Telepon
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM user"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td>
				<a href="" class="btn btn-danger"><span class=" fa fa-trash"> Hapus</span></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
