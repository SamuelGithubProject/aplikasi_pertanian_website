let dataArrPesanan = [];

$(document).ready(() => {

    let resultArr = [];

    $('#formPesanan').on('submit', (e) => {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url : '../bin/php/hitungjumlahpupuk.php',
            success: function (response) {
                for (let i = 1; i <= response; i++) {
                    let valNamaPupuk = $(`.nama-pupuk${i} b`).html();

                    if ($(`#fieldNumber${i}`).val() != 0) {
                        let formatArr = {
                            'namaproduk' : valNamaPupuk,
                            'jumlahpesanan' : $(`#fieldNumber${i}`).val(),
                        };

                        resultArr.push(formatArr);
                    }


                }

                let totalBayar = 0;

                resultArr.forEach(element => {
                    $.ajax({
                        method: 'POST',
                        url: '../bin/php/inputdatapesanan.php',
                        data: {
                            namapupuk:element.namaproduk,
                            jumlahpesanan:element.jumlahpesanan,
                            task:"getspecificdata"
                        },
                        success: function (response) {
                            let obj = JSON.parse(response);

                            let formatArr = {
                                'kodepupuk': obj[0].Kd_pupuk,
                                'namapupuk': obj[0].Nm_pupuk,
                                'harga': obj[0].Harga,
                                'jumlah': obj[1]
                            }

                            dataArrPesanan.push(formatArr);

                            let hargatotal = (obj[0].Harga)*obj[1];

                            totalBayar += hargatotal;

                            $('#totalBayar b').html(totalBayar);
                            $('#isiDataPesanan').append(`
                                <tr>
                                    <td>${obj[0].Nm_pupuk}</td>
                                    <td>${obj[0].Harga}</td>
                                    <td class="text-center">${obj[1]}</td>
                                </tr>
                            `)

                            $('#staticBackdrop').on('hide.bs.modal', function () {
                                window.location.reload();
                            })

                            $('#staticBackdrop').modal('show');
                        }
                    })
                })
            }
        });
    })

    $.ajax({
        method: 'POST',
        url: '../bin/php/hitungjumlahpupuk.php',
        success: function (response) {
            for (let index = 1; index <= response; index++) {
                let nilai = 0;
                $(`#fieldNumber${index}`).val(nilai);
        
                $(`#btnplus${index}`).on('click', () => {
                    nilai += 1;
                    $(`#fieldNumber${index}`).val(nilai);
                })
                
                $(`#btnminus${index}`).on('click', () => {
                    nilai -= 1;
                    $(`#fieldNumber${index}`).val(nilai);
                })

            }
        }
    });
});

function ProsesPesanan() {
    let datarealPesanan = JSON.stringify(dataArrPesanan);
    $.ajax({
        method: 'POST',
        url: '../bin/php/inputdatapesanan.php',
        data: {
            task: 'insertData',
            data: datarealPesanan
        },
        success: function (response) {
            if (response == "Berhasil") {
                if (window.confirm('Data pesanan anda, berhasil dimasukkan. Silahkan klik OK untuk melanjutkan'))
                {
                    window.location.reload();
                }
                else
                {
                    window.location.reload();
                }
            } else {
                console.log(response);
            }
        }
    })
}