$(document).ready(function() {
	let url = urlIndex.workPermit;

	let oTable = datatable(url, '#workPermitTable', true, 0, [
		{data: 'workPermitID', className: "align-middle user-select-all p-1"},
		{data: 'name', className: "align-middle user-select-all p-1"},
		{data: 'licenseDate', className: "align-middle user-select-all p-1"},
		{data: 'regarding', className: "align-middle user-select-all p-1"},
		{data: 'arrivalTime', className: "align-middle user-select-all p-1"},
		{data: 'returnTime', className: "align-middle user-select-all p-1"},
		{data: 'reason', className: "align-middle user-select-all p-1"},
		{data: 'description', className: "align-middle user-select-all p-1"},
		{data: 'toWorkpermit', className: "align-middle user-select-all p-1"},
		
		{data: 'statusLabel', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				console.log(`<span class="badge badge-danger>${val}</span>`);
				return `<span class="badge badge-workpermit-${val.toLowerCase()} w-75">${val}</span>`;
			}
		},
		{data: 'workPermitID', className: "align-middle user-select-all p-1", 
			render: function(val, row, data) {
				let hidden = data.statusLabel !== 'Aktif' ? 'd-none' : "";

				return `<div class="btn-group dropleft user-select-none ${hidden}">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-success finished-workpermit" href="#" data-id="${val}" data-text="${data.name}">
							<i class="far fa-check-circle"></i> Diizinkan
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger rejected-workpermit" href="#" data-id="${val}" data-text="${data.name}">
							<i class="fas fa-ban"></i> Ditolak
						</a>
					</div>
				</div>`;
			}
		},
	], function(data) {
		$('.finished-workpermit').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = 'Terima Surat Izin';
			let text = $(this).attr('data-text');

			confirm_popup({
				url: urlIndex.finishedWorkPermit,
				table: oTable,
				body: {
					id: id,
					text: `Memberikan izin "${text}"`,
					title: title,
				}
			});
		});
		
		$('.rejected-workpermit').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = 'Tolak Surat Izin';
			let text = $(this).attr('data-text');

			confirm_popup({
				url: urlIndex.rejectedWorkPermit,
				table: oTable,
				body: {
					id: id,
					text: `Tidak memberikan izin "${text}"`,
					title: title,
				}
			});
		});
	});
});