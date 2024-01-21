$(document).ready(function () {
	$("#itinerary_details").hide();
	$("#dates_and_costing").hide();
	$("#other_info").hide();
});
var bookingMemberCount = 0;
function tourGetOnDates(date = "") {
	window.location.href = baseurl + "?dts=" + date;
}

function getDetails(dtl_nm = "", ids = "") {
	window.location.href =
		baseurl + "get-Details?dtl_nm=" + dtl_nm + "&ids=" + ids;
}

function get_itinerary() {
	$("#itinerary_details").show();
	$("#about_details").hide();
	$("#dates_and_costing").hide();
	$("#other_info").hide();
}

function get_other_info() {
	$("#about_details").hide();
	$("#itinerary_details").hide();
	$("#dates_and_costing").hide();
	$("#other_info").show();
}

function get_dates_costing(tour_details_id = "", tour_ids = "") {
	// console.log(tour_details_id, tour_ids);
	// console.log(baseurl);
	var url = baseurl + "Mycontroller/get_months_tour_wise";
	$.ajax({
		url: url,
		type: "POST",
		data: {
			tour_details_id: tour_details_id,
			tour_ids: tour_ids,
		},
		dataType: "json",
		success: function (res) {
			console.log(res);
			if (res.status == 101) {
				var index_1st = "";
				var html = "<div class='d-flex justify-content-start'>";
				$.each(res.data.get_tour_schduled_month, function (key, value) {
					const originalDate = new Date(value.formatted_date);
					const monthNames = [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"May",
						"Jun",
						"Jul",
						"Aug",
						"Sep",
						"Oct",
						"Nov",
						"Dec",
					];

					// ---- month with year format code start ----
					// const formattedDate = `${
					// 	monthNames[originalDate.getMonth()]
					// } '${originalDate.getFullYear().toString().substr(2)}`;
					// ---- month with year format code end ----

					const formattedDate = `${monthNames[originalDate.getMonth()]} `;

					if (key != 0) {
						html +=
							'<a type="button" id="scduled_mnth_' +
							value.tour_details_id +
							'" class="btn scdl_mnth scdl_mnth_hvr mx-2" onclick="get_schedule_dates(\'' +
							value.tours_id +
							"','" +
							value.start_date +
							"','" +
							value.tour_details_id +
							"')\" >" +
							formattedDate +
							"</a>";
					} else {
						html +=
							'<a type="button" id="scduled_mnth_' +
							value.tour_details_id +
							'" class="btn scdl_mnth_1 scdl_mnth scdl_mnth_hvr mx-2" onclick="get_schedule_dates(\'' +
							value.tours_id +
							"','" +
							value.start_date +
							"','" +
							value.tour_details_id +
							"')\" >" +
							formattedDate +
							"</a>";

						get_schedule_dates(
							value.tours_id,
							value.start_date,
							value.tour_details_id
						);
					}
				});

				html += "</div>";

				$("#dates_and_costing").show();
				$("#scheduled_months").html(html);
				$("#about_details").hide();
				$("#itinerary_details").hide();
				$("#other_info").hide();
				// console.log(index_1st);
				if (index_1st != "") {
					$("#" + index_1st).click();
				}
			} else {
				$("#dates_and_costing").hide();
			}
		},
	});
}

function get_schedule_dates(
	tour_ids = "",
	start_dates = "",
	tour_details_id = ""
) {
	console.log(tour_ids, start_dates, tour_details_id);

	$(".scdl_mnth").removeClass("scdl_mnth_1");
	$("#scduled_mnth_" + tour_details_id).addClass("scdl_mnth_1");
	// console.log(this);

	var url = baseurl + "Mycontroller/get_dates_tour_month_wise";
	$.ajax({
		url: url,
		type: "POST",
		data: {
			tour_ids: tour_ids,
			tour_details_id: tour_details_id,
			start_dates: start_dates,
		},
		dataType: "json",
		success: function (res) {
			console.log(res);
			if (res.status == 101) {
				var index_1st = "";
				var html =
					// "<div class='d-flex justify-content-between mnt_wish_dt_div'>";
					"<div class='mnt_wish_dt_div'>";

				$.each(res.data.get_tour_schduled_month, function (key, val) {
					const formattedStartDate = formatDate(val.start_date);
					const formattedEndDate = formatDate(val.end_date);
					html +=
						"<div class='col-lg-6 col-md-6 col-sm-12 mnt_wish_dt'>" +
						formattedStartDate +
						" - " +
						formattedEndDate +
						"</div>";
				});
				html += "</div>";

				$("#scheduled_dates_month_wise").html(html);

				$("#tour_price_month_wise").html(
					res.data.get_tour_schduled_month[0].price
				);
			}
		},
	});
}

