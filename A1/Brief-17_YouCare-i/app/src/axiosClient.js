import axios from "axios";

const axiosClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/',
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
        try {
            const { status} = error;
            if (status === 401) {
                localStorage.removeItem('token');
            }
        }catch (err){
            console.log(err);
        }
        throw error
    }
    );
export default axiosClient;