import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import axiosClient from "../axiosClient";
import { useForm } from "react-hook-form";

export default function EventForm() {
    const { id } = useParams();
    const navigate = useNavigate();
    const [event, setEvent] = useState({
        id: null,
        title: "",
        type: "",
        date: "",
        location: "",
        description: "",
        skills_required: ""
    });
    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);
    const { register, handleSubmit, formState: { errors: formErrors } } = useForm();

    useEffect(() => {
        if (id) {
            setLoading(true);
            axiosClient.get(`/events/${id}`)
                .then(({ data }) => {
                    setLoading(false);
                    setEvent(data);
                })
                .catch(() => {
                    setLoading(false);
                });
        }
    }, [id]);

    const onSubmit = (formData) => {
        const eventData = {
            ...formData,
            description: formData.description.substring(0, 15) // Limit description to 15 characters
        };

        if (id) {
            axiosClient.put(`/event/${eventData.id}`, eventData)
                .then(() => {
                    navigate('/event');
                })
                .catch(err => {
                    const response = err.response;
                    if (response && response.status === 422) {
                        setErrors(response.data.errors);
                    }
                });
        } else {
            axiosClient.post('event', eventData)
                .then(() => {
                    navigate('/events');
                })
                .catch(err => {
                    const response = err.response;
                    if (response && response.status === 422) {
                        setErrors(response.data.errors);
                    }
                });
        }
    };

    return (
        <>
            {event.id && <h1>Update Event: {event.title}</h1>}
            {!event.id && <h1>New Event</h1>}
            <div className="card animated fadeInDown">
                {loading && <div className="text-center">Loading...</div>}
                {errors && (
                    <div className="alert">
                        {Object.keys(errors).map(key => (
                            <p key={key}>{errors[key][0]}</p>
                        ))}
                    </div>
                )}
                {!loading && (
                    <form onSubmit={handleSubmit(onSubmit)}>
                        <input defaultValue={event.title} {...register('title', { required: true })} placeholder="Title" />
                        {formErrors.title && <p>Title is required</p>}
                        <input defaultValue={event.type} {...register('type', { required: true })} placeholder="Type" />
                        {formErrors.type && <p>Type is required</p>}
                        <input defaultValue={event.skills_required} {...register('skills_required', { required: true })} placeholder="Skills Required" />
                        {formErrors.skills_required && <p>Skills Required is required</p>}
                        <input defaultValue={event.location} {...register('location', { required: true })} placeholder="Location" />
                        {formErrors.location && <p>Location is required</p>}
                        <input defaultValue={event.date} type='datetime-local' {...register('date', { required: true })} />
                        {formErrors.date && <p>Date is required</p>}
                        <input defaultValue={event.description} {...register('description', { required: true })} placeholder="Description" />
                        {formErrors.description && <p>Description is required</p>}
                        <button className="btn">Save</button>
                    </form>
                )}
            </div>
        </>
    );
}