function get_book(tour_details_id = "", tour_ids = "") {
	var url = baseurl + "Mycontroller/get_months_tour_wise";
	bookingMemberCount = 0;
	$.ajax({
		url: url,
		type: "POST",
		data: {
			tour_details_id: tour_details_id,
			tour_ids: tour_ids,
		},
		dataType: "json",
		success: function (res) {
			console.log(res);
			if (res.status == 101) {
				var html =
					'<option value="" disabled selected>--Please Select Months--</option>';
				$.each(res.data.get_tour_schduled_month, function (key, value) {
					const originalDate = new Date(value.formatted_date);
					const monthNames = [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"May",
						"Jun",
						"Jul",
						"Aug",
						"Sep",
						"Oct",
						"Nov",
						"Dec",
					];

					const formattedDate = `${monthNames[originalDate.getMonth()]} `;

					html +=
						'<option value="' +
						value.tour_details_id +
						'">' +
						formattedDate +
						"</option>";
				});

				html += "</div>";

				$("#dates_and_costing").hide();
				$("#about_details").hide();
				$("#itinerary_details").hide();
				$("#other_info").hide();
				$("#tour_months").html(html);

				$(".back_to_initial_back").attr("id", "tour_booking_details_back_1");
				$(".back_to_initial_next").attr("id", "tour_booking_details_next_1");
				$(".clr_input").html("");
				$("#book_now_modal_header_title").html(
					"PLEASE SELECT YOUR BATCH DATES"
				);

				$(".change_booking_mdl").removeClass("modal-xl");
				$(".change_booking_mdl").addClass("modal-lg");

				$("#tour_booking_details_back_1").hide();
				$("#tour_booking_details_next_1").hide();
				$("#tour_booking_details_next_1").html("NEXT");
				$("#room_sharing").hide();
				$("#personal_details").hide();
				$("#review_booking").hide();
				$("#plase_select_your_batch_dates").show();

				// booking buttons start

				$("#booking_member_count").html(0);
				// $("#tour_booking_details_back_1").hide();
				// $("#plase_select_your_batch_dates").show();
				// $("#room_sharing").hide();
				// $("#personal_details").hide();
				// $("#review_booking").hide();
				$(".change_booking_mdl").addClass("modal-lg");
				$("#get_booking_dates").html("");
				// booking buttons end

				// Add onchange event handler to the select element
				$("#tour_months").on("change", function () {
					var selectedTourDetailsId = $(this).val();
					if (selectedTourDetailsId) {
						// Retrieve the additional parameters from the selected option
						var selectedOption = res.data.get_tour_schduled_month.find(
							(option) => option.tour_details_id == selectedTourDetailsId
						);
						var toursId = selectedOption.tours_id;
						var startDate = selectedOption.start_date;

						// Call the function with the selected values

						get_book_schedule_dates(toursId, startDate, selectedTourDetailsId);
					}
				});
			}
		},
	});
}

function get_book_schedule_dates(
	tour_ids = "",
	start_dates = "",
	tour_details_id = ""
) {
	console.log(tour_ids, start_dates, tour_details_id);

	$(".scdl_mnth").removeClass("scdl_mnth_1");
	$("#scduled_mnth_" + tour_details_id).addClass("scdl_mnth_1");
	// console.log(this);

	var url = baseurl + "Mycontroller/get_dates_tour_month_wise";
	$.ajax({
		url: url,
		type: "POST",
		data: {
			tour_ids: tour_ids,
			tour_details_id: tour_details_id,
			start_dates: start_dates,
		},
		dataType: "json",
		success: function (res) {
			console.log(res);
			if (res.status == 101) {
				var html = "<div class='row d-flex justify-content-between'>";

				$.each(res.data.get_tour_schduled_month, function (key, val) {
					const formattedStartDate = formatDate(val.start_date);
					const formattedEndDate = formatDate(val.end_date);

					html +=
						"<div class='d-flex justify-content-between border border-rounded p-1 my-1 col-lg-12 col-md-12 col-sm-12 outer_dv1' onclick='check_date_function(" +
						val.tour_details_id +
						"," +
						val.tours_id +
						")'><div class='outer_dv2 outer_dv2_1'><div class='d-flex justify-content-start'><div class='outer_dv3'>Start Date:</div><div class='ps-2 text-center outer_dv4'>" +
						formattedStartDate +
						"</div></div><br><div class='d-flex justify-content-start'><div class='outer_dv3'>End Date:</div><div class='ps-2 text-center outer_dv4'>" +
						formattedEndDate +
						"</div></div></div><div class='form-check align-middle'><input class='ms-1 form-check-input outer_dv5' value='0' type='checkbox' id='flexCheckDefault_" +
						val.tour_details_id +
						"'></div></div>";
				});
				html += "</div>";

				$("#get_booking_dates").html(html);

				$("#tour_booking_details_back_1").hide();
				$("#tour_booking_details_next_1").hide();
				$("#room_sharing").hide();
				$("#personal_details").hide();
				$("#review_booking").hide();
				// $("#tour_price_month_wise").html(
				// 	res.data.get_tour_schduled_month[0].price
				// );
			}
		},
	});
}

