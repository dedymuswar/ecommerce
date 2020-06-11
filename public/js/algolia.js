(function () {
    const client = algoliasearch("OBXEZBKO6S", "5799335dab7dafcc990296f6d091f7ac");
    const products = client.initIndex('products');
    const teams = client.initIndex('teams');

    autocomplete('#aa-search-input', {}, [
        {
            source: autocomplete.sources.hits(products, { hitsPerPage: 5 }),
            displayKey: 'name',
            templates: {
                header: '',
                suggestion({ _highlightResult }) {

                    //Memotong ekstensi gambar(.jpg/etc) menjadi 
                    const imga = _highlightResult.image.value;
                    var file = imga.split('.').pop();
                    // const img = imga.substring(0, imga.length - 4);
                    const img = imga.replace(/(.*)\.(.*?)$/, "$1");
                    const imager = 'storage/' + img + '-cropped.' + file;
                    const harga = _highlightResult.price.value;


                    const markup = `
                    <div class="algolia-result">
                    <img src="${window.location.origin}/` + imager + `" alt="img" class="algolia-thumb">
                        <span>${_highlightResult.name.value}</span>
                        <span style="float:right">Rp `+ harga + `</span>
                    </div>`;
                    return markup;
                    // return `<img src="${window.location.origin}/${_highlightResult.image}" alt="img" class="algolia-thumb"><span>${_highlightResult.name.value}</span>`;
                },
                empty: function (result) {
                    return '<span class="maaf">Sorry, we did not find any results for "' + result.query + '"</span>';
                }
            }
        }
    ]);
})();