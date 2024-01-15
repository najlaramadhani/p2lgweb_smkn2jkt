let employeeID = $('#employeeID').val();
let activeHash = window.location.hash;

$(document).ready(function () {
	employeeList();
	familyList(employeeID);
	educationList(employeeID);
	experienceList(employeeID);
	contractList(employeeID);
	warningList(employeeID);
	noteList(employeeID);
	attendenceList(employeeID);
	employeeNoteList(employeeID);
	workpermitEmployee(employeeID);
	showTab(activeHash);

	// DATE ADD FAMILY
	$('#birthDateFamily').datetimepicker({
		showTodayButton: true,
		format: "YYYY-MM-DD",
		date: $('[name="birthDateFamily"]').val(),
	});

	// DATE ADD CONTRACT
	$('#dateEntryContract').datetimepicker({
		showTodayButton: true,
		format: "YYYY-MM-DD",
		date: $('[name="dateEntryContract"]').val(),
	});

	$('#dateCompletedContract').datetimepicker({
		showTodayButton: true,
		format: "YYYY-MM-DD",
		date:  $('[name="dateCompletedContract"]').val(),
	});

	// DATE ADD EMPLOYEE
	$('#dateEntryEmployee').datetimepicker({
		showTodayButton: true,
		format: "YYYY-MM-DD",
		date: $('[name="dateEntryEmployee"]').val(),
	});

	$('#birthDateEmployee').datetimepicker({
		showTodayButton: true,
		format: "YYYY-MM-DD",
		date: $('[name="birthDateEmployee"]').val(),
	});
});

function employeeList() {
	let url = urlIndex.employee;

	let oTable = datatable(url, '.employee-table', true, 0, [
		{data: 'employeeID', className: "align-middle user-select-all p-1"},
		{data: 'identityNo', className: "align-middle user-select-all p-1"},
		{data: 'name', className: "align-middle user-select-all p-1"},
		{data: 'nickname', className: "align-middle user-select-all p-1"},
		{data: 'position', className: "align-middle user-select-all p-1"},
		{data: 'entryDate', className: "align-middle user-select-all p-1"},
		{data: 'department', className: "align-middle user-select-all p-1"},
		{data: 'employeeStatusType', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let lockStatus = data.lockStatus == 1 ? '<span class="badge badge-secondary"><i class="fas fa-lock"></i></span>' : '';
				return `<span class="badge employee-status" style="${data.css}">${val}</span> ${lockStatus}`;
			}
		},
		{data: 'status', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let status = val == 1 ? 'Aktif' : 'Tidak Aktif';
				let badge = val == 1 ? 'badge-success' : 'badge-danger';
				return `<span class="badge ${badge}">${status}</span>`;
			}
		},
		{data: 'employeeID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let lockStatus = data.lockStatus == 1 ? '<i class="fas fa-unlock"></i> Buka Data' : '<i class="fas fa-lock"></i> Kunci Data';
				
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-secondary" href="${baseURL}employee/detail/${val}">
							<i class="fas fa-folder-open"></i> Detail Karyawan
						</a>
						<a class="dropdown-item text-primary" href="${baseURL}employee/edit/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger delete-employee" href="#" data-id="${val}" data-title="${data.name}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
						<a class="dropdown-item text-danger lock-employee" href="#" data-id="${val}" data-title="${data.name}" data-lockstatus="${data.lockStatus}">
							${lockStatus}
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-employee').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteEmployee,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});

		$('.lock-employee').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');
			let lockStatus = $(this).attr('data-lockstatus');

			lock_popup({
				url: urlIndex.lockEmployee,
				table: oTable,
				body: {
					id: id,
					title: title,
					lockStatus: lockStatus,
				}
			});
		});
	});
}

function showTab(hash = "") {
	if (hash) {
		$(`.employee-tabs a[data-target="${hash}"]`).tab('show');
	}
}

