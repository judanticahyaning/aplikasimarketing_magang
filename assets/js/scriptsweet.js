
$('.planDelete').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "Plan Data will be Removed!",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Yes, Remove it!',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});

$('.planDone').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "Data Plan is Done ?",
        type: 'warning',
        buttons: {
            confirm: {
                text: "Yes, It's Done!",
                className: 'btn btn-success'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});


$('.activityDelete').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "Activity Data will be Removed !",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Yes, Remove it!',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});


$('.customerDelete').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "Customer Data Will be Removed!",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Yes, Remove it!',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});


$('.Prospectdelete').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "Prospect Data Will be Removed!",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Yes, Remove it!',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});

$('.AMdelete').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "This AM's Data Including Customers, Activity, and Prospect will also be Deleted! ",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Yes, Delete   it!',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});


$('.log-out').click(function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        className: 'swalDelete',
        title: 'Log out',
        text: "You will be returned to the login screen.",
        type: 'warning',
        buttons: {
            confirm: {
                text: 'Log out',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: true,
                className: 'btn btn-info'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            document.location.href = href;
        }
    });

});


