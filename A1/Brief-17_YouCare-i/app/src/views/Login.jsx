import {Link} from "react-router-dom";

export  default function Login () {
    function handelSubmit(e) {
        e.preventDefault();
        
    }

    return (
        <div className='login-signup-form animated fadeInDown'>
        <div className='form'>
            <form onSubmit={handelSubmit}>
                <input type="text" placeholder={'Username'}  />
                <input type="password" placeholder="Password"/>
                <button type="submit" className={'btn btn-block'}>Login</button>
                <p className={'message'}>
                    Not Registered ? <Link to={'/register'}>Create an account !</Link>
                </p>
            </form>
        </div>
        </div>
    );
}