function familyList(employeeID = 0) {
	let url = `${urlIndex.family}/${employeeID}`;

	let oTable = datatable(url, '.family-table', true, 0, [
		{data: 'familyID', className: "align-middle user-select-all p-1"},
		{data: 'name', className: "align-middle user-select-all p-1"},
		{data: 'birthDate', className: "align-middle user-select-all p-1"},
		{data: 'maritalStatus', className: "align-middle user-select-all p-1"},
		{data: 'education', className: "align-middle user-select-all p-1"},
		{data: 'profession', className: "align-middle user-select-all p-1"},
		{data: 'relationshipType', className: "align-middle user-select-all p-1"},
		{data: 'familyID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-primary" href="${baseURL}employee/family/edit/${employeeID}/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger delete-family" href="#" data-id="${val}" data-title="${data.name}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-family').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteFamily,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

function educationList(employeeID = 0) {
	let url = `${urlIndex.education}/${employeeID}`;

	let oTable = datatable(url, '.education-table ', true, 0, [
		{data: 'educationID', className: "align-middle user-select-all p-1"},
		{data: 'educationLevel', className: "align-middle user-select-all p-1"},
		{data: 'major', className: "align-middle user-select-all p-1"},
		{data: 'schoolName', className: "align-middle user-select-all p-1"},
		{data: 'yearGraduated', className: "align-middle user-select-all p-1"},
		{data: 'educationID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-primary" href="${baseURL}employee/education/edit/${employeeID}/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger delete-education" href="#" data-id="${val}" data-title="${data.educationLevel}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-education').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteEducation,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

function experienceList(employeeID = 0) {
	let url = `${urlIndex.experience}/${employeeID}`;

	let oTable = datatable(url, '.experience-table ', true, 0, [
		{data: 'experienceID', className: "align-middle user-select-all p-1"},
		{data: 'company', className: "align-middle user-select-all p-1"},
		{data: 'departmentEx', className: "align-middle user-select-all p-1"},
		{data: 'positionEx', className: "align-middle user-select-all p-1"},
		{data: 'period', className: "align-middle user-select-all p-1"},
		{data: 'experienceID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-primary" href="${baseURL}employee/experience/edit/${employeeID}/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger delete-experience" href="#" data-id="${val}" data-title="${data.company}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-experience').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteExperience,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

function contractList(employeeID = 0) {
	let url = `${urlIndex.contract}/${employeeID}`;

	let oTable = datatable(url, '.contract-table ', true, 0, [
		{data: 'contractID', className: "align-middle user-select-all p-1"},
		{data: 'employeeStatus', className: "align-middle user-select-all p-1"},
		{data: 'entryDate', className: "align-middle user-select-all p-1"},
		{data: 'contractType', className: "align-middle user-select-all p-1"},
		{data: 'completedDate', className: "align-middle user-select-all p-1"},
		{data: 'contractID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-primary" href="${baseURL}employee/contract/edit/${employeeID}/${val}">
							<i class="fas fa-edit"></i> Ubah Data
						</a>
						<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger delete-contract" href="#" data-id="${val}" data-title="${data.employeeStatus}">
								<i class="fas fa-trash"></i> Hapus Data
							</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-contract').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteContract,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}


function warningList(employeeID = 0) {
	let url = `${urlIndex.warning}/${employeeID}`;

	let oTable = datatable(url, '.warning-table ', true, 0, [
		{data: 'warningletterID', className: "align-middle user-select-all p-1"},
		{data: 'subject', className: "align-middle user-select-all p-1"},
		{data: 'facingDate', className: "align-middle user-select-all p-1"},
		{data: 'warning', className: "align-middle user-select-all p-1"},
		{data: 'completionDate', className: "align-middle user-select-all p-1"},
		{data: 'warningletterID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-danger delete-warning" href="#" data-id="${val}" data-title="${data.subject}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-warning').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteWarning,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

function employeeNoteList(employeeID = 0) {
	$('.note-list').html(`<span class="display-5 text-center">Tidak ada Catatan</span>`);

	let body = {
		type: 'GET',
		url: `${urlIndex.note}/${employeeID}`,
		data: "", 
		callback: function (data) {
			if (data) {
				let notes = '';
				let result = data.result;

				if (result.length > 0) {
					$.each(result, function (k, v) {
						let employeeID = v.employeeID;
						let note = v.note;
						let timestamp = v.timestamp;
						let name = v.name;

						notes += `<div class="col-4">
						<div class="card">
							<div class="card-body p-2 shadow rounded">
								<div class="d-flex justify-content-end">
								<span class="badge badge-dark" style="white-space:unset">${timestamp}</span>
								</div>
								<p class="text-muted">${note}</p>
							</div>
						</div>
						</div>`
					});

					$('.note-list').html(notes);
				} else {
					$('.note-list').html(`<span class="display-5 text-muted">Tidak ada Catatan</span>`);
				}
			}
		},
		error: function (data) { 
			$('.note-list').html(`<span class="display-5 text-center">Tidak ada Catatan</span>`);
		}
	}

	requestAjax(body);
};


$('[name="attendence-sync"]').on('click', function(event) {
	attendenceSync();
});

function attendenceSync() {
	let body = {
		type: 'GET',
		url: `${urlIndex.attendenceSync}`,
		data: "", 
		callback: function (data) {
			if (data) {
				let notes = '';
				let result = data.result;

				if (result.length > 0) {
					let data = {
						code: 200,
						status: true,
						description: 'success',
						message: 'Sinkronisasi data absensi berhasil',
					}

					notif(data, null);
				} else {
					let data = {
						code: 400,
						status: true,
						description: 'error',
						message: 'Sinkronisasi data absensi gagal',
					}

					notif(data, null);
				}
			}
		},
		error: function (data) { 
		}
	}

	requestAjax(body);
};


function noteList(employeeID = 0) {
	let url = `${urlIndex.note}/${employeeID}`;

	let oTable = datatable(url, '.note-table ', true, 0, [
		{data: 'noteID', className: "align-middle user-select-all p-1"},
		{data: 'name', className: "align-middle user-select-all p-1"},
		{data: 'note', className: "align-middle user-select-all p-1"},
		{data: 'timestamp', className: "align-middle user-select-all p-1"},
		{data: 'noteID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let hidden = data.employeeID > 0 ? "" : 'd-none';
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-primary ${hidden}" href="${baseURL}employee/detail/${data.employeeID}#note">
							<i class="fas fa-folder-open"></i> Detail Karyawan
						</a>
						<div class="dropdown-divider ${hidden}"></div>
						<a class="dropdown-item text-danger delete-note" href="#" data-id="${val}" data-title="${data.note}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-note').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteNote,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

function workpermitEmployee(employeeID = 0) {
	let url = `${urlIndex.workpermitEmployee}/${employeeID}`;

	let oTable = datatable(url, '.workpermit-table ', true, 0, [
		{data: 'workpermitID', className: "align-middle user-select-all p-1"},
		{data: 'licenseDate', className: "align-middle user-select-all p-1"},
		{data: 'regarding', className: "align-middle user-select-all p-1"},
		{data: 'reason', className: "align-middle user-select-all p-1"},
		{data: 'description', className: "align-middle user-select-all p-1"},
		{data: 'workpermitTo', className: "align-middle user-select-all p-1"},
		{
			data: 'uploadDoctorNote', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let doctornote = val ? `<a class="btn btn-info btn-xs mr-1 px-2" href="${baseURL}${val}" target="_blank"><i class="fas fa-file"></i> Surat</a>` : "";
				return doctornote;
			}
		},
		{data: 'workpermitID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<div class="btn-group dropleft user-select-none">
					<button type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opsi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item text-danger delete-work" href="#" data-id="${val}" data-title="${data.licenseDate}">
							<i class="fas fa-trash"></i> Hapus Data
						</a>
					</div>
				</div>`;
			}
		},
	], function (data) {
		$('.delete-work').off('click').on('click', function (event) {
			let id = $(this).attr('data-id');
			let title = $(this).attr('data-title');

			delete_popup({
				url: urlIndex.deleteWorkE,
				table: oTable,
				body: {
					id: id,
					title: title
				}
			});
		});
	});
}

$('[name="create-note"]').on('click', function (event) {
	let employeeID = $('[name="employeeID"]').val();
	let noteEmployee = $('[name="noteEmployee"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.createNote,
		data: JSON.stringify({
			employeeID: employeeID,
			noteEmployee: noteEmployee,
		}),
		callback: function (data) {
			notif(data, `${baseURL}/note`);
		},
		error: function (data) {
			notif(data.responseJSON);
		}
	}

	requestAjax(body);
});

$('[name="create-salary"]').on('click', function (event) {
	let basicSalary = $('[name="basicSalary"]').val();
	let employeeID = $('[name="employeeID"]').val();

	let body = {
		type: 'POST',
		url: urlIndex.createSalary,
		data: JSON.stringify({
			basicSalary: basicSalary,
			employeeID: employeeID,
		}),
		callback: function (data) {
			notif(data, `${baseURL}/employee/detail/${employeeID}#salary`);
		},
		error: function (data) {
			notif(data.responseJSON);
		}
	}

	requestAjax(body);
});

function attendenceList(employeeID = 0) {
	let url = `${urlIndex.attendenceList}?employeeID=${employeeID}`;

	datatable(url, '.absensi-table ', true, 0, [
		{data: 'attendenceID', className: "align-middle user-select-all p-1"},
		{data: 'cardID', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `EK${val}`;
			}	
		},
		{data: 'name', className: "align-middle user-select-all p-1"},
		{data: 'day', className: "align-middle user-select-all p-1"},
		{data: 'date', className: "align-middle user-select-all p-1"},
		{data: 'startTime', className: "align-middle user-select-all p-1"},
		{data: 'endTime', className: "align-middle user-select-all p-1"},
		{data: 'type', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<span class="badge attendence-${val.toLowerCase()}">${val}</span>`;
			}	
		},
		{data: 'status', className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				let clockOutBadge = val.clockOut.search('Belum') >= 0 ? 'attendence-clockout' : 'attendence-not-clockout';
				let clockIn = val.clockIn == "" ? "" : `<span class="badge attendence-clockin mr-2">${val.clockIn}</span>`;
				let clockOut = clockOutBadge == "attendence-clockout" ? "" : `<span class="badge ${clockOutBadge} mr-2">${val.clockOut}</span>`;

				return `${clockIn} ${clockOut}`;
			}
		},
		{data: null, className: "align-middle user-select-all p-1",
			render: function (val, row, data) {
				return `<a class="btn btn-secondary btn-xs mr-1"><i class="fas fa-exclamation"></i></a>`;
			}
		},
	]);
}

$('#daterange-btn').daterangepicker(
		{
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment(),
			endDate: moment()
		},
		function (start, end, ranges) {
			$('#daterange-btn span').html(ranges);
			$('#ranges').val(ranges);
			$('#fromdate').val(start.format('Y-MM-DD'));
			$('#todate').val(end.format('Y-MM-DD'));
		}
	);