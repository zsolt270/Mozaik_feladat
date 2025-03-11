import * as bootstrap from "bootstrap";

$(() => {
    const tournamentId = window.location.pathname.split("/")[1];
    let roundId;
    let deboucedRequest;

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

    //delete round, get userslist, add users as competitors to round
    $("#accordionCointainer").on("click", function (e) {
        e.preventDefault();
        roundId = $(e.target)
            .parents(".accordion-item")
            .children(".accordion-collapse")
            .attr("id");
        //delete round
        if (
            $(e.target).is("button.btn-outline-danger") &&
            $(e.target).text() === "Delete"
        ) {
            $.ajax({
                url: `/${tournamentId}/${roundId}`,
                type: "delete",
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
        }
        //get userslist
        if ($(e.target).is("button[data-bs-target='#addCompetitorsModal']")) {
            $.ajax({
                url: `/${tournamentId}/${roundId}/competitors`,
                type: "get",
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
        //delete competitor from round
        if ($(e.target).is("button[data-uid]")) {
            $.ajax({
                url: `/${tournamentId}/${roundId}/${$(e.target).attr(
                    "data-uid"
                )}`,
                type: "delete",
                dataType: "json",
                success: function (result) {
                    $("#roundsAccordion").replaceWith(result.html);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    //effect for adding user to round and adding user to round
    $("#usersContainer")
        .parent()
        .on("click", function (e) {
            if ($(e.target).hasClass("searched-user")) {
                e.preventDefault();
                $(e.target).css("background-color", "#AFE1AF");
                $(e.target).find("button").text("✓");
                $(e.target).find("p").css("font-weight", "500");

                $.ajax({
                    url: `/${tournamentId}/${roundId}/${
                        $(e.target).attr("id").split("-")[1]
                    }`,
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
    //search for user
    $("#search").on("input", function (e) {
        let query = $(this).val();

        clearTimeout(deboucedRequest);

        deboucedRequest = setTimeout(() => {
            $.ajax({
                url: `/${tournamentId}/${roundId}/search`,
                data: { query },
                type: "get",
                dataType: "json",
                success: function (result) {
                    $("#usersContainer").replaceWith(result.usersList);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }, 1000);
    });
});
