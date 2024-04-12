import {createBrowserRouter} from "react-router-dom";
import Login from "./views/Login.jsx";
import Register from "./views/Register.jsx";
import DefaultLayout from "./component/DefaultLayout.jsx";
import GuestLayout from "./component/GuestLayout.jsx";
import Users from "./views/Users.jsx";



const router = createBrowserRouter([
    {
        path: '/',
        element: <DefaultLayout />,
        children: [
            {
                path: '/users',
                element: <Users />,
            }
        ]
    },
    {
        path: '/',
        element: <GuestLayout />,
        children: [
            {
                path: '/register',
                element: <Register />,
            },

            {
                path: '/login',
                element: <Login />,
            },
        ]
    }
]);

 export default router