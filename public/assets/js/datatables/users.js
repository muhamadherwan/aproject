$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($('#users-dt').length > 0) {
        var userdt = $('#users-dt').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "./users/ajax",
                "type": "POST",
                "data": function (data) {
                    data.role = $('#filter-role').val();
                },
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'mykad',
                    name: 'mykad',
                    class: 'text-center',
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function (data, type, row) {
                        if (data) {
                            return '<a href="mailto:' + data + '">' + data + '</a>';
                        } else {
                            return '-';
                        }
                    }
                },
                {
                    data: 'phonenumber',
                    name: 'phonenumber',
                    class: 'text-center',
                    render: function (data, type, row) {
                        if (data) {
                            return '<a href="tel:' + data + '">' + data + '</a>';
                        } else {
                            return '-';
                        }
                    }
                },
                {
                    data: 'role',
                    name: 'role',
                },
                {
                    data: 'id',
                    name: 'id',
                    class: 'text-center',
                    render(data, type, row) {
                        let btn = '';
                        btn += row.actionUpdate ? '<a href="' + row.actionUpdate + '" style="margin-left: -5px; margin-right: 5px;" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>' : '';
                        btn += row.actionDelete ? '<a href="javascript:void(0);" data-url="' + row.actionDelete + '" style="margin-left: 5px; margin-right: 5px;" class="text-danger btn-delete"><i class="mdi mdi-delete font-size-18"></i></a>' : '';
                        return btn;
                    }
                },
            ],
            pageLength: 10,
            bLengthChange: true,
            order: [
                [0, 'asc']
            ],
            language: {
                lengthMenu: "Papar _MENU_ rekod setiap halaman",
                zeroRecords: "Tiada rekod untuk dipaparkan.",
                info: "Paparan _START_ / _END_ dari _TOTAL_ rekod",
                infoEmpty: "Paparan 0 / 0 dari 0 rekod",
                infoFiltered: "(tapisan dari _MAX_ rekod)",
                processing: "Sila tunggu...",
                search: "Carian:",
                paginate: {
                    next: "<i class='bx bx-chevron-right'>",
                    previous: "<i class='bx bx-chevron-left'>",
                    first: "<i class='bx bx-chevrons-left'>",
                    last: "<i class='bx bx-chevrons-right'>",
                },
            },
        });

        if ($('#button-search').length > 0) {
            $(document).on("click", "#button-search", function (e) {
                userdt.ajax.reload(null, true);
            });
        }

        $(document).on("click", ".btn-delete", (function (e) {
            e.preventDefault();
            let actionUrl = $(this).data("url");
            console.log(actionUrl + "123");
            var alertText = `Adakah anda pasti?<br>Proses ini tidak boleh diundur kembali!`;
            Swal.fire({
                title: "Padam Pengguna",
                html: alertText,
                text: "Adakah anda pasti?",
                icon: "warning",
                showCancelButton: 1,
                confirmButtonText: "Padam",
                cancelButtonText: "Batal",
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#74788d"
            }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: actionUrl,
                            success: function () {
                                userdt.row('.selected').remove().draw(false);
                                Swal.fire(
                                    'Berjaya',
                                    'Pengguna telah berjaya dipadam!',
                                    'success'
                                )
                            },
                            dataType: 'json'
                        });
                    }
                }
            )
        }))

    }
});
