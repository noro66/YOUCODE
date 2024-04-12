import {Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";

function DefaultLayout () {
const { user ,token} = useStateContext();
    if (!token){
        return <Navigate to={'/login'} />;
    }
    return (
        <div id='defaultLayout'>
            <div className={'content'}>
                <header>
                    <div>
                        header
                    </div>
                    <div>
                        User Information
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