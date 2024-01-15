$(document).ready(function () {
	announcementList();
	responseList();
	responseDetail();
});

function announcementList() {
	let url = urlIndex.announcement;

	let oTable = datatable(url, '.announcement-table', true, 0, [
		{data: 'announcementID', className: "align-middle user-select-all p-1" },
		{data: 'title', className: "align-middle user-select-all p-1" },
		{data: 'date', className: "align-middle user-select-all p-1" },
		{data: 'position', className: "align-middle user-select-all p-1" },
		{data: 'department', className: "align-middle user-select-all p-1" },
		{data: 'statusLabel', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<span class="badge badge-announce-${val.toLowerCase()}">${val}</span>`;
			}
		},
		{data: 'timestamp', className: "align-middle user-select-all p-1" },
		{data: 'announcementID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let finished = data.statusLabel == 'Selesai' ? 'd-none' : "";

				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-success ${finished} finished-announcement" href="#" data-id="${val}" data-text="${data.title}">
							<i class="fas fa-check-circle"></i> Selesai
						</a>
						<a class="dropdown-item text-primary ${finished}" href="${baseURL}home/announcement/edit/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<a class="dropdown-item text-secondary" href="${baseURL}home/announcement/response?departmentID=${data.departmentID}&positionID=${data.positionID}&announcementID=${data.announcementID}">
							<i class="fas fa-info-circle"></i> Responden
						</a>
						<div class="dropdown-divider ${finished}"></div>
						<a class="dropdown-item text-danger ${finished} delete-announcement" href="#" data-id="${val}" data-title="${data.title}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-announcement').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteAnnouncement,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});

		$('.finished-announcement').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = 'Tandai selesai';
			let text = $(this).attr('data-text');

			confirm_popup({
				url: urlIndex.finishedAnnouncement,
				table: oTable,
				body: {
					id: id,
					text: `pengumuman "${text}" telah selesai`,
					title: title,
				}
			});
		});
	});
}

function responseList() {
	let announcementID = $('[name="announcementID"]').val();
	let departmentID = $('[name="departmentID"]').val();
	let positionID = $('[name="positionID"]').val();

	let url = `${urlIndex.response}?departmentID=${departmentID}&positionID=${positionID}&announcementID=${announcementID}`;

	datatable(url, '.response-table', true, 0, [
		{data: 'responseID', className: "align-middle user-select-all p-1" },
		{data: 'timestamp', className: "align-middle user-select-all p-1" },
		{data: 'employeeID', className: "align-middle user-select-all p-1" },
		{data: 'name', className: "align-middle user-select-all p-1" },
		{data: 'response', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let response = responseBadge(val);
				return response;
			}
		},
	]);
}

function responseDetail() {
	let announcementID = $('[name="announcementID"]').val();
	let departmentID = $('[name="departmentID"]').val();
	let positionID = $('[name="positionID"]').val();

	let url = `${urlIndex.responseDetail}?departmentID=${departmentID}&positionID=${positionID}&announcementID=${announcementID}`;

	let body = {
		type: 'GET',
		url: url,
		data: null,
		callback: function (data) {
			if (data) {
				let detail = data.result[0].detail;
				let attendance = data.result[0].attendance;

				$('.announcement-title').html(detail.title);
				$('.announcement-department').html(detail.department);
				$('.announcement-position').html(detail.position);
				$('.announcement-totalEmployee').html(attendance.totalEmployee);
				$('.announcement-attendance').html(attendance.attendance);
				$('.announcement-absence').html(attendance.absence);
				$('.announcement-notResponse').html(attendance.notResponse);
			}
		},
		error: function (data) {
		}
	}

	requestAjax(body);
}

$('#announcementDate').datetimepicker({
	showTodayButton: true,
	format: "YYYY-MM-DD HH:mm:ss",
	date: $('[name="announcementDate"]').val(),
});

$('[name="create-announcement"]').on('click', function (event) {
	let title = $('[name="title"]').val();
	let departmentID = $('[name="departmentID"]').val();
	let positionID = $('[name="positionID"]').val();
	let announcementDate = $('[name="announcementDate"]').val();
	let description = $('[name="description"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.createAnnouncement,
		data: JSON.stringify({
			title: title,
			departmentID: departmentID,
			positionID: positionID,
			announcementDate: announcementDate,
			description: description,
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