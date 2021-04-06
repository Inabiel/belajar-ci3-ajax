<div class="row">
	<div class="col-12">
		<div class="card div card-body">
			<h4>Ini adalah tampilan barang</h4>
			<table id="tabel_barang" class="table">
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
function loadKonten(url){
	$.ajax(url,{
		type:'GET',
		success:(data, status, xhr)=>{
			let objData = JSON.parse(data);
			$('#tabel_barang').html(objData.konten)
		},
		error:(jqXHR, textStatus, errorMsg)=>{
			alert(`Errpr: ${errorMsg}`)
		}
	})
}
loadKonten('http://localhost/backend/Barang/list_barang')
</script>