function formatDate(inputDate) {
	const date = new Date(inputDate);
	const options = { day: "2-digit", month: "short", year: "numeric" };
	return date
		.toLocaleDateString("en-US", options)
		.replace(/(\d+) (\w+) (\d+)/, "$1-$2-$3");
}
// function formatDate(inputDate) {
// 	const date = new Date(inputDate);
// 	const options = { day: "2-digit", month: "short", year: "numeric" };
// 	return date.toLocaleDateString("en-US", options);
// }
// function formatDate(inputDate) {
// 	const options = { year: "numeric", month: "short", day: "numeric" };
// 	return new Date(inputDate).toLocaleDateString("en-US", options);
// }

function check_date_function(tour_details_id = "", tours_id = "") {
	console.log(tour_details_id, tours_id);
	var url = baseurl + "Mycontroller/get_months_wise_tour_price";
	$.ajax({
		url: url,
		type: "post",
		dataType: "json",
		data: {
			tour_details_id: tour_details_id,
			tours_id: tours_id,
		},
		success: function (res) {
			console.log(res);
			$("#get_price_details").html(res.data.tout_price);
			$("#get_price_details_1").val(res.data.tout_price);
			$("#get_price_details_1").hide().attr("readonly");
			$("#booking_member_count_1").hide().attr("readonly");
			$("#booking_details_ids").val(tour_details_id);
			$("#booking_details_ids").hide().attr("readonly");
			$("#ttl_amount_of_booking_without_gst_1").hide().attr("readonly");
			$("#ttl_amount_of_booking_with_gst_1").hide().attr("readonly");
			$("#ttl_cost_of_booking_gst_amount_1").hide().attr("readonly");

			$("#tour_details_name").html(
				res.data.name +
					": " +
					res.data.tour_total_days +
					" Days Tour Package (" +
					res.data.tour_exact_duration +
					")"
			);
			$("#tour_details_date").html(
				res.data.start_date + " - " + res.data.end_date
			);
		},
	});
}

$(document).on("click", ".outer_dv1", function () {
	// Uncheck all checkboxes with class outer_dv5
	$(".outer_dv5").prop("checked", false).val(0);

	// Find the checkbox inside the clicked .outer_dv1 and check it
	$(this).find(".outer_dv5").prop("checked", true).val(1);

	$("#tour_booking_details_next_1").show();
	$("#tour_booking_details_next_1").removeClass("pe-none");
});

