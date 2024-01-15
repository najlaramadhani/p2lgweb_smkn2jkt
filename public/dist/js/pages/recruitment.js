$(document).ready(function () {
	let url = urlIndex.recruitment;

	let oTable = datatable(url, '#recruitmentTable', true, 0, [
		{ data: 'recruitmentID', className: "align-middle user-select-all p-1" },
		{ data: 'date', className: "align-middle user-select-all p-1" },
		{ data: 'name', className: "align-middle user-select-all p-1" },
		{ data: 'email', className: "align-middle user-select-all p-1" },
		{ data: 'phone', className: "align-middle user-select-all p-1" },
		{ data: 'department', className: "align-middle user-select-all p-1" },
		{ data: 'biCheckingRate', className: "align-middle user-select-all p-1" },
		{
			data: 'uploadCv', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let cv = val ? `<a class="btn btn-info btn-xs mr-1 px-2" href="${val}" target="_blank"><i class="fas fa-file"></i> CV</a>` : "";
				return cv;
			}
		},
		{
			data: 'type', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<a class="btn btn-info btn-xs mr-1" href="" data-toggle="modal" data-target="#statusrekrutmen" data-recruitmentid="${data.recruitmentID}" data-recruitmentstatusid="${data.recruitmentStatusID}">${data.type}
				</a>`;
			}
		},
		{
			data: 'recruitmentID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
				<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item text-success" href="https://wa.me/${data.phone}" target="_blank"><i class="fab fa-whatsapp"></i> Kirim Whatsapp</a>
					<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#email" data-recruitmentid="${data.recruitmentID}" data-name="${data.name}" data-date="${data.date}" data-email="${data.email}" data-phone="${data.phone}" data-departmentid="${data.departmentID}" data-department="${data.department}"><i class="fas fa-envelope"></i> Kirim Email</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-danger delete-recruitment" href="#" data-id="${val}" data-title="${data.name}"><i class="fas fa-trash"></i> Hapus Data</a>
				</div>
				</div>`;
			},
		}
	], function (data) {
		$('.delete-recruitment').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteRecruitment,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
});

$('[name="update-statusrecruitment"]').on('click', function (event) {
	let recruitmentID = $('#statusrekrutmen [name="recruitmentID"]').val();
	let recruitmentStatusID = $('#statusrekrutmen [name="recruitmentStatusID"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.updateRecruitment,
		data: JSON.stringify({
			recruitmentID: recruitmentID,
			recruitmentStatusID: recruitmentStatusID,
		}),
		callback: function (data) {
			notif(data);
		},
		error: function (data) {
			notif(data.responseJSON);
		}
	}

	requestAjax(body);
});


$('#statusrekrutmen').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let recruitmentid = button.data('recruitmentid');
	let recruitmentStatusID = button.data('recruitmentstatusid');

	modal.find('.modal-body [name="recruitmentID"]').val(recruitmentid);
	modal.find('.modal-body [name="recruitmentStatusID"]').val(recruitmentStatusID);
});

$('#email').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let recruitmentid = button.data('recruitmentid');
	let date = button.data('date');
	let name = button.data('name');
	let email = button.data('email');
	let phone = button.data('phone');
	let departmentid = button.data('departmentid');
	let department = button.data('department');

	modal.find('.modal-body [name="date"]').val(date);
	modal.find('.modal-body [name="name"]').val(name);
	modal.find('.modal-body [name="email"]').val(email);
	modal.find('.modal-body [name="phone"]').val(phone);
	modal.find('.modal-body [name="department"]').val(department);
	modal.find('.modal-body [name="recruitmentID"]').val(recruitmentid);

});

$('#date').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: moment(),
});