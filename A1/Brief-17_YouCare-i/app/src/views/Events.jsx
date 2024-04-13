import { useEffect, useState } from "react";
import axiosClient from "../axiosClient.js";
import { Link } from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";

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
        axiosClient.get("event")
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

    return (
        <div>
            <div style={{display: 'flex', justifyContent: "space-between", alignItems: "center"}}>
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
                                {<td>
                                    <Link className="btn-edit" to={`/events/${u.id}`}>Edit</Link>
                                    &nbsp;
                                    <button className="btn-delete" onClick={() => onDelete(u.id)}>Delete</button>
                                </td>}
                            </tr>
                        ))}
                        </tbody>
                    }
                </table>
            </div>
        </div>
    );
}
