import {Link} from "react-router-dom";

export  default function Register () {
    function handelSubmit(e) {
        e.preventDefault();
    }

    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <h1 className={'title'}>Create An Account Now </h1>
                <form onSubmit={handelSubmit}>
                    <input type="text" placeholder={'Username'}/>
                    <input type="email" placeholder={'Email'}/>
                    <input type="password" placeholder="Password"/>
                    <input type="password" placeholder="Confirmation Password"/>
                    <button type="submit" className={'btn btn-block'}>Login</button>
                    <p className={'message'}>
                        Already Have an account  ? <Link to={'/login'}>Log in !</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}