function showDetailModal(kodepesan) {
    $.ajax({
        url: "../bin/php/selectpesanan.php",
        type: "POST",
        data: { 
            'kode_pesan': kodepesan,
            'task': "selectingData"
        },
        success: function(response) {
            let data = JSON.parse(response).Pesanan;
            let MyData = JSON.parse(data);
            MyData.map((item) => {
                $('#showDataPesanan').append(`
                    <tr>
                        <td>${item.kodepupuk}</td>
                        <td>${item.namapupuk}</td>
                        <td>${item.harga}</td>
                        <td>${item.jumlah}</td>
                    </tr>
                `);
            })

            $('#modalShowPesanan').modal('show');
            $('#modalShowPesanan').on('hide.bs.modal', function () {
                $('#showDataPesanan').html('');
            })
        }
    });
}

function deletingReports(kodepesan) {
    $.ajax({
        url: "../bin/php/selectpesanan.php",
        type: "POST",
        data: { 
            'kode_pesan': kodepesan,
            'task': "deletingData"
        },
        success: function (response) {
            if (response == "Record deleted successfully") {
                window.location.reload();
            } else {
                alert(response);
            }
        }
    })
}


function deletingDataPupuk(number) {
    let kodepupuk = $(`#btnDeletePupuk${number}`).attr('data-pupuk');
    $.ajax({
        url: "../bin/php/selectpesanan.php",
        type: "POST",
        data: { 
            'kodepupuk': kodepupuk,
            'task': "deletingDataPupuk"
        },
        success: function (response) {
            if (response == "Record deleted successfully") {
                window.location.reload();
            } else {
                alert(response);
            }
        }
    })
}