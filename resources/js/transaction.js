$(function() {
    $("#transactionTable").DataTable({
        serverSide: true,
        processing: true,
        ajax: "/getTransactions",
        columns: [
            { data: "id", name: "id", visible: false },
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "user.name", name: "user.name" },
            { data: "product.pname", name: "product.pname" },
            { data: "tqty", name: "tqty" },
            { data: "tprice", name: "tprice" },
            { data: "payment.pyname", name: "payment.pyname" },
            { data: "status.stname", name: "status.stname" },
            { data: "action", name: "action", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });
    $(".datatable").on("click", ".btn-delete", function (e) {
        e.preventDefault();

        var form = $(this).closest("form");

        Swal.fire({
            title: "Are you sure want to delete product?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "bg-primary",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});