function check_next(obj) {
	console.log($(obj).attr("id"));

	if ($(obj).attr("id") == "tour_booking_details_next_4") {
		var formdata = new FormData($("#tour_booking_details_form")[0]);
		var url = baseurl + "Mycontroller/add_booking_details_bknd";
		$.ajax({
			url: url,
			type: "post",
			data: formdata,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				console.log(res);
				if (res.status != 103) {
					swal({
						title: "",
						// text: res.msg,
						icon: "success",
						button: "Ok",
						html: true,
						content: {
							element: "div",
							attributes: {
								innerHTML: res.msg,
							},
						},
					}).then((result) => {
						if (result) {
							window.location.href = baseurl + "Mycontroller";
						}
					});
				} else {
					errorToster(res.msg);
				}
			},
		});
	}

	if ($(obj).attr("id") == "tour_booking_details_next_3") {
		$(obj).attr("id", "tour_booking_details_next_4");
		$("#book_now_modal_header_title").html("REVIEW BOOKING");
		$("#tour_booking_details_back_3").show();
		$("#tour_booking_details_back_3").attr("id", "tour_booking_details_back_4");
		$("#plase_select_your_batch_dates").hide();
		$("#room_sharing").hide();
		$("#personal_details").hide();
		$("#review_booking").show();
		$(".change_booking_mdl").removeClass("modal-lg");
		$(".change_booking_mdl").addClass("modal-xl");
		$("#tour_booking_details_next_4").html("SUBMIT");
		$("#tour_details_main_customer_name").html($("#name").val());
		console.log(bookingMemberCount);
		if (bookingMemberCount > 1) {
			$("#ttl_number_prsn").show();
			$("#ttl_number_prsn").html(
				"<i class='fa-solid fa-plus'></i> " +
					(bookingMemberCount - 1) +
					" travellers"
			);
		} else {
			$("#ttl_number_prsn").hide();
		}
		$("#tour_details_main_customer_email").html($("#email").val());
		$("#tour_details_main_customer_phone").html($("#contact_no").val());

		var tour_amount = $("#get_price_details_1").val();
		var tour_gst_amount = (tour_amount * bookingMemberCount * 5) / 100;
		var tour_actual_amount_without_gst = tour_amount * bookingMemberCount;
		var tour_actual_amount_with_gst =
			tour_gst_amount + tour_actual_amount_without_gst;
		var tour_booking_adv_requirement = (tour_actual_amount_with_gst * 40) / 100;

		$("#ttl_amount_of_booking_per_head_charge_without_gst").html(
			tour_amount + " X " + bookingMemberCount
		);
		$("#ttl_amount_of_booking_without_gst").html(
			'<i class="fa-solid fa-indian-rupee-sign"></i> ' +
				tour_actual_amount_without_gst
		);
		$("#ttl_cost_of_booking_gst_amount").html(
			'<i class="fa-solid fa-indian-rupee-sign"></i> ' + tour_gst_amount
		);
		$("#ttl_amount_of_booking_with_gst").html(
			'<i class="fa-solid fa-indian-rupee-sign"></i> ' +
				tour_actual_amount_with_gst
		);

		$("#tour_booking_adv_requirement").html(
			'Book this trip now by paying <i class="fa-solid fa-indian-rupee-sign"></i> ' +
				tour_booking_adv_requirement +
				"/- only."
		);

		$("#tour_booking_adv_payment_methods").html(
			'Transfer <i class="fa-solid fa-indian-rupee-sign"></i> ' +
				tour_booking_adv_requirement +
				" through the following payment methods and share the screenshot of this page and transaction on <a href='https://wa.me/918910271365' target='_blank' style='color: rgb(10, 158, 136);'>+91-8910271365</a> on whatsapp:"
		);

		$("#tour_booking_upi_us_at").html(
			"<strong>UPI</strong> us at <strong>(Google Pay/BHIM/PHONEPE): durbeen@HSBC</strong>"
		);
		$("#tour_booking_ac_number").html("A/C No: 123456789000");
		$("#tour_booking_ac_name").html("A/C Name: Durbeen Private Limited");
		$("#tour_booking_ac_ifsc").html("IFSC Code: HSBC0000000");

		$("#booking_member_count_1").val(bookingMemberCount);

		$("#ttl_amount_of_booking_without_gst_1").val(
			tour_actual_amount_without_gst
		);
		$("#ttl_amount_of_booking_with_gst_1").val(tour_actual_amount_with_gst);
		$("#ttl_cost_of_booking_gst_amount_1").val(tour_gst_amount);
	}

	if ($(obj).attr("id") == "tour_booking_details_next_2") {
		$(obj).attr("id", "tour_booking_details_next_3");
		$("#book_now_modal_header_title").html("PERSONAL DETAILS");
		$("#tour_booking_details_back_2").show();
		$("#tour_booking_details_back_2").attr("id", "tour_booking_details_back_3");
		$("#plase_select_your_batch_dates").hide();
		$("#room_sharing").hide();
		$("#personal_details").show();
		$("#review_booking").hide();
		$(".change_booking_mdl").removeClass("modal-lg");
		$("#tour_booking_details_next_3").addClass("pe-none");
		checkAllInputsFilled();
	}

	if ($(obj).attr("id") == "tour_booking_details_next_1") {
		$(obj).attr("id", "tour_booking_details_next_2");
		$("#book_now_modal_header_title").html("ROOM SHARING");
		$("#tour_booking_details_back_1").show();
		$("#tour_booking_details_back_1").attr("id", "tour_booking_details_back_2");
		$("#plase_select_your_batch_dates").hide();
		$("#room_sharing").show();
		$("#personal_details").hide();
		$("#review_booking").hide();
		$(".change_booking_mdl").addClass("modal-lg");
		if (bookingMemberCount == 0) {
			$("#fa_minus").addClass("pe-none");
			$("#tour_booking_details_next_2").addClass("pe-none");
		}
	}
}

