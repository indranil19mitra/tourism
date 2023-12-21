$(document).ready(function () {
	$("#state_details_sbmt").hide();
	// $(".slct_cls").select2();
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

	$("#place_details_sbmt").click(function () {
		var formData = new FormData($("#place_details")[0]);
		$.ajax({
			type: "POST",
			url: baseurl + "place_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				console.log(res);
				if (res.status != 103) {
					window.location.href = baseurl + "place";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_category_details_sbmt").click(function () {
		var formData = new FormData($("#tour_category_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "tour_category_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tour_category";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_details_sbmt").click(function () {
		var formData = new FormData($("#tour_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "tour_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tours";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#destination_details_sbmt").click(function () {
		var formData = new FormData($("#destination_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "destination_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tour_destination";
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
			url: baseurl + (types == "edit" ? "edit_state_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				console.log(res);
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

function placeFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_place_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#place").val(res.data.name);
						$("#state").val(res.data.state).trigger("change");
						$("#status").val(res.data.status).trigger("change");
						$("#place_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "place";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_categoryFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl + (types == "edit" ? "edit_tour_category_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#category_name").val(res.data.name);
						$("#status").val(res.data.status).trigger("change");
						$("#place_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "place";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tour_name").val(res.data.name);
						$("#place").val(res.data.place_id).trigger("change");
						$("#tour_category")
							.val(res.data.tour_category_id)
							.trigger("change");
						$("#status").val(res.data.status).trigger("change");

						displayExistingImage(baseurl_data + res.data.main_image);

						$("#tour_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tours";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourDestFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_dest_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						$("#created_at").val(res.data.created_at);
						$("#disc_percent").val(
							res.data.is_discount != "" && res.data.is_discount == "1"
								? res.data.disc_percent
								: 0
						);
						$("#drop_location").val(res.data.drop_location);
						$("#pikup_location").val(res.data.pikup_location);
						$("#duration").val(res.data.duration);
						$("#price").val(res.data.price);
						$("#start_date").val(res.data.start_date);
						$("#end_date").val(res.data.end_date);
						$("#tourabout").text(res.data.tour_about);

						if (res.data.is_discount != "" && res.data.is_discount == "1") {
							$("#is_discount").prop("checked", true);
							$("#is_discount").attr("value", "1");
							$("#disc_percent").show();
						} else {
							$("#is_discount").removeAttr("checked");
							$("#is_discount").attr("value", "0");
							$("#disc_percent").hide();
						}
						$("#status").val(res.data.status).trigger("change");

						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tours";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function displayExistingImage(imageUrl) {
	$("#preview_tour_image").attr("src", imageUrl);
}

function resetFun() {
	$(".clr").val("");
	$("#status").val("").trigger("change");
}

function tourResetFun() {
	$("#place").val("").trigger("change");
	$("#tour_category").val("").trigger("change");
	$("#disc_percent").hide();
	resetFun();
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

document
	.getElementById("tour_image")
	.addEventListener("change", function (event) {
		const file = event.target.files[0];

		if (file) {
			const reader = new FileReader();

			reader.onload = function (e) {
				document.getElementById("preview_tour_image").src = e.target.result;
				document.getElementById("preview_tour_image").style.display = "block";
			};

			reader.readAsDataURL(file);
		}
	});

function getCheck(obj) {
	var id = $(obj).attr("id");
	if ($("#" + id).is(":checked")) {
		$("#" + id).attr("value", "1");
		$("#disc_percent").show();
	} else {
		$("#" + id).attr("value", "0");
		$("#disc_percent").hide();
	}
	$("#disc_percent").val("");
}
