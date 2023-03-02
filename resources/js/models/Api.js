import axios from "axios";
import $ from "jquery";

export class Api {

    constructor() {

        const Axios = axios.create({
            baseURL: process.env.MIX_API_URL
        });

        Axios.interceptors.request.use(config => {
            this.getLoader().show();
            return config;
        });

        this.http = Axios;
    }

    getLoader = () => {
        return $('.loader-wrapper');
    }

}
