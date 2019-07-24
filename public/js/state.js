class State {
    getState(key) {
        let data = localStorage.getItem(key);
        return data ? JSON.parse(data) : null;
    }

    setState(key, data) {
        localStorage.setItem(key, JSON.stringify(data));
    }

    clearState(key) {
        localStorage.removeItem(key);
    }
}
