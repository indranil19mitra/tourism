function tourGetOnDates(date = "") {
	window.location.href = baseurl + "?dts=" + date;
}

function getDetails(dtl_nm, ids) {
	window.location.href =
		baseurl + "get-Details?dtl_nm=" + dtl_nm + "&ids=" + ids;
}
