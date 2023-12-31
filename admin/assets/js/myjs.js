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

	$("#tour_about_details_sbmt").click(function () {
		// Trigger TinyMCE to update the original textarea
		// tinymce.triggerSave();
		tinymce.triggerSave("tour_about_details");

		// Create a FormData object from the form with the id "tour_about_details"
		var formData = new FormData($("#tour_about_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_about_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_about";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_itinerary_details_sbmt").click(function () {
		var formData = new FormData($("#tour_itinerary_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_itinerary_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_itinerary";
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
						$("#difficulty").val(res.data.difficulty);
						if (res.data.seat_availability != 0) {
							$("#seat_availability").val(res.data.seat_availability);
						}
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
						$("#duration").prop("readonly", true);
						$("#price").val(res.data.price);
						$("#start_date").val(res.data.start_date);
						$("#end_date").val(res.data.end_date);

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

function tour_aboutFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_about_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.id).trigger("change");
						tinymce
							.get("tour_about_details_text")
							.setContent(res.data.tour_about_details);
						$("#status").val(res.data.status).trigger("change");

						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_about";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_itineraryFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "edit_tour_itinerary_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.id).trigger("change");
						$("#status").val(res.data.status).trigger("change");
						$("#itinerary_question_0").val(res.data.itinerary);
						$("#itinerary_answer_0").val(res.data.itinerary_sub);
						$("#add_itinerary").hide();
						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_itinerary";
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
	$("#add_itinerary").show();
	resetFun();
}

function tourDetailsResetFun() {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, "0");
	var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
	var yyyy = today.getFullYear();

	today = yyyy + "-" + mm + "-" + dd;
	// console.log(today);

	$("#end_date").attr("min", today);
	$("#start_date").attr("min", today);
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

// document.getElementById("tour_image").addEventListener("change", function (event) {
// 		const file = event.target.files[0];

// 		if (file) {
// 			const reader = new FileReader();

// 			reader.onload = function (e) {
// 				document.getElementById("preview_tour_image").src = e.target.result;
// 				document.getElementById("preview_tour_image").style.display = "block";
// 			};

// 			reader.readAsDataURL(file);
// 		}
// 	});

document.addEventListener("DOMContentLoaded", function () {
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

function set_date(date = "", type = "") {
	if (type == "start_date") {
		if ($("#end_date").val() < date) {
			$("#end_date").val("");
		}
		$("#end_date").attr("min", date);
	}
	if (type == "end_date") {
		if ($("#start_date").val() > date) {
			$("#start_date").val("");
		}
		$("#start_date").attr("max", date);
	}

	if ($("#start_date").val() != "" && $("#end_date").val() != "") {
		var ttl_days = getNumberOfDays(
			$("#start_date").val(),
			$("#end_date").val()
		);
		$("#duration").val(ttl_days + " days");
		$("#duration").prop("readonly", true);
	}
}

function getNumberOfDays(start, end) {
	const date1 = new Date(start);
	const date2 = new Date(end);

	// One day in milliseconds
	const oneDay = 1000 * 60 * 60 * 24;

	// Calculating the time difference between two dates
	const diffInTime = date2.getTime() - date1.getTime();

	// Calculating the no. of days between two dates
	const diffInDays = Math.round(diffInTime / oneDay);

	return diffInDays + 1;
}

tinymce.init({
	selector: "textarea#tour_about_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

function get_itinerary_form() {
	var lngt = $("#itinerary_data").children().length + 2;
	console.log(lngt);
	var html =
		'<div class="border rounded border-2 p-3 mb-3 col-lg-12 col-md-12 col-sm-12">';
	html += '<div class="mb-3 form-floating">';
	html +=
		'<textarea class="form-control" placeholder="Leave a question here" id="itinerary_question_' +
		lngt +
		'" name="itinerary_question[]"></textarea><label for="floatingTextarea2">Itinerary Question ' +
		lngt +
		"</label>";
	html += "</div>";
	html += '<div class="form-floating">';
	html +=
		'<textarea class="form-control" placeholder="Leave a question here" id="itinerary_answer_' +
		lngt +
		'" name="itinerary_answer[]"></textarea><label for="floatingTextarea2">Itinerary Answer ' +
		lngt +
		"</label>";
	html += "</div></div>";

	$("#itinerary_data").append(html);
}
