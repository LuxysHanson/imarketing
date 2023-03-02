import axios from "axios";

class Http {

    getLoader() {
        return document.querySelector('.loader-wrapper');
    }

    get(url: string) {

    }

}



axios.interceptors.request.use(config => {
    $(".loader-wrapper").show()
    return config;
});

axios({
    url: '/api/basket',
    method: 'POST',
    baseURL: process.env.MIX_API_URL,
    data: {
        product_id: $(this.activeElement).data('id'),
        price: $(this.activeElement).data('price'),
        total_count: 1 // пока так, позже можно будет дополнить
    }
})
    .then(response => {
        // $(".loader-wrapper").hide()
        if (response.status === 200) {
            toastr.success('Товар успешно добавлен!')
        }
    })
    .finally(() => { $(".loader-wrapper").hide() });
