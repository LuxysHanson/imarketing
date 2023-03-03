import $ from "jquery";
import toastr from "toastr";
import {BasketApi} from "../models/BasketApi";

$(function() {

    const api = new BasketApi();

    let addBasketButton = $(".btn-add-basket");
    let removeBasketButton = $('.btn-remove-basket');

    if (addBasketButton.length) {
        addBasketButton.click((e) => {
            e.preventDefault();

            const data = {
                product_id: $(this.activeElement).data('id'),
                price: $(this.activeElement).data('price'),
                quantity: 1 // пока так, позже можно будет дополнить
            }

            api.addItemToCart(data)
                .then(response => {
                    if (response.status === 200) {
                        $(this.activeElement).addClass('disabled');
                        toastr.success('Товар успешно добавлен!')
                    }
                })
                .finally(() => { api.getLoader().hide() });
        })
    }

    if (removeBasketButton.length) {
        removeBasketButton.click((e) => {
            e.preventDefault();

            let cartId = $(this.activeElement).data('id');
            api.removeItemFromCart(cartId)
                .then(response => {
                    if (response.status === 204) {
                        window.location.reload();
                    }
                })
                .finally(() => { api.getLoader().hide() });
        })
    }

});
