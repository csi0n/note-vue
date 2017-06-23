import axios from 'axios';
let base = 'http://note.local';
let Authorization = `Bearer${sessionStorage.getItem('token')}`
let instance = axios.create({
    baseUrl: base,
    headers: {
        Authorization: Authorization
    }
});
instance.interceptors.response.use((response) => {
    return response;
}, (error) => {
    if (error.response.status === 401) {
        //todo 登录状态消失
    }
    return Promise.reject(error);
});
export const postLogin = params => {
    return axios.post(`${base}/api/login`, params);
};
export const postRegister = params => {
    return axios.post(`${base}/api/register`, params);
};
export const myNotes = params => {
    return axios.get(`${base}/api/note/my`);
};
export const storeNote = params => {
    return axios.post(`${base}/api/note`, params);
};