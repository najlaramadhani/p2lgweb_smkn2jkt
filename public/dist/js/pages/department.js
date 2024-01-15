let oTable = null;

$(document).ready(function () {
	positionList();
	departmentList();
	departmentDetail();
	positionDetail();
	colorPicker('.department-colorpicker', '.fa-square');
});

function positionList() {
	let url = urlIndex.position;

	oTable = datatable(url, '.position-table', true, 0, [
	{data: 'positionID', className: "align-middle user-select-all p-1"},
	{data: 'position', className: "align-middle user-select-all p-1"},
	{data: 'total', className: "align-middle user-select-all p-1"},
	{data: 'positionID', className: "align-middle user-select-all p-1",
		render: function (val, row, data) {
			return `<div class="btn-group dropleft user-select-none">
				<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Opsi
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item text-success" href="${baseURL}position/info/${val}">
						<i class="fas fa-check-circle"></i> Info
					</a>
					<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editjabatan" data-positionid="${data.positionID}" data-position="${data.position}">
						<i class="fas fa-edit"></i> Ubah Data
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-danger delete-position" href="#" data-id="${val}" data-title="${data.position}">
						<i class="fas fa-trash"></i> Hapus Data
					</a>
				</div>
			</div>`;
		}
	},
	], function(data) {
		$('.delete-position').off('click').on('click', function(event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deletePosition,
				table: oTable,
				body: {
					id: id, 
					title: title
				}
			});
		});
	});
}

function positionDetail() {
	let positionID = $('[name="positionID"]').val();
	let url = `${urlIndex.positionDetail}?positionID=${positionID}`;

	let oTable = datatable(url, '.positiondetail-table', true, 0, [
	{data: 'employeeID', className: "align-middle user-select-all p-1" },
	{data: 'name', className: "align-middle user-select-all p-1" },
	{data: 'position', className: "align-middle user-select-all p-1" },
	{data: 'department', className: "align-middle user-select-all p-1" },
	{data: 'employeeID', className: "align-middle user-select-all p-1",
		render: function (val, row, data) {
			return `<a class="btn btn-danger btn-xs mr-1 delete-employeeposition" data-id="${val}" data-title="${data.name}"><i class="fas fa-trash"></i></a>`;
		}
	},
	], function(data) {
		$('.delete-employeeposition').off('click').on('click', function(event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteEmployeePosition,
				table: oTable,
				body: {
					id: id, 
					title: title
				}
			});
		});
	});
}

$('[name="update-position"]').on('click', function(event) {
	let positionID = $('#editjabatan [name="positionID"]').val();
	let position = $('#editjabatan [name="position"]').val();
	console.log
	let body = {
		type: 'POST',
		url: urlIndex.updatePosition,
		data: JSON.stringify({
			position: position,
			positionID: positionID,
		}),
		callback: function (data) {
			notif(data, oTable);
		},
		error: function (data) {
			notif(data.responseJSON);
		}
	}

	requestAjax(body);
});

$('#editjabatan').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let positionid = button.data('positionid');
	let position = button.data('position');

	modal.find('.modal-body [name="position"]').val(position);
	modal.find('.modal-body [name="positionID"]').val(positionid);
});

function departmentList() {
	let url = urlIndex.department;

	let oTable = datatable(url, '.department-table', true, 0, [
	{data: 'departmentID', className: "align-middle user-select-all p-1" },
	{data: 'code', className: "align-middle user-select-all p-1" },
	{data: 'backgroundColor', className: "align-middle user-select-all p-1",
		render: function (val, row, data) {
			return `<i class="fas fa-square fa-2x" style="color: ${val}"></i>`
		}
	},
	{data: 'department', className: "align-middle user-select-all p-1" },
	{data: 'employeeTotal', className: "align-middle user-select-all p-1" },
	{data: 'departmentID', className: "align-middle user-select-all p-1",
		render: function (val, row, data) {
			return `<div class="btn-group dropleft user-select-none">
				<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Opsi
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item text-success" href="${baseURL}department/info/${val}">
						<i class="fas fa-check-circle"></i> Info
					</a>
					<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#edit_dp" data-departmentid="${data.departmentID}" data-code="${data.code}" data-department="${data.department}" data-backgroundcolor="${data.backgroundColor}">
						<i class="fas fa-edit"></i> Ubah Data
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-danger delete-department" href="#" data-id="${val}" data-title="${data.department}">
						<i class="fas fa-trash"></i> Hapus Data
					</a>
				</div>
			</div>`;
		}
	},
	], function(data) {
		$('.delete-department').off('click').on('click', function(event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteDepartment,
				table: oTable,
				body: {
					id: id, 
					title: title
				}
			});
		});
	});
}

function departmentDetail() {
	let departmentID = $('[name="departmentID"]').val();
	let url = `${urlIndex.departmentDetail}?departmentID=${departmentID}`;

	let oTable = datatable(url, '.departmentdetail-table', true, 0, [
	{data: 'employeeID', className: "align-middle user-select-all p-1" },
	{data: 'name', className: "align-middle user-select-all p-1" },
	{data: 'department', className: "align-middle user-select-all p-1" },
	{data: 'position', className: "align-middle user-select-all p-1" },
	{data: 'employeeID', className: "align-middle user-select-all p-1",
		render: function (val, row, data) {
			return `<a class="btn btn-danger btn-xs mr-1 delete-employeedepartment" data-id="${val}" data-title="${data.name}"><i class="fas fa-trash"></i></a>`;
		}
	},
	], function(data) {
		$('.delete-employeedepartment').off('click').on('click', function(event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteEmployeeDepartment,
				table: oTable,
				body: {
					id: id, 
					title: title
				}
			});
		});
	});
}

$('[name="update-department"]').on('click', function(event) {
	let departmentID = $('#edit_dp [name="departmentID"]').val();
	let code = $('#edit_dp [name="code"]').val();
	let department = $('#edit_dp [name="department"]').val();
	let backgroundColor = $('#edit_dp [name="backgroundColor"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.updateDepartment,
		data: JSON.stringify({
			code: code,
			department: department,
			departmentID: departmentID,
			backgroundColor: backgroundColor,
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

$('#edit_dp').on('show.bs.modal', function (event) {
	let modal = $(this);
	let button = $(event.relatedTarget);
	let departmentid = button.data('departmentid');
	let code = button.data('code');
	let department = button.data('department');
	let backgroundcolor = button.data('backgroundcolor');

	colorPicker('.department-colorpicker-edit', '.fa-square', {color: backgroundcolor});

	modal.find('.modal-body [name="code"]').val(code);
	modal.find('.modal-body [name="department"]').val(department);
	modal.find('.modal-body [name="departmentID"]').val(departmentid);
	modal.find('.modal-body [name="backgroundColor"]').val(backgroundcolor);
});