function check_back(obj) {
	if ($(obj).attr("id") == "tour_booking_details_back_2") {
		$(obj).attr("id", "tour_booking_details_back_1");
		$("#tour_booking_details_next_2").attr("id", "tour_booking_details_next_1");
		$("#book_now_modal_header_title").html("PLEASE SELECT YOUR BATCH DATES");
		$("#tour_booking_details_back_1").hide();
		$("#plase_select_your_batch_dates").show();
		$("#room_sharing").hide();
		$("#personal_details").hide();
		$("#review_booking").hide();
		$("#tour_booking_details_next_1").removeClass("pe-none");
		$(".change_booking_mdl").addClass("modal-lg");
	}

	if ($(obj).attr("id") == "tour_booking_details_back_3") {
		$(obj).attr("id", "tour_booking_details_back_2");
		$("#tour_booking_details_next_3").attr("id", "tour_booking_details_next_2");
		$("#book_now_modal_header_title").html("ROOM SHARING");
		$("#room_sharing").show();
		$("#plase_select_your_batch_dates").hide();
		$("#personal_details").hide();
		$("#review_booking").hide();
		$("#tour_booking_details_next_2").removeClass("pe-none");
		$(".change_booking_mdl").addClass("modal-lg");
	}

	if ($(obj).attr("id") == "tour_booking_details_back_4") {
		$(obj).attr("id", "tour_booking_details_back_3");
		$("#tour_booking_details_next_4").attr("id", "tour_booking_details_next_3");
		$("#book_now_modal_header_title").html("PERSONAL DETAILS");
		$("#room_sharing").hide();
		$("#plase_select_your_batch_dates").hide();
		$("#personal_details").show();
		$("#review_booking").hide();
		$("#tour_booking_details_next_3").removeClass("pe-none");
		$(".change_booking_mdl").removeClass("modal-xl");
		$("#tour_booking_details_next_3").html("NEXT");
		checkAllInputsFilled();
	}
}

function incrementCount() {
	bookingMemberCount++;
	updateCount();
}

function decrementCount() {
	if (bookingMemberCount > 0) {
		bookingMemberCount--;
		updateCount();
	}
}

function updateCount() {
	$("#booking_member_count").html(bookingMemberCount);
	if (bookingMemberCount > 0) {
		$("#fa_minus").removeClass("pe-none");
		$("#tour_booking_details_next_2").removeClass("pe-none");
	} else {
		$("#fa_minus").addClass("pe-none");
		$("#tour_booking_details_next_2").addClass("pe-none");
	}
}

function check_booking_input(inputValue, inputType) {
	var inputElement = document.getElementById(inputType);

	if (inputType === "name") {
		var cleanedValue = inputValue.replace(/[^A-Za-z ]/g, ""); // Remove non-alphabetic characters, allowing only one space
	} else if (inputType === "contact_no") {
		var cleanedValue = inputValue.replace(/[^0-9]/g, ""); // Remove non-numeric characters
	} else if (inputType === "email") {
		var cleanedValue = inputValue.trim(); // Remove leading and trailing whitespaces for email
		// You can add additional email validation logic here if needed
	} else if (inputType === "address") {
		var cleanedValue = inputValue;
	}

	// Update the input value with the cleaned value
	inputElement.value = cleanedValue;

	if (
		cleanedValue === "" ||
		(inputType === "email" && !isValidEmail(cleanedValue))
	) {
		$("#tour_booking_details_next_3").addClass("pe-none");
		inputElement.focus();
		return false;
	} else {
		checkAllInputsFilled();
	}

	// Additional validation if needed
	// ...

	return true; // The input is valid
}

function isValidEmail(email) {
	// Simple email validation regex (you can modify as needed)
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return emailRegex.test(email);
}

function checkAllInputsFilled() {
	var nameValue = document.getElementById("name").value.trim();
	var contactNoValue = document.getElementById("contact_no").value.trim();
	var emailValue = document.getElementById("email").value.trim();
	var addressValue = document.getElementById("address").value.trim();

	if (
		nameValue !== "" &&
		contactNoValue !== "" &&
		emailValue !== "" &&
		addressValue !== ""
	) {
		$("#tour_booking_details_next_3").removeClass("pe-none");
	} else {
		$("#tour_booking_details_next_3").addClass("pe-none");

		// Find the first empty input field and focus on it
		if (nameValue === "") {
			document.getElementById("name").focus();
		} else if (contactNoValue === "") {
			document.getElementById("contact_no").focus();
		} else if (emailValue === "") {
			document.getElementById("email").focus();
		} else if (addressValue === "") {
			document.getElementById("address").focus();
		}
	}
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
