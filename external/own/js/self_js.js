$(document).ready(function () {
	$("#itinerary_details").hide();
	$("#dates_and_costing").hide();
});
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
}

function get_book() {
	$("#about_details").show();
	$("#itinerary_details").hide();
	$("#dates_and_costing").hide();
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

					const formattedDate = `${
						monthNames[originalDate.getMonth()]
					} '${originalDate.getFullYear().toString().substr(2)}`;

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
					"<div class='d-flex justify-content-between mnt_wish_dt_div'>";
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
