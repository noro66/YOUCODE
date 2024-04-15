import { useEffect, useState } from "react";
import axiosClient from "../axiosClient.js";
import { Link } from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";
import {Button} from "react-bootstrap";

export default function Events() {
    const [events, setEvents] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const {user} = useStateContext();

    useEffect(() => {
        getEvents();
    }, []);

    const getEvents = () => {
        setLoading(true);
        axiosClient.get("event", { token: localStorage.getItem("token")})
            .then(({ data }) => {
                setLoading(false);
                setEvents(data.events);
            })
            .catch(error => {
                setLoading(false);
                setError("Failed to fetch events. Please try again later.");
                console.error("Error fetching events:", error);
            });
    };

    const truncateText = (text, maxLength) => {
        if (text.length > maxLength) {
            return text.substring(0, maxLength) + "...";
        }
        return text;
    };

    function onDelete(id) {
      if (!window.confirm("Are you sure you want to delete this event?")) {
          return
      }
      axiosClient.delete(`event/${id}`)
          .then(r => {
              console.log("Deleted event:", r);
              getEvents();
          });
    }
    function onApply(id) {
        if (!window.confirm("Are you sure you want to Apply for  this event?")) return ;
        axiosClient.post(`application/${id}/store`, {token: localStorage.getItem("token")} )
            .then(r => {
                console.log("Apply event:", r.data);
                getEvents();
            }).catch(r => console.log(r));
    }
    function onCancel(userId){
        if (!window.confirm("Are you sure you want to cancel application for this  this event?")) return ;
        axiosClient.delete(`application/${userId}/destroy`, {token: localStorage.getItem("token")}).then(r => console.log('Deleted applications',r));
        getEvents();
    }
    return (
        <div>
            <div style={{display: 'flex', justifyContent: "space-between", alignItems: "center"}}>
                {!user ? <div>Loading...</div> : <h2>Welcome, {user.name}!</h2>}
                <h1>Events</h1>
                <Link className="btn-add" to="/events/new">Add new</Link>
            </div>
            <div className="card animated fadeInDown">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>type</th>
                        <th>date</th>
                        <th>location</th>
                        <th>description</th>
                        <th>skills_required</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {loading &&
                        <tbody>
                        <tr>
                            <td colSpan="5" className="text-center">
                                Loading...
                            </td>
                        </tr>
                        </tbody>
                    }
                    {!loading &&
                        <tbody>
                        {events.map(u => (
                            <tr key={u.id}>
                                <td>{u.id}</td>
                                <td>{truncateText(u.title, 20)}</td>
                                <td>{u.type}</td>
                                <td>{u.date}</td>
                                <td>{truncateText(u.location , 20)}</td>
                                <td>{truncateText(u.description, 20)}</td>
                                <td>{truncateText(u.skills_required, 20)}</td>
                                {user.type === "organizer" ? (
                                    user.organizer_id === u.organizer_id ? (
                                        <td>
                                            <Link className="btn-edit" to={`/events/${u.id}`}>Edit</Link>
                                            &nbsp;
                                            <button className="btn-delete" onClick={() => onDelete(u.id)}>Delete</button>
                                        </td>
                                    ) : (
                                        <td>
                                            <button className="btn btn-primary">Unauthorized</button>
                                        </td>
                                    )
                                ) : (!u.applied ?
                                        <td>
                                            <Button className="btn btn-add" onClick={()=> onApply(u.id)}>Apply</Button>
                                        </td> : <td>
                                        <Button className="btn btn-delete" onClick={()=> onCancel(u.id)} >Cancel</Button>
                                        </td>
                                )}

                            </tr>
                        ))}
                        </tbody>
                    }
                </table>
            </div>
        </div>
    );
}
