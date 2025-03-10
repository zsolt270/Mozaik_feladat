import * as bootstrap from "bootstrap";

$(() => {
    const createTournamentModal = new bootstrap.Modal(
        document.getElementById("createTournamentModal")
    );

    const editTournamentModal = new bootstrap.Modal(
        document.getElementById("editTournamentModal")
    );

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //create tournament
    $("#createTournament").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/",
            data: $("#createTournament").serialize(),
            type: "post",
            dataType: "json",

            success: function (result) {
                $("#cardsContainer").html(result.html);
                $("#createTournament")[0].reset();
                createTournamentModal.hide();
            },
            error: function (error) {
                console.log("Error:", error);
                let errorMsg =
                    error.responseJSON.errors || error.responseJSON.error;

                if (error.status === 422) {
                    $(".text-danger").text("");

                    $.each(errorMsg, function (key, value) {
                        $("#createError-" + key).text(value);
                    });
                } else if (error.status === 500) {
                    $("#createError-name").text(errorMsg);
                    $("#createError-date").text(errorMsg);
                }
            },
        });
    });

    //get values from db and add it to inputs
    $("#cardsContainer").on("click", function (e) {
        const tournamentId = $(this)
            .find($(e.target))
            .parents(".card")
            .attr("id");
        if ($(e.target).is("button.editTournamentBtn")) {
            $.ajax({
                url: `/${tournamentId}/edit`,
                type: "get",
                dataType: "json",

                success: function (result) {
                    $.each(result, function (key, value) {
                        $("#Update" + key).val(value);
                    });
                    $("#editTournament").attr(
                        "data-tournamentid",
                        tournamentId
                    );
                },
                error: function (error) {
                    console.log("Error:", error);
                },
            });
        }
    });

    //edit resource
    $("#editTournament").on("submit", function (e) {
        e.preventDefault();
        const tournamentId = $(this).attr("data-tournamentid");

        $.ajax({
            url: `/${tournamentId}`,
            data: $("#editTournament").serialize(),
            type: "PATCH",
            dataType: "json",

            success: function (result) {
                $("#cardsContainer").html(result.html);
                $(".editTournamentBtn").on("click", function (e) {
                    const tournamentId = $(this).parents(".card").attr("id");
                    $.ajax({
                        url: `/${tournamentId}/edit`,
                        type: "get",
                        dataType: "json",

                        success: function (result) {
                            $.each(result, function (key, value) {
                                $("#Update" + key).val(value);
                            });
                        },
                        error: function (error) {
                            console.log("Error:", error);
                        },
                    });
                });
                $("#createTournament")[0].reset();
                editTournamentModal.hide();
            },
            error: function (error) {
                console.log("Error:", error);
                let errorMsg =
                    error.responseJSON.errors || error.responseJSON.error;

                if (error.status === 422) {
                    $(".text-danger").text("");

                    $.each(errorMsg, function (key, value) {
                        $("#updateError-" + key).text(value);
                    });
                } else if (error.status === 500) {
                    $("#updateError-name").text(errorMsg);
                    $("#updateError-date").text(errorMsg);
                }
            },
        });
    });

    //delete resource
    $("#cardsContainer").on("click", function (e) {
        const tournamentId = $(this)
            .find($(e.target))
            .parents(".card")
            .attr("id");
        if ($(e.target).is("button.deleteTournamentBtn")) {
            $.ajax({
                url: `/${tournamentId}`,
                type: "delete",
                dataType: "json",

                success: function (result) {
                    $("#cardsContainer").html(result.html);
                },
                error: function (error) {
                    console.log("Error:", error);
                },
            });
        }
    });
});
