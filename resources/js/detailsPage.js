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

    //effect for adding user to round
    $("#usersContainer")
        .parent()
        .on("click", function (e) {
            if ($(e.target).hasClass("searched-user")) {
                e.preventDefault();
                $(e.target).css("background-color", "#AFE1AF");
                $(e.target).find("button").text("✓");
                $(e.target).find("p").css("font-weight", "500");

                $.ajax({
                    url: `/${tournamentId}/${roundId}/create-competitor`,
                    data: { userId: $(e.target).attr("id").split("-")[1] },
                    type: "post",
                    dataType: "json",
                    success: function (result) {
                        $("#roundsAccordion").replaceWith(result.accordion);
                        $("#usersContainer").replaceWith(result.usersList);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            }
        });

    //create round
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

    //update round
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

    //delete round
    $("#accordionCointainer").on("click", function (e) {
        if (
            $(e.target).is("button.btn-outline-danger") &&
            $(e.target).text() === "Delete"
        ) {
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
