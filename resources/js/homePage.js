import * as bootstrap from "bootstrap";

$(() => {
    const createTournamentModal = new bootstrap.Modal(
        document.getElementById("createTournamentModal")
    );
    $("#createTournament").on("submit", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/",
            data: $("#createTournament").serialize(),
            type: "post",
            dataType: "json",

            success: function (result) {
                $("#cardsContainer").html(result.html);
                createTournamentModal.hide();
            },
            error: function (error) {
                console.log("Error:", error);
                let errorMsg =
                    error.responseJSON.errors || error.responseJSON.error;

                if (error.status === 422) {
                    $(".text-danger").text("");

                    $.each(errorMsg, function (field, message) {
                        $("#error-" + field).text(message);
                    });
                } else if (error.status === 500) {
                    $("#error-name").text(errorMsg);
                    $("#error-date").text(errorMsg);
                }
            },
        });
    });

    $("#editTournament").on("submit", function (e) {
        e.preventDefault();
        // $.ajax({
        //     url: "/",
        //     data: jQuery(),
        // });
    });
});
