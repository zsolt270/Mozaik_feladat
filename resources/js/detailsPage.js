import * as bootstrap from "bootstrap";

$(() => {
    const tournamentid = window.location.pathname.split("/")[1];

    const createRoundModal = new bootstrap.Modal(
        document.getElementById("createRoundModal")
    );

    $(".searched-user").on("click", function (e) {
        e.preventDefault();
        $(this).css("background-color", "#AFE1AF");
        $(this).find("button").text("✓");
        $(this).find("p").css("font-weight", "500");

        setTimeout(() => {
            $(this).addClass("display-none");
        }, 500);
    });

    $("#createRound").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: `/${tournamentid}/create-round`,
            data: $("#createRound").serialize(),
            type: "post",
            dataType: "json",
            success: function (result) {
                const newAccordion = result.html;
                $("#roundsAccordion").replaceWith(newAccordion);
                $("#createRound")[0].reset();
                $("#createError-name").text("");
                createRoundModal.hide();
            },
            error: function (error) {
                $("#createError-name").text("");

                $("#createError-name").text(error.responseJSON.message);
            },
        });
    });
});
