
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

$("#btn-cek").on("click", function (event) {
    event.preventDefault();
    var kotaasal = $('#city_origin').val();
    var kotatujuan = $('#city_destination').val();
    var courier = $('#courier').val();
    var weight = $('#weight').val();
    $("#biayapengiriman").remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "ongkir/submit",
        method: "POST",
        data: {
            city_origin: kotaasal,
            city_destination: kotatujuan,
            courier: courier,
            weight: weight
        },
        processing: true,
        serverSide: true,
        beforeSend: function () {
            $('.preloader').show();
        },
        complete: function () {
            $('.preloader').hide();
        },
        success: function (data) {
            var datas = `<tr id="biayapengiriman">
                            <th>Biaya Pengiriman est(`+ data.estimate + `) hari (JNE)</th>
                            <td id="ongkir">Rp`+ formatNumber(data.ongkir) + `.00</td>
                        </tr>`;
            $(".order_total").before(datas);
            $("#ongkir").val(data.ongkir);
            var anu = $('#subtotal').text();
            console.log(anu);
            //remove comma and nol
            var dedy =  "{{ Session::get('coupon')['discount'];}}";
            console.log(dedy);
            if(dedy){
                // console.log(session()->has('coupon'));
                var total = parseFloat(anu.replace(/,/g, '')) + parseInt(data.ongkir);
            }else{
                var total = parseFloat(anu.replace(/,/g, '')) + parseInt(data.ongkir);
            }

            var totals = "Rp" + formatNumber(total) + ".00";
            $("#total").text(totals);
            $("#btn-checkout").removeAttr("disabled");
            $("#btn-checkout").removeClass("dedy");
        },
        error: function (data) {
            console.log("Error:", data);
        }
    });
});

$('select[name="province_origin"]').on('change', function () {
    let provinceId = $(this).val();
    if (provinceId) {
        jQuery.ajax({
            url: '/province/' + provinceId + '/cities',
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="city_origin"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        })
    } else {
        $('select[name="city_origin"]').empty();
    }
});
$('select[name="province_destination"]').on('change', function () {
    let provinceId = $(this).val();
    if (provinceId) {
        jQuery.ajax({
            url: '/province/' + provinceId + '/cities',
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="city_destination"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        })
    } else {
        $('select[name="city_destination"]').empty();
    }
});

$("#formOngkir").on("click", "#btn-checkout", function () {
    // event.preventDefault();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var name = $('#name').val();
    var address = $('#address').val();
    var province_destination = $('#province_destination').val();
    var city_destination = $('#city_destination').val();
    var subtotal = $('#subtotal').text();
    var ongkir = $('#ongkir').val();
    var total = $('#total').text();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "checkout/store",
        method: "POST",
        data: {
            email: email,
            phone: phone,
            name: name,
            address: address,
            province_destination: province_destination,
            city_destination: city_destination,
            subtotal: subtotal,
            total: total,
            ongkir: ongkir
        },
        processing: true,
        serverSide: true,
        success: function (data) {
            jQuery.each(data.errors, function (key, value) {
                jQuery('#dedy').show();
                jQuery('#dedy').append('<p>' + value + '</p>');
            });
            console.log(data.pesan);
            window.location = "checkout/thankyou";
        },
        error: function (data) {
            console.log("Error:", data);
        }
    });
});