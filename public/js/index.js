$(document).ready(async () => {
    //Local variables
    let state = new State();
    let profile = new Profile();

    //Cache DOM
    let profileForm = document.querySelector('#updateprofile');
    let profilePic = document.querySelector('#profilepicform');
    let profileimgsubmit = document.querySelector('#ProfilePicForm');
    let removeimg = document.querySelector('#removeimg');

    initialize();

    //Events
    profileForm.addEventListener('submit', async event => {
        event.preventDefault();
        let profilename = $('#profilename').val();
        let profilemail = $('#profilemail').val();
        let user = state.getState('user');
        let newuser = {
            name: profilename,
            email: profilemail,
            id: user.id,
            created_at: user.created_at,
            updated_at: user.updated_at,
            image: user.image
        };
        await profile.UpdateProfile(profilemail, profilename, newuser);
        state.setState('user', newuser);
    });

    profilePic.addEventListener('change', event => {
        profile.TemPic(event.target);
        profileimgsubmit.addEventListener('click', () => {
            profile.ProfilePicUpdate(event.target.files[0]);
        });
    });

    removeimg.addEventListener('click', async event => {
        let user = state.getState('user');
        let newuser = {
            name: user.name,
            email: user.email,
            id: user.id,
            created_at: user.created_at,
            updated_at: user.updated_at,
            image: 'noimage.jpg'
        };
        await profile.RemovePic('delete', newuser);
        state.setState('user', newuser);
    });
    //Methods
    async function initialize() {
        try {
            let result = await profile.ProfileData();
            state.setState('user', result);
            profile.Profile(result);
        } catch (e) {
            IzT('error :', e);
        }
    }
});
