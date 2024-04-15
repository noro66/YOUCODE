import { createContext, useContext, useState } from "react";

const stateContext = createContext({
    user: null,
    token: null,
    setToken: () => {},
    setUser: () => {},
});

// eslint-disable-next-line react/prop-types
export const ContextProvider = ({ children }) => {
    const buffuser = JSON.parse(localStorage.getItem("user"));
    const [user, _setUser] = useState(buffuser);
    const [token, _setToken] = useState(localStorage.getItem("token"));

    const setToken = (token) => {
        _setToken(token);
        if (token) {
            localStorage.setItem("token", token);
        } else {
            localStorage.removeItem("token");
        }
    };

    const setUser = (user) => {
        _setUser(user);
        if (user) {
            localStorage.setItem("user", user);
        } else {
            localStorage.removeItem("user");
        }
    };

    return (
        <stateContext.Provider value={{
            user,
            token,
            setToken,
            setUser,
        }}>
            {children}
        </stateContext.Provider>
    );
};

export const useStateContext = () => useContext(stateContext);
