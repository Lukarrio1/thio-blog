$(document).ready(async () => {
    //Local variables
    let state = new State();
    let profileController = new ProfileController();

    //Cache DOM
    let profileForm = document.querySelector('#updateprofile');
    let profilePic = document.querySelector('#profilepicform');
    let profileimgsubmit = document.querySelector('#ProfilePicForm');

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
        await profileController.UpdateProfile(
            profilemail,
            profilename,
            newuser
        );
        state.setState('user', newuser);
    });

    profilePic.addEventListener('change', event => {
        profileController.TemPic(event.target);
        profileimgsubmit.addEventListener('click', () => {
            profileController.ProfilePicUpdate(event.target.files[0]);
        });
    });

    //Methods
    async function initialize() {
        try {
            let result = await profileController.ProfileData();
            state.setState('user', result);
            profileController.Profile(result);
        } catch (e) {
            console.log('error :', e);
        }
    }
});
