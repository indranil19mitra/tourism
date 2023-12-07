$(document).ready(function () {
	$("#state_details_sbmt").hide();
	$("#submitForm").click(function () {
		var formData = new FormData($("#login_form")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "auth_login",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res);
				if (res.status != "101") {
					$("#err_msg").html(res.msg);
				} else {
					$("#err_msg").html("");
					window.location.href = baseurl;
				}
			},
		});
	});

	$("#state_details_sbmt").click(function () {
		var formData = new FormData($("#state_details")[0]);
		$.ajax({
			type: "POST",
			url: baseurl + "state_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res);
				if (res.status != 103) {
					window.location.href = baseurl + "state";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});
});

function stateFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#state").val(res.data.name);
						$("#status").val(res.data.status).trigger("change");
						$("#state_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "state";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function resetFun() {
	$(".clr").val("");
	$("#status").val("").trigger("change");
}

function isExist(val = "", table = "") {
	var eid = $("#eid").val();
	$.ajax({
		type: "post",
		url: baseurl + "checkisExist",
		data: { val: val, checked_table: table, eid: eid },
		dataType: "json",
		success: function (res) {
			console.log(res);
			if (val != "") {
				if (res.status != 101) {
					errorToster("State Already Exist!");
					$("#state_details_sbmt").hide();
				} else {
					successToster("State Is Available!");
					$("#state_details_sbmt").show();
				}
			} else {
				$("#state_details_sbmt").hide();
			}
		},
	});
}

function errorToster(text_data = "") {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	Toast.fire({
		icon: "error",
		title: "Sorry!",
		text: text_data,
	});
}

function successToster(text_data = "") {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	Toast.fire({
		icon: "success",
		// title: 'Sorry!',
		text: text_data,
	});
}
