let departmentStatisticsData = [];
let departmentStatisticsLabels = ['Departemen'];

$(document).ready(function() {
	dashboardSummary();
	departmentStatistics();
});

function dashboardSummary() {
	let employeeStatusCanvas = $('#employeeStatusCanvas').get(0).getContext('2d');
	let employeeStatusLabels = ['Karyawan'];
	let employeeStatusDatasets = {
		data: [100],
		backgroundColor : ['#F04B36'],
	};

	let employeeStatusData = {
		labels: employeeStatusLabels,
		datasets: [employeeStatusDatasets]
	};

	new Chart(employeeStatusCanvas, {
		type: 'doughnut',
		data: employeeStatusData,
		options: {
			maintainAspectRatio : false,
			responsive : true,
		}
	});

	let body = {
		type: 'GET',
		url: urlIndex.dashboardSummary,
		data: "", 
		callback: function (data) {
			if (data) {
				let result = data.result;

				if (result.length > 0) {
					$.each(result, function (k, v) {
						$('.total-women').html(v.totalWomen);
						$('.total-men').html(v.totalMen);
						$('.total-department').html(v.totalDepartment);
						$('.total-recruitment').html(v.totalRecruitment);
						employeeStatusLabels = [];
						employeeStatusDatasets.data = [];
						employeeStatusDatasets.backgroundColor = [];

						$.each(v.employeeStatus, function(key, val){
							employeeStatusLabels.push(val.employeeStatusType);
							employeeStatusDatasets.data.push(val.totalEmployeeStatus);
							employeeStatusDatasets.backgroundColor.push(val.backgroundColor);
						});
					});

					employeeStatusData = {
						labels: employeeStatusLabels,
						datasets: [employeeStatusDatasets]
					};

					new Chart(employeeStatusCanvas, {
						type: 'doughnut',
						data: employeeStatusData,
						options: {
							maintainAspectRatio : false,
							responsive : true,
						}
					});
				}
			}
		},
		error: function (data) { 
		}
	};

	requestAjax(body);
};

function departmentStatistics() {
	let body = {
		type: 'GET',
		url: urlIndex.department,
		data: "", 
		callback: function (data) {;
			console.log(data)
			if (data) {
				let result = data.result;

				if (result.length > 0) {
					$.each(result, function (k, v) {
						let departmentID = v.departmentID;
						let code = v.code;
						let department = v.department;
						let employeeTotal = v.employeeTotal;
						let backgroundColor = v.backgroundColor;
						
						departmentStatisticsData.push({
							label: department,
							backgroundColor: backgroundColor,
							borderColor: backgroundColor,
							pointRadius: false,
							pointColor: '#3b8bba',
							pointStrokeColor: 'rgba(60,141,188,1)',
							pointHighlightFill: '#fff',
							pointHighlightStroke: 'rgba(60,141,188,1)',
							data: [employeeTotal]
						});
					});
				}
				
				let departmentStatisticsCanvas = $('#barChart').get(0).getContext('2d');
				new Chart(departmentStatisticsCanvas, {
					type: 'bar',
					data: {
						labels  : departmentStatisticsLabels,
						datasets: departmentStatisticsData
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						datasetFill: false
					}
				});
			}
		},
		error: function (data) { 
		}
	};

	requestAjax(body);
};