import {Link} from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";
import axiosClient from "../axiosClient.js";
import {useForm} from "react-hook-form";

export  default function Login () {
    const {setUser, setToken} = useStateContext();

    function onsubmit(data) {
        axiosClient.post("auth/login", data).then(({data}) =>  {
            setUser(JSON.stringify(data.user));
            setToken(data.token);
        }).catch(err => console.log(err));
    }
    const {register, handleSubmit,formState: {errors : formErrors}} = useForm();


    return (

        <div className='login-signup-form animated fadeInDown'>
        <div className='form'>
            <h1 className={'title'}>Login To Your Account</h1>
            <form onSubmit={handleSubmit(onsubmit)}>
                <input type="email" placeholder={'Email'} {...register('email', {required: true})} />
                <input type="password" placeholder="Password" {...register('password', {required: true})}/>
                <button type="submit" className={'btn btn-block'}>Login</button>
                <p className={'message'}>
                    Not Registered ? <Link to={'/register'}>Create an account !</Link>
                </p>
            </form>
        </div>
        </div>
    );
}