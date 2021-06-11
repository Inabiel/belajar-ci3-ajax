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
				let objData = JSON.parse(data);
				$('#tabel_barang').html(objData.konten)
				reload_event()
			},
			error: (jqXHR, textStatus, errorMsg) => {
				alert(`Errpr: ${errorMsg}`)
			}
		})
	}

	function reload_event(){
		$('.linkEditBarang').on('click', function(){
			var HashClean = this.hash.replace('#', '')
			loadMenu('<?= base_url('barang/form_edit/')?>'+HashClean);
		})
	}

	loadKonten('http://localhost/ci3-backend/barang/list_barang');
</script>
