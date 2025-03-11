import * as bootstrap from "bootstrap";

$(() => {
    const tournamentId = window.location.pathname.split("/")[1];
    let roundId;

    const createRoundModal = new bootstrap.Modal(
        document.getElementById("createRoundModal")
    );

    const editRoundModal = new bootstrap.Modal(
        document.getElementById("editRoundModal")
    );

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

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
            url: `/${tournamentId}/create-round`,
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

    //get the round id when user clicks on accordion
    $("#accordionCointainer").on("click", function (e) {
        e.preventDefault();
        roundId = $(e.target)
            .parents(".accordion-item")
            .children(".accordion-collapse")
            .attr("id");
    });

    $("#updateRound").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: `/${tournamentId}/${roundId}`,
            data: $("#updateRound").serialize(),
            type: "patch",
            dataType: "json",
            success: function (result) {
                const newAccordion = result.html;
                $("#roundsAccordion").replaceWith(newAccordion);
                $("#updateRound")[0].reset();
                $("#updateError-name").text("");
                editRoundModal.hide();
            },
            error: function (error) {
                $("#updateError-name").text("");

                $("#updateError-name").text(error.responseJSON.message);
            },
        });
    });

    $("#accordionCointainer").on("click", function (e) {
        if (
            $(e.target).is("button.btn-outline-danger") &&
            $(e.target).text() === "Delete"
        ) {
            console.log(roundId);
            $.ajax({
                url: `/${tournamentId}/${roundId}`,
                type: "delete",
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    const newAccordion = result.html;
                    $("#roundsAccordion").replaceWith(newAccordion);
                    $("#updateRound")[0].reset();
                    $("#updateError-name").text("");
                    editRoundModal.hide();
                },
                error: function (error) {
                    $("#updateError-name").text("");
                    $("#updateError-name").text(error.responseJSON.message);
                },
            });
        }
    });
});
