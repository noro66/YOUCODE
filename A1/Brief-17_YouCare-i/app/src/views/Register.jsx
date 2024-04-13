import {Link} from "react-router-dom";
import {useForm} from "react-hook-form";
import axiosClient from "../axiosClient.js";
import {useStateContext} from "../Context/ContextProvider.jsx";

export  default function Register () {
    const {setUser, setToken} = useStateContext()

    function onsubmit(data) {
        console.log(data);
        axiosClient.post("auth/register", data).then(({data}) =>  {
            setUser(data.user);
            setToken(data.token);
        }).catch(err => console.log(err));
    }
    const {register, handleSubmit,formState: {errors}} = useForm();

    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <h1 className={'title'}>Create An Account Now </h1>
                <form onSubmit={handleSubmit(onsubmit)}>
                    <input type="text" className={errors.username && 'border-red'} placeholder={'name'} {...register('name', {required: true})}/>
                    <input type="email" placeholder={'Email'} {...register('email', {required: true})}/>
                    <input type="password" placeholder="Password" {...register('password', {required: true})}/>
                    <input type="text" name={'type'} defaultValue={'organizer'} hidden={true} {...register('type', {required: true})}/>
                    <button type="submit" className={'btn btn-block'}>Login</button>
                    <p className={'message'}>
                        Already Have an account  ? <Link to={'/login'}>Log in !</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}