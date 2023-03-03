import {Api} from "./Api";

export class BasketApi extends Api {

    addItemToCart = (data) => {
        return this.http.post('/api/basket', data);
    }

    removeItemFromCart = (productId) => {
        return this.http.delete('/api/basket/' + productId);
    }

}
