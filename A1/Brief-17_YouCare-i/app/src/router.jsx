import {createBrowserRouter, useNavigate} from "react-router-dom";
import Login from "./views/Login.jsx";
import Register from "./views/Register.jsx";
import DefaultLayout from "./component/DefaultLayout.jsx";
import GuestLayout from "./component/GuestLayout.jsx";
import Events from "./views/Events.jsx";
import EventForm from "./views/EventForm.jsx";

const router = createBrowserRouter([
    {
        path: '/',
        element: <DefaultLayout />,
        children: [
            {
                path: '/events',
                element: <Events />,
            },
            {
                path: '/events/new',
                element: <EventForm key={'EventCreate'} />,
            },
            {
                path: '/events/:id',
                element: <EventForm key={'EventUpdate'} />,
            },
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