$(".quick-view").on("click", function () {
    var productId = $(this).data("id");
    $.get("getProductById/" + productId + "/detail", function (data) {
        $("#modal_quick_view").modal("show");

        $(".nama_produk").html("<h2>" + data.output['name'] + "</h2>");
        $(".harga_baru").text("Rp " + data.output['price']);
        $(".harga_lama").text("Rp " + data.output['old_price']);
        $(".deskripsi").html("<p>" + data.output['description'] + "</p>");
        $(".stok").html(data.stockLevel);
    })


})