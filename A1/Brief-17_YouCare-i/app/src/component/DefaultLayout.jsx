import {Link, Navigate, Outlet, useNavigate} from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";
import axiosClient from "../axiosClient.js";
import {useEffect} from "react";

function DefaultLayout () {
    const {setToken, setUser} = useStateContext()
const { user ,token} = useStateContext();
    const navigate = useNavigate();
    if (!token){
        return <Navigate to={'/login'} />;
    }

    function onLogout(e) {
            e.preventDefault();
            axiosClient.get("auth/logout", {token: token}).then(() =>  {
                setToken(null);
                setUser(null);
                localStorage.removeItem("token");
                localStorage.removeItem("user");
            }).catch(r => console.log(r));
    }

    return (

        <div id='defaultLayout'>
            <div className={'content'}>
                <header>
                    <div>
                        header
                    </div>
                    <div>
                        <git Link className={'d-none'} to="/events">Events</gitLink>
                    </div>
                    <div>
                        {user && user.name}
                        <a onClick={onLogout} className={' mx btn-logout pointer'}>Logout</a>
                    </div>

                </header>
                <main>

                    <div>
                        <Outlet/>
                    </div>
                </main>
            </div>
        </div>
    )
}

export default DefaultLayout;