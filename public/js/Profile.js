class Profile extends env {
    ProfileData = async () => {
        try {
            let res = await axios.get('/profile/user');
            return res.data.data;
        } catch (err) {
            throw err;
        }
    };

    UpdateProfile = async (email, name, user) => {
        try {
            let check = await axios.put('/profile/update', {
                email: email,
                name: name
            });
            if (check.data.data.status == 403) {
                this.IzT('error', 'Email already in use.');
            } else {
                this.Profile(user);
                this.IzT('success', 'Profile Updated.');
            }
        } catch (err) {
            this.IzT('error', err);
        }
    };

    Profile = user => {
        console.log(user);
        $('#profilename').val(`${user.name}`);
        $('#profilemail').val(`${user.email}`);
        $('#profilecardname').html(`${user.name}`);
        $('#profilecardemail').html(`${user.email}`);
        $('#regularprofilepic').attr('src', `/storage/profile/${user.image}`);
        let img = user.image;
        this.ProfileImage(img);
    };

    ProfileImage = img => {
        $('#profileimage').attr('src', `/storage/profile/${img}`);
    };

    TemPic = img => {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#profileimage').attr('src', e.target.result);
        };
        reader.readAsDataURL(img.files[0]);
    };

    ProfilePicUpdate = async img => {
        try {
            let fd = new FormData();
            fd.append('file', img, img.name);
            $('#closeprofilePicForm').click();
            let response = await axios.post('/profile/picture', fd);
            this.IzT('success', 'Profile picture changed sucessfully.');
        } catch (err) {
            this.IzT('error', err);
        }
    };

    RemovePic = async (req, user) => {
        try {
            await axios.delete('/profile/remove');
            this.IzT('success', 'Profile picture removed .');
            this.Profile(user);
        } catch (err) {
            this.IzT('error', err);
        }
    };
}
