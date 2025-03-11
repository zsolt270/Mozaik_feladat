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

    //create round
    $("#createRound").on("submit", function (e) {
        e.preventDefault();
        sendRequest(
            `/${tournamentId}/create-round`,
            "post",
            $("#createRound").serialize(),
            function (result) {
                const newAccordion = result.html;
                $("#roundsAccordion").replaceWith(newAccordion);
                $("#createRound")[0].reset();
                $("#createError-name").text("");
                createRoundModal.hide();
            },
            function (error) {
                $("#createError-name").text("");

                $("#createError-name").text(error.responseJSON.message);
            }
        );
    });

    //update round
    $("#updateRound").on("submit", function (e) {
        e.preventDefault();
        sendRequest(
            `/${tournamentId}/${roundId}`,
            "patch",
            $("#updateRound").serialize(),
            function (result) {
                const newAccordion = result.html;
                $("#roundsAccordion").replaceWith(newAccordion);
                $(".accordion-item .collapse.show").removeClass("show");
                $(".accordion-item #" + roundId + ".collapse").addClass("show");
                $("#updateRound")[0].reset();
                $("#updateError-name").text("");
                editRoundModal.hide();
            },
            function (error) {
                $("#updateError-name").text("");

                $("#updateError-name").text(error.responseJSON.message);
            }
        );
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
            sendRequest(
                `/${tournamentId}/${roundId}`,
                "delete",
                {},
                function (result) {
                    const newAccordion = result.html;
                    $("#roundsAccordion").replaceWith(newAccordion);

                    $("#updateRound")[0].reset();
                    $("#updateError-name").text("");
                    editRoundModal.hide();
                },
                function (error) {
                    $("#updateError-name").text("");
                    $("#updateError-name").text(error.responseJSON.message);
                }
            );
        }

        //get userslist
        if ($(e.target).is("button[data-bs-target='#addCompetitorsModal']")) {
            sendRequest(
                `/${tournamentId}/${roundId}/competitors`,
                "get",
                {},
                function (result) {
                    console.log(result);
                    $("#usersContainer").replaceWith(result.usersList);
                },
                function (error) {
                    console.log(error);
                }
            );
        }

        //delete competitor from round
        if ($(e.target).is("button[data-uid]")) {
            sendRequest(
                `/${tournamentId}/${roundId}/${$(e.target).attr("data-uid")}`,
                "delete",
                {},
                function (result) {
                    $("#roundsAccordion").replaceWith(result.html);
                    $(".accordion-item .collapse.show").removeClass("show");
                    $(".accordion-item #" + roundId + ".collapse").addClass(
                        "show"
                    );
                },
                function (error) {
                    console.log(error);
                }
            );
        }
    });

    //search for user
    $("#search").on("input", function (e) {
        let query = $(this).val();

        clearTimeout(deboucedRequest);

        deboucedRequest = setTimeout(() => {
            sendRequest(
                `/${tournamentId}/${roundId}/search`,
                "get",
                { query },
                function (result) {
                    $("#usersContainer").replaceWith(result.usersList);
                },
                function (error) {
                    console.log(error);
                }
            );
        }, 1000);
    });

    //effect for adding user to round and adding user to round
    $("#usersContainer")
        .parent()
        .on("click", ".searched-user", function (e) {
            e.preventDefault();
            $(e.target).css("background-color", "#AFE1AF");
            $(e.target).find("button").text("✓");
            $(e.target).find("p").css("font-weight", "500");

            sendRequest(
                `/${tournamentId}/${roundId}/${
                    $(e.target).attr("id").split("-")[1]
                }`,
                "post",
                {},
                function (result) {
                    $("#roundsAccordion").replaceWith(result.accordion);
                    $("#usersContainer").replaceWith(result.usersList);
                    $(".accordion-item .collapse.show").removeClass("show");
                    $(".accordion-item #" + roundId + ".collapse").addClass(
                        "show"
                    );
                },
                function (error) {
                    console.log(error);
                }
            );
        });

    // pagination
    $("#usersContainer")
        .parent()
        .on("click", ".pagination a", function (e) {
            e.preventDefault();
            sendRequest(
                `/${tournamentId}/${roundId}/competitors?page=` +
                    $(this).attr("href").split("page=")[1],
                "GET",
                {},
                function (result) {
                    $("#usersContainer").replaceWith(result.usersList);
                },
                function (error) {
                    console.log(error);
                }
            );
        });
});
