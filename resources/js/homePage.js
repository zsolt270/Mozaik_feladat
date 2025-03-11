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

    function handleErrors(error, formType) {
        const errorMsg = error.responseJSON.errors || error.responseJSON.error;
        $(".text-danger").text("");

        if (error.status === 422) {
            $.each(errorMsg, function (key, value) {
                $("#" + formType + "Error-" + key).text(value);
            });
        } else if (error.status === 500) {
            $("#" + formType + "Error-name").text(errorMsg);
            $("#" + formType + "Error-date").text(errorMsg);
        }
    }

    function sendRequest(url, method, data, successCallback, errorCallback) {
        $.ajax({
            url: url,
            data: data,
            type: method,
            dataType: "json",
            success: successCallback,
            error: errorCallback,
        });
    }

    //create tournament
    $("#createTournament").on("submit", function (e) {
        e.preventDefault();
        sendRequest(
            "/",
            "post",
            $(this).serialize(),
            function (result) {
                $("#cardsContainer").html(result.html);
                $("#createTournament")[0].reset();
                createTournamentModal.hide();
            },
            function (error) {
                console.log("Error:", error);
                handleErrors(error, "create");
            }
        );
    });

    //get values from db and add it to inputs
    $("#cardsContainer").on("click", function (e) {
        const tournamentId = $(this)
            .find($(e.target))
            .parents(".card")
            .attr("id");

        if ($(e.target).is("button.editTournamentBtn")) {
            sendRequest(
                `/${tournamentId}/edit`,
                "get",
                {},
                function (result) {
                    $.each(result, function (key, value) {
                        $("#Update" + key).val(value);
                    });
                    $("#editTournament").attr(
                        "data-tournamentid",
                        tournamentId
                    );
                },
                function (error) {
                    console.log("Error:", error);
                }
            );
        }
    });

    //edit resource
    $("#editTournament").on("submit", function (e) {
        e.preventDefault();
        const tournamentId = $(this).attr("data-tournamentid");

        sendRequest(
            `/${tournamentId}`,
            "PATCH",
            $(this).serialize(),
            function (result) {
                $("#cardsContainer").html(result.html);
                $("#createTournament")[0].reset();
                editTournamentModal.hide();
            },
            function (error) {
                console.log("Error:", error);
                handleErrors(error, "update");
            }
        );
    });

    //delete resource
    $("#cardsContainer").on("click", function (e) {
        const tournamentId = $(this)
            .find($(e.target))
            .parents(".card")
            .attr("id");

        if ($(e.target).is("button.deleteTournamentBtn")) {
            sendRequest(
                `/${tournamentId}`,
                "delete",
                {},
                function (result) {
                    $("#cardsContainer").html(result.html);
                },
                function (error) {
                    console.log("Error:", error);
                }
            );
        }
    });
});
