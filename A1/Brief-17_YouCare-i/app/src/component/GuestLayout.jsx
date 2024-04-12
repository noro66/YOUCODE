import {Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";

function GuestLayout () {
    const { token} = useStateContext();
    if (token){
        return <Navigate to={'/'} />;
    }
    return (
        <>
            <Outlet/>
        </>
    )
}

export default GuestLayout;