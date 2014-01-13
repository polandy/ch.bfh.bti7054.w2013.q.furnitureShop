/**
 * Search a furniture
 * @param text Search text
 */
function search(text) {
	$.post("php/controller/search.php", {text: text}, function (results) {
		$("#searchresults").show();
		$("#searchresults").html(results);
	});
}

$(function () {
	var overResults = false;

	// Search on type
	$("#searchbox").on("keyup",function () {
		search($(this).val());
	}).on("blur", function (e) {
			if (!overResults) {
				$("#searchresults").hide();
				$(this).val("");
			}
		});

	// Only hide the search results if the user clicks beside them
	$("#searchresults").on("mouseover",function () {
		overResults = true;
	}).on("mouseleave", function () {
			overResults = false;
		})
});