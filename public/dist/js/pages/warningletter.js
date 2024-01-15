

let employeeID = $('#employeeID').val();
let url = {
	warning_letter: `${baseURL}json/warning_letter`,
}

$(document).ready(function () {
	let url = urlIndex.warning_letter;

	datatable(url, '.warningletter-table', true, 0, [
		{ data: 'warningletterID', className: "align-middle user-select-all p-1" },
		{ data: 'name', className: "align-middle user-select-all p-1" },
		{ data: 'subject', className: "align-middle user-select-all p-1" },
		{ data: 'facingDate', className: "align-middle user-select-all p-1" },
		{ data: 'warning', className: "align-middle user-select-all p-1" },
		{ data: 'completionDate', className: "align-middle user-select-all p-1" },
		{
			data: 'upload', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let file = val ? `<a class="btn btn-info btn-xs mr-1 px-2" href="${val}" target="_blank"><i class="fas fa-file"></i> SP</a>` : "";
				return file;
			}
		},
		{
			data: 'warningletterID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-secondary" href="#" data-toggle="modal" data-target="#uploadWarningLetterFile" data-warningletterid="${val}">
						<i class="fas fa-file-upload"> </i> Upload Berkas
						</a>
						<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#sp_edit" data-warningletterid="${data.warningletterID}" data-name="${data.name}" data-warning="${data.warning}" data-facingdate="${data.facingDate}" data-subject="${data.subject}" data-completiondate="${data.completionDate}" data-employeeid="${data.employeeID}"><i class="fas fa-edit"></i> Edit Data</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-info" href="${baseURL}employee/detail/${data.employeeID}#warning"><i class="fas fa-folder-open"></i> Detil Karyawan</a>
					</div>
				</div>`;
			}
		},
	]);
});

$('[name="create-warningletter"]').on('click', function (event) {
	let employeeID = $('[name="employeeID"]').val();
	let warning = $('[name="warning"]').val();
	let facingDate = $('[name="facingDate"]').val();
	let subject = $('[name="subject"]').val();
	let completionDate = $('[name="completionDate"]').val();
	let upload = $('[name="upload"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.createWarningletter,
		data: JSON.stringify({
			employeeID: employeeID,
			warning: warning,
			facingDate: facingDate,
			subject: subject,
			completionDate: completionDate,
			upload: upload,
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

$('[name="update-warningletter"]').on('click', function (event) {
	let warningLetterID = $('#sp_edit [name="warningLetterID"]').val();
	let warning = $('#sp_edit [name="warning-edit"]').val();
	let facingDate = $('#sp_edit [name="facingDateEdit"]').val();
	let subject = $('#sp_edit [name="subject"]').val();
	let completionDate = $('#sp_edit [name="completionDateEdit"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.updateWarningletter,
		data: JSON.stringify({
			warningLetterID: warningLetterID,
			warning: warning,
			facingDate: facingDate,
			subject: subject,
			completionDate: completionDate,

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

$('#sp_edit').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let warningletterid = button.data('warningletterid');
	let name = button.data('name');
	let warning = button.data('warning');
	let facingdate = button.data('facingDateEdit');
	let subject = button.data('subject');
	let completiondate = button.data('completionDateEdit');
	let employeeid = button.data('employeeid');

	modal.find('.modal-body [name="name"]').val(name);
	modal.find('.modal-body [name="warning-edit"]').val(warning);
	modal.find('.modal-body [name="facingDate"]').val(facingdate);
	modal.find('.modal-body [name="subject"]').val(subject);
	modal.find('.modal-body [name="completionDate"]').val(completiondate);
	modal.find('.modal-body [name="warningLetterID"]').val(warningletterid);
});

$('#uploadWarningLetterFile').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let warningletterid = button.data('warningletterid');

	modal.find('.modal-body [name="warningLetterID"]').val(warningletterid);
});

$('#facingDate').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: moment(),
});

$('#completionDate').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: moment(),
});

$('#facingDateEdit').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: moment(),
});

$('#completionDateEdit').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: moment(),
});