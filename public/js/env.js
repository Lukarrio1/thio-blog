class env extends State {
    IzT = (_type, message) => {
        switch (_type) {
            case 'success':
                iziToast.success({
                    position: 'topCenter',
                    title: 'OK',
                    message: `${message}`
                });
                break;
            case 'error':
                iziToast.error({
                    position: 'topCenter',
                    title: 'OK',
                    message: `${message}`
                });
                break;
        }
    };
}
