$(document).ready(function () {
	let url = urlIndex.requestForm;
	
	let oTable = datatable(url, '.requestForm-table', true, 0, [
		{ data: 'requestformID', className: "align-middle user-select-all p-1" },
		{ data: 'position', className: "align-middle user-select-all p-1" },
		{ data: 'jobsite', className: "align-middle user-select-all p-1" },
		{ data: 'dateofFiling', className: "align-middle user-select-all p-1" },
		{ data: 'dateRequired', className: "align-middle user-select-all p-1" },
		{ data: 'condition', className: "align-middle user-select-all p-1" },
		{ data: 'reasonforRequest', className: "align-middle user-select-all p-1" },
		{data: 'statusLabel', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				console.log(`<span class="badge badge-danger>${val}</span>`);
				return `<span class="badge badge-formrequest-${val.toLowerCase()} w-75">${val}</span>`;
			}
		},
		{data: 'requestformID', className: "align-middle user-select-all p-1", 
			render: function(val, row, data) {
				let hidden = data.statusLabel !== 'Aktif' ? 'd-none' : "";

				return `<div class="btn-group dropleft user-select-none ${hidden}">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-success finished-formrequest" href="#" data-id="${val}" data-text="${data.position}">
							<i class="far fa-check-circle"></i> Diterima
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger rejected-formrequest" href="#" data-id="${val}" data-text="${data.position}">
							<i class="fas fa-ban"></i> Ditolak
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.finished-formrequest').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = 'Terima Surat Pengajuan';
			let text = $(this).attr('data-text');

			confirm_popup({
				url: urlIndex.finishedFormRequest,
				table: oTable,
				body: {
					id: id,
					text: `Menerima Pengajuan "${text}"`,
					title: title,
				}
			});
		});
		$('.rejected-formrequest').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = 'Tolak Surat Pengajuan';
			let text = $(this).attr('data-text');

			confirm_popup({
				url: urlIndex.rejectedFormRequest,
				table: oTable,
				body: {
					id: id,
					text: `Tidak Menerima Pengajuan "${text}"`,
					title: title,
				}
			});
		});
	});
});