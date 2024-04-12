import { createContext, useContext, useState } from "react";

const stateContext = createContext({
    user: null,
    token: null,
    setToken: () => {},
    setUser: () => {},
});

export const ContextProvider = ({ children }) => {
    const [user, setUser] = useState(null);
    const [token, _setToken] = useState(localStorage.getItem("token"));

    const setToken = (token) => {
        _setToken(token);
        if (token) {
            localStorage.setItem("token", token);
        } else {
            localStorage.removeItem("token");
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
