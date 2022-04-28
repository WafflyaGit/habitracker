import axios from "axios";

axios.defaults.headers['Authorization'] = 'Bearer ' + localStorage.getItem('token');
axios.defaults.headers['Content-Type'] = 'application/json';
