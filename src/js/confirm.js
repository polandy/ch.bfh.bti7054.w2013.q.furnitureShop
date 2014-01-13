$(function () {
	$("#orderNow").on("click", function () {
		if (!confirm($(this).data("text"))) {
			return false;
		}
	})
});