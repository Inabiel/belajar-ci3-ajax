<!--Nabiel Izzullah Pansuri -- 19.01.4419-->
<div class="row">
	<div class="col-12">
		<div class="card div card-body">
			<div class="row">
				<div class="col-4">
					<button type="button" class="btn btn-outline-primary my-3" onclick="loadMenu('<?= base_url('barang/form_create') ?>')">Klik Untuk menambah barang</button>
				</div>
			</div>
			<h4>Ini adalah tampilan barang</h4>
			<div class="row py-4">
				<div class="col-md-3"><label>Nama Barang</label>
					<input type="text" name="cari_nama" class="form-control form-input-cari" id="cari_nama">
				</div>
				<div class="col-md-3"><label>Deskripsi</label>
					<input type="text" name="cari_desk" class="form-control form-input-cari" id="cari_desk">
				</div>
				<div class="col-md-3"><label>Maksimal Stok</label>
					<input type="number" name="cari_stok" class="form-control form-input-cari" id="cari_stok">
				</div>
				<div class="col-md-3">
				<br>
					<button class="btn btn-info mt-2" id="btn-cari" type="submit" onclick="cariData()">Cari</button>
				</div>
			</div>
			<table id="tabel_barang" class="table">
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	function loadKonten(url) {
		$.ajax(url, {
			type: 'GET',
			success: (data, status, xhr) => {
				var objData = JSON.parse(data);
				$('#tabel_barang').html(objData.konten);
				reload_event()
			},
			error: (jqXHR, textStatus, errorMsg) => {
				alert(`Errpr: ${errorMsg}`)
			}
		})
	}

	function reload_event() {
		$('.linkEditBarang').on('click', function() {
			var HashClean = this.hash.replace('#', '')
			loadMenu('<?= base_url('barang/form_edit/') ?>' + HashClean);
		})

		$('.linkHapusBarang').on('click', function() {
			var HashClean = this.hash.replace('#', '')
			hapusData(HashClean);
		})
	}

	function hapusData(id) {
		var url = 'http://localhost/ci3-backend/barang/soft_delete_data?id_barang=' + id

		$.ajax(url, {
			type: 'GET',
			success: (data, status, xhr) => {
				var objData = JSON.parse(data);
				alert(objData['pesan'])
				loadKonten('http://localhost/ci3-backend/barang/list_barang')
			},
			error: (jqXHR, textStatus, errorMsg) => {
				alert(`Errpr: ${errorMsg}`)
			}
		})
	}
	function cariData(){
		let link = 'http://localhost/ci3-backend/barang/cari_barang';
		let dataForm = {}
		let allInput = $('.form-input-cari')

		$.each(allInput, function(i, val) {
			dataForm[val['name']] = val['value'];
		})
		$.ajax(link, {
			type: 'POST',
			data: dataForm,
			success: function(data, status, xhr) {
				var objData = JSON.parse(data);
				$('#tabel_barang').html(objData.konten)
				reload_event()
			},
			error: function(jqXHR, textStatus, errorMsg) {
				alert('Error Nya Adalah: ' + errorMsg)
			}
		})
	}

	loadKonten('http://localhost/ci3-backend/barang/list_barang');
</script>
