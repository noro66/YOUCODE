import axios from "axios";

const axiosClient = axios.create({
    baseURL: 'http://127.0.0.1:8000',
});
axiosClient.interceptors.request.use(config => {
    const token = localStorage.getItem('token');
    config.headers.Authorization = `Bearer ${token}`;
    return config;
});
axiosClient.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) =>{
        const { status} = error;
        if (status === 401) {
            localStorage.removeItem('token');
        }
        throw error
    }
    );
export default axios;