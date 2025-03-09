$(() => {
    $(".searched-user").on("click", function (e) {
        e.preventDefault();
        $(this).css("background-color", "#AFE1AF");
        $(this).find("button").text("✓");
        $(this).find("p").css("font-weight", "500");

        setTimeout(() => {
            $(this).addClass("display-none");
        }, 500);
    });
});
