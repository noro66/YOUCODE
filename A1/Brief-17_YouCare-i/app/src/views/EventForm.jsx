import  { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import axiosClient from "../axiosClient";
import { useForm } from "react-hook-form";

export default function EventForm() {
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const { register, handleSubmit, control, formState: { errors: formErrors }, setValue } = useForm();

    const { id } = useParams();

    useEffect(() => {
        if (id) {
            setLoading(true);
            axiosClient.get(`/event/${id}`)
                .then(({ data }) => {
                    setValue('title', data.event.title);
                    setValue('type', data.event.type);
                    setValue('skills_required', data.event.skills_required);
                    setValue('location', data.event.location);
                    setValue('date', data.event.date ? new Date(data.event.date).toISOString().substring(0, 16) : '');
                    setValue('description', data.event.description);
                    setLoading(false);
                })
                .catch(() => {
                    setLoading(false);
                });
        }
    }, [id]);

    const onSubmit = (eventData) => {
        if (id) {
            axiosClient.put(`/event/${id}`, {...eventData, token: localStorage.getItem("token")})
                .then(() => {
                    navigate('/events');
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
            {id && <h1>Update Event:  {id}</h1>}
            {!id && <h1>New Event</h1>}
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
                        <input {...register('title', { required: true })} placeholder="Title" />
                        {formErrors.title && <p>Title is required</p>}
                        <input {...register('type', { required: true })} placeholder="Type" />
                        {formErrors.type && <p>Type is required</p>}
                        <input {...register('skills_required', { required: true })} placeholder="Skills Required" />
                        {formErrors.skills_required && <p>Skills Required is required</p>}
                        <input {...register('location', { required: true })} placeholder="Location" />
                        {formErrors.location && <p>Location is required</p>}
                        <input type='datetime-local' {...register('date', { required: true })} />
                        {formErrors.date && <p>Date is required</p>}
                        <input {...register('description', { required: true })} placeholder="Description" />
                        {formErrors.description && <p>Description is required</p>}
                        <button className="btn">Save</button>
                    </form>
                )}
            </div>
        </>
    );
}